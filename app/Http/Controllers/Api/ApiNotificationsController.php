<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiNotificationsController extends Controller {

    public function getNotifications(Request $request){
        if($request->has('token')){

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();
            
            


            if(count($tokenExist) == 1){                

                $notifs = Db::table('notifications')->where("user_id", "=", $tokenExist[0]->user_id)
                            ->get();


                

                $out = ["error" => 0, "data" => $notifs];



            }else{
                $out = ['error' => 2];
            }


        }else{
            $out = ['error' => 1];
        }

        return $out;


    }

    public function deleteNotification(Request $request){

        if($request->has('token')&& $request->has('notifid')){

            $tokenExist = DB::table('personnal_access_token')->where("value_token","=", $request->get('token'))->get();
            if(count($tokenExist) == 1){                

                $notifs = Db::table('notifications')->where("id", "=", $request->get('notifid'))->delete();



                $out = ["error" => 0];



            }else{
                $out = ['error' => 2];
            }


        }else{
            $out = ['error' => 1];
        }

        return $out;

    }

}