<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;


class ApiAuthController extends Controller {

    public function store(LoginRequest $request){

        $request->authenticate();
        
        $request->get('email');

        $userId = DB::table('users')
                ->select('id')
                ->where('email',$request->get('email'))
                ->get();



        

        $token = str_random(64);




        $out = ['token' => $userId];




        //return $request->session->id();
        return response()->json($out);

    }
}