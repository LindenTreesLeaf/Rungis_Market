<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bundle;

class ApiBundlesController extends Controller {


    public function getOrdersBundles(Request $request){


        if($request->has('token') && $request->has("orderid")){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){

                
                // $data =  Order::select("*",DB::raw("orders.id as ordid"))
                //             ->where('orders.user_id','=',$tokenExist[0]->user_id)
                //             ->join("states", "states.id","=", "orders.state_id")
                //             ->orderBy('date_passed','DESC')
                //             ->get();

                $data = Bundle::select("quantity","product","price","name_u","name","email")
                                ->where('bundles.order_id','=',$request->get("orderid"))
                                ->join("units","units.id","=","bundles.unit_id")
                                ->join("users","users.id", "=", "bundles.user_id")
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


}