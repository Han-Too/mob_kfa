<?php

namespace App\Http\Controllers\Api;

use App\Helpers\BackOffice;
use App\Http\Controllers\RestController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\SendMail;
use App\Models\PasswordReset as ModelsPasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthenticationController extends RestController
{
    public function portalLogin(LoginRequest $request)
    {
        try {
            $request->authenticate();

            $request->session()->regenerate();

            return RestController::sendResponse(null, "Berhasill Login");
        } catch (\Throwable $th) {
            return RestController::sendError(null, "Gagal Login");
        }
    }


    public function register(RegisterRequest $request)
    {
        $username = isset($request->username) ? $request->username : '';

        dd($request->all());

        $salt = 'BtDMQ7RfNVoRzWGjS2DK';
        $bo_pin = BackOffice::encrypt($salt, $request->pin);
        $bo_password = BackOffice::encrypt($salt, $request->password);

        DB::beginTransaction();
        try {
            $check = User::where('username', $username)->first();
            // $check_email = User::where('email', $request->email)->first();
            // if ($check_email) {
            //     return RestController::sendError('Email Sudah Terdaftar');
            // }

            if (strlen($request->username) > 30) {
                DB::rollBack();
                return RestController::sendError('Username Maksimal 30 Karakter');
            }

            if (!$check) {
                $input = User::create([
                    'token' => Str::uuid(),
                    'username' => $request->username,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'pin' => Hash::make($request->pin),
                    'referal_code' => $request->referal_code,
                    'citizenship' => $request->kewarganegaraan,
                    'role_id' => $request->privilege_user_id, // 6 for merchant
                    'question' => $request->pertanyaan,
                    'answer' => Hash::make($request->jawaban),
                    'status' => 'active',
                    'bo_pin' => $bo_pin,
                    'bo_password' => $bo_password
                ]);
                DB::commit();
                return RestController::sendResponse('Berhasil simpan data pre register');
            }
            DB::rollBack();
            return RestController::sendError('Username sudah digunakan');
        } catch (\Throwable $th) {
            dd($th);
            Log::info($th);
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan']);
        }
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()
                ->json(['message' => 'Gagal Login! Username atau Password salah'], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $result = [
            'name' => $user->name,
            'email' => $user->email,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'role_title' => $user->role->title,
            'role_id' => $user->role_id
        ];
        return RestController::sendResponse('Berhasil Login', $result);
    }

    public function user()
    {
        $user = Auth::user();

        return RestController::sendResponse('Berhasil mengambil data user', $user);
    }

    public function update(Request $request)
    {
        $user = User::where('id', auth('sanctum')->user()->id)->first();
        if ($request->email) {
            $check_email = User::where('email', $request->email)->first();
            if ($check_email) {
                return RestController::sendError('Email sudah digunakan!');
            }
        }
        if ($request->username) {
            $check_username = User::where('username', $request->username)->first();
            if ($check_username) {
                return RestController::sendError('Username sudah digunakan!');
            }
        }

        $user->update([
            'name' => ($request->name !== null) ? $request->name : $user->name,
            'username' => ($request->username !== null) ? $request->username : $user->username,
            'email' => ($request->email !== null) ? $request->email : $user->email,
            'phone_number' => ($request->phone_number !== null) ? $request->phone_number : $user->phone_number,
        ]);

        return RestController::sendResponse('Berhasil update profil');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:8|max:16|regex:/^(?=.*[A-Z])(?=.*[@#$%])(?=.*[0-9])(?=.*[a-z])/',
            'confirm_password' => 'required|min:8|max:16|regex:/^(?=.*[A-Z])(?=.*[@#$%])(?=.*[0-9])(?=.*[a-z])/',
            'password' => 'required|min:8|max:16|regex:/^(?=.*[A-Z])(?=.*[@#$%])(?=.*[0-9])(?=.*[a-z])/'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::where('id', auth('sanctum')->user()->id)->first();

        // dd($request->password, $request->confirm_password);
        if ($request->password != $request->confirm_password) {
            return RestController::sendError('Password konfirmasi tidak sesuai!');
        }
        if (!Hash::check($request->old_password, $user->password)) {
            return RestController::sendError('Password lama tidak sesuai!');
        }

        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return RestController::sendResponse('Berhasil ubah password.');
        }
        return RestController::sendError('Gagal ubah password.');
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return RestController::sendResponse('Berhasil logout.');
    }

    public function resetPassword(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        DB::beginTransaction();
        try {
            if ($user) {
                $hashedJawaban = $user->answer;
                $inputJawaban = $request->jawaban;
                $email = $user->email;

                if ($user->question == $request->pertanyaan && Hash::check($inputJawaban, $hashedJawaban)) {
                    $username = $request->username;

                    $user = User::where('username', $username)->first();
                    if (!$user) {
                        return RestController::sendError("User tidak ditemukan!");
                    }

                    $token = bin2hex(random_bytes(32));

                    $reset = ModelsPasswordReset::create([
                        'email' => $email,
                        'token' => $token,
                        'expired_at' => Carbon::now()->addMinutes(5),
                        'created_at' => Carbon::now()
                    ]);

                    if ($reset) {
                        $data = [
                            'title' => 'Reset Password',
                            'body' => 'Click this button below to proceed reset password verification!',
                            'token' => $token
                        ];

                        $sendEmail = Mail::to($email)->send(new SendMail($data));

                        $user->update([
                            'password' => Str::random(8)
                        ]);

                        DB::commit();
                        return RestController::sendResponse("Email verifikasi terkirim.", $email);
                    }
                    DB::rollBack();
                    return RestController::sendError('Gagal reset password.');
                } else {
                    $errorMessage = '';

                    if ($user->pertanyaan !== $request->pertanyaan && !Hash::check($inputJawaban, $hashedJawaban)) {
                        $errorMessage = 'Pertanyaan & Jawaban ';
                    } elseif ($user->pertanyaan !== $request->pertanyaan) {
                        $errorMessage = 'Pertanyaan ';
                    } elseif (!Hash::check($inputJawaban, $hashedJawaban)) {
                        $errorMessage = 'Jawaban ';
                    }

                    $errorMessage .= 'tidak sesuai';
                    DB::rollBack();
                    return RestController::sendError('Gagal reset password. ' . $errorMessage);
                }
            } else {
                DB::rollBack();
                return RestController::sendError('User tidak ditemukan');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return RestController::sendError('Gagal reeset password, coba lagi nanti  ');
        }
    }
}
