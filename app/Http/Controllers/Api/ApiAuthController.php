<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;


class ApiAuthController extends Controller {

    public function store(LoginRequest $request){

        $request->authenticate();
        $request->session()->regenerate();


        $out = ['token' => $request->session()->id()];

        return response()->json($out);

    }
}