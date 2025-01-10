<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends BaseController {

    public function register_post(RegisterRequest $request)
    {
        $data = $request->validated();

        $this->authService->register_post($data);

        return redirect()->route('index');
    }

    public function login_post(LoginRequest $request) {
        $data = $request->validated();

        $this->authService->login_post($data);

        return redirect()->route('index');
    }

    public function logout() {
        $this->authService->logout();

        return redirect()->route('index');
    }

}
