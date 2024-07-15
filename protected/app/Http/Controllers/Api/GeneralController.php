<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RestController;
use App\Models\Bank;
use App\Models\Banner;
use App\Models\Categories;
use App\Models\Outlet;
use App\Models\PasswordReset;
use App\Models\PaymentFeature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class GeneralController extends RestController
{
    public function province()
    {
        $provinces = DB::table('courier_province')->select('id as province_id', 'province_name')
            ->where('publish', true)->get();
        return RestController::sendResponse("Berhasil ambil data provinsi", $provinces);
    }

    public function city($id)
    {
        $cities = DB::table('courier_city')->select('id as city_id', 'province_id', 'district_name as city_name')
            ->where('publish', true)
            ->where('province_id', $id)
            ->get();
        return RestController::sendResponse("Berhasil ambil data kota", $cities);
    }

    public function district($province_id, $district_id)
    {
        $districts = DB::table('courier_district')->select('id as district_id', 'province_id', 'district_id as city_id', 'sub_district as district_name')
            ->where('publish', true)
            ->where('province_id', $province_id)
            ->where('district_id', $district_id)
            ->get();
        return RestController::sendResponse("Berhasil ambil data kecamatan", $districts);
    }

    public function village($city_id, $district_id)
    {
        $villages = DB::table('courier_village')->select('id as village_id', 'district_id as city_id', 'subdistrict_id as district_id', 'vilage_name', 'postal_code')
            ->where('publish', true)
            ->where('district_id', $city_id)
            ->where('subdistrict_id', $district_id)
            ->get();
        return RestController::sendResponse("Berhasil ambil data desa", $villages);
    }

    public function banks()
    {
        $banks = Bank::select('code', 'name')->where('status', 'active')->get();
        return RestController::sendResponse("Berhasil ambil data bank", $banks);
    }

    public function categories()
    {
        $categories = Categories::select('code', 'category')->where('status', 'active')->get();
        return RestController::sendResponse("Berhasil ambil data Kategori Usaha", $categories);
    }

    public function outlets()
    {
        $outlets = Outlet::select('code', 'outlet')->where('status', 'active')->get();
        return RestController::sendResponse("Berhasil ambil data Kategori Usaha", $outlets);
    }

    public function banners()
    {
        $banners = Banner::select('title', 'description', 'image as banner')->where('status', 'active')->get();
        return RestController::sendResponse("Berhasil ambil data Banner", $banners);
    }

    public function payments()
    {
        $payments = PaymentFeature::select('code', 'payment')->where('status', 'active')->get();
        return RestController::sendResponse("Berhasil ambil data Fitur Pembayaran", $payments);
    }

    public function resetPassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'password' => ['required', 'string', 'max:16', 'min:8', "regex:/^(?=.*[A-Z])(?=.*[@#$%])(?=.*[0-9])(?=.*[a-z])/"],
            'password_confirmation' => ['required', 'string', 'max:16', 'min:8', "regex:/^(?=.*[A-Z])(?=.*[@#$%])(?=.*[0-9])(?=.*[a-z])/"]
        ]);

        if ($validation->fails()) {
            return json_encode(['status' => false, 'message' => "The password format is invalid. Password must include 1 uppercase letter, 1 digit, the characters @#$%, and be between 8 and 16 characters in length."]);
        }
        $now = Carbon::now();

        $token = PasswordReset::where('token', $request->token)->first();
        DB::beginTransaction();
        try {
            if (!$token) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => "Token not match! "]);
            }

            $expirationTime = Carbon::parse($token->expired_at);
            if ($now > $expirationTime) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => "Token Expired!"]);
            }

            if ($request->password != $request->password_confirmation) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => "Password confirmation ot match!"]);
            }

            $user = User::where('email', $token->email)->first();

            if (!$user) {
                DB::rollBack();
                return response()->json(['status' => false, 'message' => "User ot found!"]);
            }

            // $user->password = Hash::make($request->password);
            $change = User::where('email', $token->email)->update([
                'password' => Hash::make($request->password)
            ]);
            if ($change) {
                $utoken = PasswordReset::where('token', $request->token)->update([
                    'expired_at' => $now->subHour()
                ]);
                DB::commit();
                return response()->json(['status' => true, 'message' => "Berhasil Reset Password!"]);
            }
            DB::rollBack();
            return response()->json(['status' => false, 'message' => "Gagal Reset Password!"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th);
            return response()->json(['status' => false, 'message' => "Gagal Reset Password!"]);
        }
    }
}
