<?php
require_once "/opt/lampp/htdocs/esercizio3/private/classe_db.php";
class utente{
    public function add_utente($dati){
        // preparo i dati per la connessione tramite utente_reg
        $dati_connessione = array(
            "nome_server"=>"127.0.0.1",
            "nome_db"=>"esercizio3",
            "porta"=>"3306",
            "utente"=>"utente_reg",
            "password"=>"passwd_utentereg"
        );
        // creo oggetto di classe Db
        $db = new Db($dati_connessione);

        // preparo i dati per la insert
        // campi 
        $campi[0] = "username";
        $campi[1] = "password";
        $campi[2] = "email";
        $campi[3] = "ruolo_id";
        //valori
        $valori[0] = "'".$dati["username"]."'";
        $valori[1] = "'".$dati["password"]."'";
        $valori[2] = "'".$dati["email"]."'";
        $valori[3] = "'".$dati["ruolo"]."'";
        $dati_insert = array(
            "campi"=>$campi,
            "valori"=>$valori,
            "nome_tab"=>"utenti"
        );
        // invio dati provando la insert
        try {
            $db->insert($dati_insert);
        } catch (Exception $err) {
            throw $err;
        }
    }

    public function getUtente($dati){
        // utente per il logi : utente_log pass : passwd_utentelog
        /*
        
         $colonne = $parametri["colonne"];
        $nome_tab = $parametri["nome_tab"];
        $col_cond = $parametri["col_cond"];
        $condizione = $parametri["condizione"];*/
        
        // dati per la connessione al database
        $dati_connessione = array(
            "nome_server"=>"127.0.0.1",
            "nome_db"=>"esercizio3",
            "porta"=>"3306",
            "utente"=>"utente_log",
            "password"=>"passwd_utentelog"
        );
        // istanza oggetto classe Db 
        $db = new Db($dati_connessione);
        // preparo dati per la select
        $colonne[0] = "id"; 
        $colonne[1] = "username"; 
        $colonne[2] = "password";
        $colonne[3] =  "email";
        $colonne[4] = "ruolo_id";
        $dati_select = array(
            "colonne" => $colonne,
            "nome_tab" => "utenti",
            "col_cond" =>"email",
            "condizione" => "'".$dati["email"]."'"
        );
        // eseguo la select alla tabella utenti
        $risultato = $db->select($dati_select);
        return $risultato;

    }
}
?>