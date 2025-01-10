<?php

namespace App\Http\Service;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService {

    public function register_post($data) {

        $email = $data['email'];
        $hashed_password = Hash::make($data['password']);

        try {

            User::create([
                'name' => '',
                'email' => $email,
                'password' => $hashed_password
            ]);

            Auth::login($email);

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    public function login_post($data) {

        Auth::attempt($data);

    }

    public function logout() {
        Auth::logout();
    }

}
