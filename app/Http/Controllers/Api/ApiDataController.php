<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDataController extends Controller {
    public function getBundles(Request $request){

        if($request->has('token')){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            

            //$data =  DB::select('SELECT * FROM bundles');
            
            $out = ['error' => 0, 'data' => $tokenExist];   
            return $out;
        
        
        }else{
            $out = ['error' => 1, 'data'=> [$request->session()->id()]];
            return $out;
        }


    }
}