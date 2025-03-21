<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Bundle;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ApiOrdersController extends Controller {
    public function getOrders(Request $request){


        //Envoyer les commandes en fonction des différents roles
        // Client : envoyer les commandes qu'il a passé
        // Marchand : envoyer les bundles qu'il a préparé ou qu'y doivent être préparés pour les client (possibilité de les valider)
        // Superviseur : envoyer les commandes qu'il a besoin de valider 

        if($request->has('token')){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){

                $user = User::where('users.id', '=', $tokenExist[0]->user_id)
                                ->get()[0];



                if($user->hasRole("client")){
                    $data =  Order::select("*",DB::raw("orders.id as ordid"))
                            ->where('orders.user_id','=',$user->id)
                            ->join("states", "states.id","=", "orders.state_id")
                            ->leftjoin("buildings","buildings.id","=","orders.building_id")
                            ->orderBy('date_passed','DESC')
                            ->get();

                    $out = ['error' => 0, 'data'=> $data, "role" => "client"];

                    
                }else if($user->hasRole("seller")){ // a bouger dans le bundles controller

                    $data = Bundle::select("product","quantity","price","validated","name_u","name", "email","bundles.id as b_id")
                            ->where("bundles.user_id", "=", $user->id)
                            ->join("users", "users.id", "=", "bundles.user_id")
                            ->join("units","units.id","=", "bundles.unit_id")
                            ->get();


                    $out = ['error' => 0, 'data'=> $data, "role" => "seller"];

                }else if($user->hasRole("supervisor")){
                    $data =  Order::select("*",DB::raw("orders.id as ordid"))
                            ->join("states", "states.id","=", "orders.state_id")
                            ->leftjoin("buildings","buildings.id","=","orders.building_id")
                            ->orderBy('date_passed','DESC')
                            ->get();
         
                    $out = ['error' => 0, 'data'=> $data, "role" => "supervisor"];


                }else{
                    $out = ["error" => 4];
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


    public function validateOrder(Request $request){
        
        if($request->has('token') && $request->has("ordercode") && $request->has("buildingid")){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){

                
                $user = User::where('users.id', '=', $tokenExist[0]->user_id)
                                ->get()[0];


                if($user->hasRole("supervisor")){

                    $orderExist = Order::where('orders.id',"=", $request->get("ordercode"))
                                        ->get();

                    /*$orderExist = Bundle::where('bundles.user_id', '=', $tokenExist[0]->user_id)
                            ->join("orders","bundles.order_id", "orders.id")
                            ->where("orders.id", "=", $request->get("ordercode"))
                            ->get();
                            */

                    if(count($orderExist) >= 1){


                        $tmp = Order::where("orders.id", "=", $request->get("ordercode"))
                                ->update(["state_id" => 3, "building_id" => $request->get("buildingid")]);


                        $out = ['error' => 0];
                    }else{
                        $out = ['error' => 4, 'test' => $orderExist];
                    }


                }else{
                    $out = ['error' => 5];
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