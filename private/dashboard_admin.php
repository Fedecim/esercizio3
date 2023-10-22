<?php
session_start();

if(!isset($_SESSION["login"]) || $_SESSION["login"] != true || !isset($_SESSION["ruolo"]) || $_SESSION["ruolo"] != 5){
    header("Location: http://localhost/esercizio3/public/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard_admin</title>
    <script src="/esercizio3/private/scriptjs/script_admin.js"></script>
</head>
<body>
<p>cliccla qui per effettuare il logout</p>
    <form action="/esercizio3/private/processa_form.php" method="post">
        <input type="hidden" name="disconnessione">
        <input type="submit" value="Logout">
    </form>
    <h2>Menu Admin</h2>
    <p>visualizza</p>
    <form action="/esercizio3/private/processa_form.php" method="post">
        <input type="submit" value="Select">
        <input type="hidden" name="admin_sel">
    </form>
    <p>Cancella</p>
    <button type="button" onclick="form_delete()">Delete</button>
    <div id="div_delete" name="div_delete" style="display:none;">
    <p>compila il form con l id del prodotto che vuoi eliminare</p>
    <form action="/esercizio3/private/processa_form.php" method="post">
        <label for="id">id prodotto</label>
        <input type="text" name="id" id="id">
        <input type="submit" value="invia">
        <input type="hidden" name="admin_del">
    </form><br>
    </div>
    <p>Aggiorna</p>
    <button type="button" onclick="form_update()">Update</button>
    <div id="div_update" name="div_update" style="display:none;">
    <p>compila il form con i campi che vuoi modificare e i nuovi valori</p>
    <p>Se i campi/valori sono piu di uno separali con una virgola.</p>
    <p>inserisci l id del prodotto che vuoi modificare</p>
    <p>
        esempio : <br>
        campo : nome (1 campo) 
        valore: nuovo_nome_prodotto<br><br>
        campi : nome,prezzo(2 campi)
        valori: nuovo_nome_prodotto, 33.88
    </p>
    <form action="/esercizio_db1/private/processa_post.php" method="post">
        <label for="campi">campi</label>
        <input type="text" name="campi" id="campi">
        <label for="valori">valori</label>
        <input type="text" name="valori" id="valori"><br><br>
        <label for="id">id prodotto</label>
        <input type="text" name="id_prodotto" id="id_prodotto">
        <input type="submit" value="invia">
        <input type="hidden" name="admin_up">
    </form><br>
    </div>
    <p>Inserisci</p>
    <button type="button" onclick="form_insert()">Insert</button>
    <div id="div_insert" name="div_insert" style="display:none;">
    <p>compila il form con i dati per aggiungere record al database</p>
    <form action="/esercizio3/private/processa_form.php" method="post">
        <label for="nome">nome prodotto</label>
        <input type="text" name="nome" id="nome">
        <label for="prezzo">prezzo</label>
        <input type="text" name="prezzo" id="prezzo">
        <label for="quantita">quantita'</label>
        <input type="text" name="quantita" id="quantita">
        <label for="data_scadenza">data di scadenza</label>
        <input type="date" name="data_scadenza" id="data_scadenza">
        <input type="submit" value="invia">
        <input type="hidden" name="admin_ins">
    </form><br>
    </div>
</body>
</html>
 