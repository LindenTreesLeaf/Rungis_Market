<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Bundle;

class ApiOrdersController extends Controller {
    public function getOrders(Request $request){

        if($request->has('token')){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){

                
                $data =  Order::select("*",DB::raw("orders.id as ordid"))
                            ->where('orders.user_id','=',$tokenExist[0]->user_id)
                            ->join("states", "states.id","=", "orders.state_id")
                            ->orderBy('date_passed','DESC')
                            ->get();



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


    public function validateOrder(Request $request){
        if($request->has('token') && $request->has("ordercode") && $request->has("updatecode")){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){

                

                $orderExist = Bundle::where('bundles.user_id', '=', $tokenExist[0]->user_id)
                            ->join("orders","bundles.order_id", "orders.id")
                            ->where("orders.id", "=", $request->get("ordercode"))
                            ->get();

                if(count($orderExist) >= 1){


                    $tmp = Order::where("orders.id", "=", $request->get("ordercode"))
                            ->update(["state_id" => $request->get("updatecode")]);


                    $out = ['error' => 0];
                }else{
                    $out = ['error' => 4];
                }




                

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