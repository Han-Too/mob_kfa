<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends RestController
{
    public function getAll()
    {
        $data = DB::table('addresses_list')->select('id','country','province','city','district','village')->where('country', 'Indonesia')->get();
        return response()->json($data);
    }
    public function province()
    {
        $provinces = DB::table('addresses_list')->select('province')->where('country', 'Indonesia')->groupBy('province')->get();
        return RestController::sendResponse("Berhasil ambil data provinsi", $provinces);
    }

    public function city($province)
    {
        $cities = DB::table('addresses_list')->select('city')->where('province', $province)->where('country', 'Indonesia')->groupBy('city')->get();
        return RestController::sendResponse("Berhasil ambil data kota", $cities);
    }

    public function district($city)
    {
        $district = DB::table('addresses_list')->select('district')->where('city', $city)->where('country', 'Indonesia')->groupBy('district')->get();
        return RestController::sendResponse("Berhasil ambil data district", $district);
    }

    public function village($district)
    {
        $village = DB::table('addresses_list')->select('village', 'post_code')->where('district', $district)->where('country', 'Indonesia')->get();
        return RestController::sendResponse("Berhasil ambil data village", $village);
    }
}
