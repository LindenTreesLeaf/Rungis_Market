<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Building;
use App\Models\User;


class ApiBuildingsController extends Controller {

    function getBuildings(Request $request){

        if($request->has('token')){
            

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();


            if(count($tokenExist) == 1){

                $user = User::where('users.id', '=', $tokenExist[0]->user_id)
                                ->get()[0];

                if($user->hasRole("supervisor")){


                    $data = Building::select("buildings.name AS b_name","buildings.id AS b_id")
                            ->join("types","types.id","buildings.type_id")
                            ->where("types.id","=",3)
                            ->get();
                    
                
                    $out = ['error' => 0, 'data'=> $data];

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