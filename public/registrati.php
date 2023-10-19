<?php
// avvio sessione
session_start();
// controllo che la sessione attiva non abbia i dati : login : true, username : username, email:email, ruolo : ruolo
if(isset($_SESSION) && isset($_SESSION["login"]) && $_SESSION["login"] == true){
    if(isset($_SESSION["ruolo"])){
        $ruolo = $_SESSION["ruolo"];
        if($ruolo == 4){
            header("Location: http://127.0.0.1/esercizio3/private/dashboard_utente.php");
            exit();
        }
        else if($ruolo == 5){
            header("Location: http://127.0.0.1/esercizio3/private/dashboard_admin.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <script src="/esercizio3/private/scriptjs/script.js"></script>
</head>
<body>
    <p id="test"></p>
    <form action="processa_form.php" method="post">
        <label for="username">username</label>
        <input type="text" name="username" id="username">
        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <label for="password">password</label>
        <input type="text" name="password" id="password">
        <label for="adminCheck">Registrati come admin ?</label>
        <input type="checkbox" name="adminCheck" id="adminCheck" onclick="mostraDivChiave()">
        <div id="chiave_div" name="chiave_div" style="display:none;">
            <label for="chiave">chiave</label>
            <input type="text" name="chiave" id="chiave">
        </div>
        <input type="hidden" name="ruolo" value="utente">
        <input type="submit" value="invia">
    </form>
</body>
</html>