<?php

require_once '../database/credentials.php';


// Login API to
if(isset($_POST['login']) && isset($_POST['password'])){

    $postLogin = mysql_real_escape_string($_POST['login']);
    $postPassword = mysql_real_ecape_string($_POST['password']);

    echo json_encode($_POST['password'] . "     " . $_POST['login']);
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database",$dblogin,$password);


        $sql = spritf("SELECT count(*) as number FROM users WHERE name LIKE '%s' AND password LIKE '%s'",
            $postLogin,
            password_hash($postPassword)
        );


        $result = $conn->query($sql);

        echo json_encode(print_r($result));


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
