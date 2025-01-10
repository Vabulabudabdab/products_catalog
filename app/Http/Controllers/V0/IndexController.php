<?php

namespace App\Http\Controllers\V0;

use App\Http\Requests\RegisterRequest;

class IndexController {

    public function index() {
        return view('index');
    }

    public function register() {
        return view('auth.register');
    }

    public function login() {
        return view('auth.login');
    }

    public function admin_index() {
        return view('admin.index');
    }

}
