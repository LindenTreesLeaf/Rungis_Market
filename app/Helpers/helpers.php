<?php

use Illuminate\Support\Facades\DB;
if (!function_exists('addNotification')) {

    function addNotification($user,$title,$message)
    {

        DB::table("notifications")->insert(['title'=>$title, "message" =>$message,"user_id" => $user->id]);

    }
}