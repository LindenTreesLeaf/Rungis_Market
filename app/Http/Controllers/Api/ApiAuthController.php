<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class ApiAuthController extends Controller {

    public function store(Request $request){

        $out = ["error" => 1]; // a faire, ne plus passer par la login request, mais m'occuper de vérifier que l'utilisateur est le bon.

        
        if($request->filled('email') && $request->filled('password')){
            
            $email = $request->get('email');

            $pass = $request->get('password');


            $user = DB::table('users')->where('email',$email)->get();
            

            if(count($user) == 1 && Hash::check($pass,$user[0]->password)){
                $userId = $user[0]->id;

                $token = Str::random(64);

                DB::table('personnal_access_token')->insert([
                'value_token' => $token,
                'user_id' => $userId,
                ]);

                $out = ['error' => 0,'token' => $token];

            }

            $out =['error' => 1000,'data' => count($user)];

            
        }else if($request->filled('token')){
            
            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){
                $out = ["error" => 0];
            }

        }

        return response()->json($out);

    }

    public function destroy(Request $request)
    {
        $out = ['error' => 1];

        if($request->exists('token')){
            $count = DB::table('personnal_access_token')->where("value_token" , "LIKE", $request->get('token'))->delete();

            if($count == 1){
                $out = ['error' => 0];
            }else if($count > 1){
                $out = ['error' => 2]; 
            }

            $out = ['error' => $count];

            
        }

        return response()->json($out);
    }
}