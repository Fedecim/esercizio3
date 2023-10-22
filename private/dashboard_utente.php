<?php
session_start();
if(!isset($_SESSION["login"]) || $_SESSION["login"] != true || $_SESSION["ruolo"] == 5){
    header("Location: http://localhost/esercizio3/public/login.php");
}

else{
    echo "utente: ".$_SESSION['username']."<br";
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>cliccla qui per effettuare il logout</p>
    <form action="/esercizio3/private/processa_form.php" method="post">
        <input type="hidden" name="disconnessione">
        <input type="submit" value="Logout">
    </form>
    <p>clicca qui per visualizzare prodotti e scadenze</p>
    <form action="/esercizio3/private/processa_form.php" method="post">
        <input type="hidden" name="visual_prod">
        <input type="submit" value="visualizza tabella">
    </form>
</body>
</html>