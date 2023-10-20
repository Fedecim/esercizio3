<?php
//session_start();
require_once "/opt/lampp/htdocs/esercizio3/private/model/utenteModel.php";
class regController{
    public function registrati($dati){
        // controllo che tutti i dati siano stati passati
        if(isset($dati["username"]) && isset($dati["password"]) && isset($dati["email"]) && isset($dati["ruolo"])){
            $dati["ruolo"] = 4;
            // controllo se l utente ha intenzione di regstrarsi come admin e ha passato la chiave
            if(isset($dati["chiave"]) && $dati["chiave"] != NULL){
                echo "ecco chiave";
                // controllo che la chiave sia correetta
                if($dati["chiave"] == "CHIAVE_ACCESSO_ADMIN"){
                    echo "hai la chiave giusta";
                    // imposto il ruolo su admin
                    $dati["ruolo"] = 5;
                }
                else{
                    echo "ci hai provato";
                }
            }
            else{
                try {
                    $utente = new utente();
                    $utente->add_utente($dati);
                    // imposto la sessione con i dati 
                    $_SESSION['login'] = true;
                    $_SESSION["ruolo"] = $dati["ruolo"];
                    $_SESSION["username"] = $dati["username"];
                    //
                    echo "Registrazione avvenuta con successo";
                } catch (Exception $err) {
                    //echo $err;
                    echo "Errore ritorna alla pagina di registrazione<br><br>";
                    echo "<a href='http://localhost/esercizio3/public/registrati.php'>pagina di registrazione</a>";
                }
            }
        }
    }
}
?>