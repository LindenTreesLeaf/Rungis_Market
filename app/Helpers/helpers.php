<?php

use Illuminate\Support\Facades\DB;
if (!function_exists('addNotification')) {

    function addNotification($user,$commandeId)
    {

        $title = "Commande prête";

        $message = "La commande N° " + $commandeId + " est prête. Vous pouvez venir la récupérer.";

        DB::table("notifications")->insert(['title'=>$title, "message" =>$message,"user_id" => $user->id, "order_id" => $commandeId]);

    }
}