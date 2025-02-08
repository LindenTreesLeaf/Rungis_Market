<?php

require_once '../database/credentials.php';


// Login API to
if(isset($_POST['login']) && isset($_POST['password'])){
     
    echo json_encode($_POST['password'] . "     " . $_POST['login']);
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database",$dblogin,$password);
    }catch(PDOException $pe){
	echo json_encode("Erreur de connexion à la base de donnée : " . $pe->getMessage()) ;
	http_response_code(500);
	die();

    }










    http_response_code(200);

    echo json_encode("coucou");


}else{

    echo json_encode("salut");

    http_response_code(400);
}


?>
