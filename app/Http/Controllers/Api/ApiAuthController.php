<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ApiAuthController extends Controller {

    public function store(LoginRequest $request){

        $out = ["error" => 1];

        
        if($request->has('email') && $request->has('password')){
            
            $request->authenticate();

            $userId = DB::table('users')
            ->select('id')
            ->where('email',$request->get('email'))
            ->get()[0]->id;



    

            $token = Str::random(64);

            DB::table('personnal_access_token')->insert([
                'value_token' => $token,
                'user_id' => $userId,
            ]);

            $out = ['error' => 0,'token' => $token];
        }else if($request->has('token')){
            
            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){
                $out = ["error" => 0];
            }

        }

        return response()->json($out);

    }

    public function destroy(Request $request): RedirectResponse
    {
        $out = ['error' => 1];

        if($request->has('token')){
            DB::table('personnal_access_token')->where("value_token" , "=", "$request->get('token')")->delete();

            $out = ['error' => 0];
        }

        return response()->json($out);
    }
}