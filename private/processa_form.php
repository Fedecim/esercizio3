<?php
session_start();
require "/opt/lampp/htdocs/esercizio3/private/controller/regController.php";

if(isset($_POST["registrati"])){
    $dati = array(
        "username"=>$_POST["username"],
        "email"=>$_POST["email"],
        "password"=>$_POST["password"],
        "ruolo"=>$_POST["ruolo"],
        "chiave"=>$_POST["chiave"]
    );
    echo $dati["chiave"];
    $reg = new regController();
    $reg->registrati($dati);
}
else if(isset($_POST["disconnessione"])){ 
    session_destroy();
    header("Location: http://localhost/esercizio3/public/login.php");
    exit();
}
?>