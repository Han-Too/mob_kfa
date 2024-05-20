<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    
    public function index($token)
    {
        $message = '';
        $reset = PasswordReset::where('token', $token)->first();
        if (!$reset) {
            $message = "Gagal Verifikasi. Ulangi Reset Password";
        }

        return view('verification', compact('message', 'token'));
    }

    public function status()
    {
        return view('verification-status');
    }
}
