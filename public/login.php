<?php

require_once '../database/credentials.php';

// Login API to
if(isset($_POST['login']) && isset($_POST['password'])){

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname,$username,$password");
    }catch(PDOException $pe){
        die();
        http_response_code(500);
    }



    return "coucou";







    http_response_code(200);
}else{



http_response_code(200);
}



?>
