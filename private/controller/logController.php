<?php
require_once "/opt/lampp/htdocs/esercizio3/private/model/utenteModel.php";

class logController{
    public function log_utente($dati){
        // controllo che i dati siano stati inseriti
        if($dati["email"] != NULL && $dati["email"] != ""&& $dati["password"] != NULL && $dati["password"] != "" ){
            // invio i dati al model per recuperare dati utente
            $utente = new utente();
            $risposta = $utente->getUtente($dati);
            // se la risposta è una stringa non è stato trovato nessun risultato
            if(is_array($risposta)){
                //controllo che le password coincidono
                if($dati["password"] == $risposta[0]["password"]){
                    //echo "password uguali";

                    // variabili di sessione
                    $_SESSION["username"] = $risposta[0]["username"];
                    $_SESSION["email"] = $risposta[0]["email"];
                    $_SESSION["ruolo"] = $risposta[0]["ruolo_id"];
                    $_SESSION["id"] = $risposta[0]["id"];
                    $_SESSION["login"] = true;
                    //indirizzo alla pagina corretta a seconda del ruolo 4 = navigatore 5 = admin
                    if($_SESSION["ruolo"] == 4){
                        header("Location: http://localhost/esercizio3//private/dashboard_utente.php");
                    }
                    else if($_SESSION["ruolo"] == 5){
                        header("Location: http://localhost/esercizio3/private/dashboard_admin.php");
                    }
                }
                else{
                    echo "Hai inserito una password sbagliata ritorna alla <a href='http://localhost/esercizio3/public/login.php'>pagina di login</a>";
                }
                
            }
            else{
                echo "Hai inserito una email sbagliata ritorna alla <a href='http://localhost/esercizio3/public/login.php'>pagina di login</a>";
            }
        }
    }
}
?>