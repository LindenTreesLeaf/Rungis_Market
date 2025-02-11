<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ApiAuthController extends Controller {

    public function store(LoginRequest $request){

        $request->authenticate();
        
        $request->get('email');

        $userId = DB::table('users')
                ->select('id')
                ->where('email',$request->get('email'))
                ->get()[0]->id;



        

        $token = Str::random(64);

        DB::table('personnal_access_token')->insert([
            'value_token' => $token,
            'user_id' => $userId,
        ]);




        $out = ['token' => $token];




        //return $request->session->id();
        return response()->json($out);

    }
}