<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class ApiOrdersController extends Controller {
    public function getOrders(Request $request){

        if($request->has('token')){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){

                
                $data =  Order::where('orders.user_id','=',$tokenExist[0]->user_id)->join("states", "states.id","=", "orders.state_id")->get()  ;



                $out = ['error' => 0, 'data'=> $data];

            }else if(count($tokenExist) == 0){
                $out = ['error' => 2];
            }else{
                $out = ['error' => 3];
            }
        
        }else{
            $out = ['error' => 1];            
        }

        return $out;


    }






}