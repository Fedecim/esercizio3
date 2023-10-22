<?php
session_start();
require "/opt/lampp/htdocs/esercizio3/private/controller/regController.php";
require "/opt/lampp/htdocs/esercizio3/private/controller/logController.php";
require "/opt/lampp/htdocs/esercizio3/private/controller/userController.php";
// REGISTRAZIONE
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
// LOGIN
else if(isset($_POST["login"])){
    $dati = array(
        "email"=>$_POST["email"],
        "password"=>$_POST["password"]
    );
    $log = new logController();
    $log->log_utente($dati);
}
// LOGOUT
else if(isset($_POST["disconnessione"])){ 
    session_destroy();
    header("Location: http://localhost/esercizio3/public/login.php");
    exit();
}
 
// VISUALIZZA TABELLA PRODOTTI
else if(isset($_POST["visual_prod"]) || isset($_POST["admin_sel"])){
    echo "fino a qui tutto bene";
    if(!isset($_SESSION["login"]) || $_SESSION["login"] != true){
        session_destroy();
        header("Location: http://localhost/esercizio3/public/login.php");
    }
    else{
        $dati_utente = array(
        "id"=>$_SESSION["id"],
        "username" => $_SESSION["username"],
        "email"=>$_SESSION["email"],
        "ruolo"=>$_SESSION["ruolo"]
        );
        $userCon = new userController();
        $userCon->getProd($dati_utente);
    }
}

//  INSERT TABELLA PRODOTTO
else if(isset($_POST["admin_ins"])){
    $dati = array(
        "nome"=>$_POST["nome"],
        "prezzo"=>$_POST["prezzo"],
        "data_scadenza"=>$_POST["data_scadenza"],
        "quantita"=>$_POST["quantita"],
        "ruolo"=>$_SESSION["ruolo"]
    );
    $userCon = new userController();
    $userCon->admin_ins($dati);
}
?>