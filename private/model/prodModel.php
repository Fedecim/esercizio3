<?php
require_once "/opt/lampp/htdocs/esercizio3/private/classe_db.php";

class prodotto{
    public function get_tab_data($ruolo){
        // dati connessione
        // dati connessione utente
        if($ruolo == 4){
            $dati_connessione = array(
                "nome_server"=>"127.0.0.1",
                "nome_db"=>"esercizio3",
                "porta"=>"3306",
                "utente"=>"utente_nav",
                "password"=>"passwd_utentenav"
            );
        }
        // dati connessione admin
        else if($ruolo == 5){
            $dati_connessione = array(
                "nome_server"=>"127.0.0.1",
                "nome_db"=>"esercizio3",
                "porta"=>"3306",
                "utente"=>"utente_admin",
                "password"=>"passwd_utenteadmin"
            );
        }
        // istanza oggetto db
        $db = new Db($dati_connessione);
        // prepearo la query per visualizzare prodotti che scadono entro 7 giorni da oggi
        $query_settimana = "SELECT * FROM prodotti WHERE 
        data_scadenza > CURDATE() AND data_scadenza <= DATE_ADD(CURDATE(),INTERVAL 7 DAY)";
        // query prodotti scaduti
        $query_scaduti = "SELECT * FROM prodotti WHERE
        data_scadenza < CURDATE()";
        // query prodotti in scadenza tra 3 giorni
        $query_scadutiTre = "SELECT * FROM prodotti WHERE
        data_scadenza > CURDATE() AND data_scadenza <= DATE_ADD(CURDATE(), INTERVAL 3 DAY)";
        // query prodotti in scadenza oggi
        $query_inScadenza = "SELECT * FROM prodotti WHERE
        data_scadenza = CURDATE()";
        $risulati = array(
            "scaduti"=>$db->query(array("query"=>$query_scaduti,"operazione"=>"select")),
            "settimana"=>$db->query(array("query"=>$query_settimana,"operazione"=>"select")),
            "tre"=>$db->query(array("query"=>$query_scaduti,"operazione"=>"select")),
            "oggi"=>$db->query(array("query"=>$query_inScadenza,"operazione"=>"select"))
        );
        return $risulati;
    }

    public function ins_prod($dati){
        // dati connessione al db 
        $ruolo = $dati["ruolo"];
        if($ruolo == 4){
            $dati_connessione = array(
                "nome_server"=>"127.0.0.1",
                "nome_db"=>"esercizio3",
                "porta"=>"3306",
                "utente"=>"utente_nav",
                "password"=>"passwd_utentenav"
            );
        }
        // dati connessione admin
        else if($ruolo == 5){
            $dati_connessione = array(
                "nome_server"=>"127.0.0.1",
                "nome_db"=>"esercizio3",
                "porta"=>"3306",
                "utente"=>"utente_admin",
                "password"=>"passwd_utenteadmin"
            );

        }
        $db = new Db($dati_connessione);
        // preparo i dati per la insert
        // campi 
        $campi[0] = "nome";
        $campi[1] = "prezzo";
        $campi[2] = "quantita";
        $campi[3] = "data_scadenza";
        //valori
        $valori[0] = "'".$dati["nome"]."'";
        $valori[1] = "'".$dati["prezzo"]."'";
        $valori[2] = "'".$dati["quantia"]."'";
        $valori[3] = "'".$dati["data_scadenza"]."'";
        $dati_insert = array(
            "campi"=>$campi,
            "valori"=>$valori,
            "nome_tab"=>"prodotti"
        );
        try {
            $db->insert($dati_insert);
        } catch (Exception $err) {
            echo $err;
        }
    }
}
?>