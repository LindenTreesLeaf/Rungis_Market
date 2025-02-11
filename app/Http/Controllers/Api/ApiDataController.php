<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiDataController extends Controller {
    public function getBundles(Request $request){

        if($request->has('token') && $request->session()->id() == $request->input('token')){
            
            $data =  DB::select('SELECT * FROM bundles');
            
            $out = ['error' => 0, 'data' => $data];   
            return $out;
        }else{
            $out = ['error' => 1, 'data'=> [$request->session()->id()]];
            return $out;
        }


    }
}