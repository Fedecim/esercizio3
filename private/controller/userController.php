<?php

use function PHPSTORM_META\type;

error_reporting(E_ALL);

//use function PHPSTORM_META\type;

require_once "/opt/lampp/htdocs/esercizio3/private/model/prodModel.php";

class userController{
    public function getProd($dati){
        // richiamo il metodo del model prodModel
        $prod = new prodotto();
        $risultato = $prod->get_tab_data($dati["ruolo"]);
        
        // stampo i risultati in una tabella html
        if(is_array($risultato)){
            echo "<h4>Prodotti in scadenza tra una settimana</h4><br>";
            if(is_array($risultato["settimana"])){
                $this->stampa_tab($risultato["settimana"]);
            }
            else{
                echo $risultato["settimana"];
            }
            echo "<br><br><h4>Prodotti in scadenza tra tre giorni</h4><br>";
            if(is_array($risultato["tre"])){
                $this->stampa_tab($risultato["tre"]);
            }
            else{
                echo $risultato["tre"];
            }
            echo "<br><br><h4>Prodotti in scadenza oggi</h4><br>";
            if(is_array($risultato["oggi"])){
                $this->stampa_tab($risultato["oggi"]);
            }
            else{
                echo $risultato["tre"];
            }
            echo "<br><br><h4>Prodotti scaduti</h4><br>";
            if(is_array($risultato["scaduti"])){
                $this->stampa_tab($risultato["scaduti"]);
            }
            else{
                echo $risultato["scaduti"];
            }
            // stampo link per homepage in base al ruolo
            if($dati["ruolo"] == 4){
                echo "<br><a href='http://localhost/esercizio3/private/dashboard_utente.php'>torna alla dashboard</a><br>";
            }
            else if($dati["ruolo"] == 5){
                echo "<br><a href='http://localhost/esercizio3/private/dashboard_admin.php'>torna alla dashboard</a><br>";
            }
        }
    } 

    public function admin_ins($dati){
        // cambio il formato della data prima di inserirla nel db
        $data = $dati["data_scadenza"];
        $nuova_data = date("Y-m-d", strtotime($data));
        // passo i dati al model prod
        $prod = new prodotto();
        $prod->ins_prod($dati);
    }


    private function stampa_tab($array) {
        echo '<table border="1">';
    
    // Controllo se l'array è vuoto
    if (!empty($array)) {
        // array_keys restituisce tutte le chiavi di un array associativo
        // se l'array indicizzato non è vuoto uso il primo elemento dell array per recuperare i nomi delle chiavi
        $colonne = array_keys($array[0]);
        
        // Stampo l'intestazione della tabella con le chiavi
        echo '<tr>';
        foreach ($colonne as $colonna) {
            echo '<th>' . $colonna. '</th>';
        }
        echo '</tr>';
        
        // Stampo i dati nella tabella
        foreach ($array as $record) {
            echo '<tr>';
            foreach ($record as $campo) {
                echo '<td>' . $campo . '</td>';
            }
            echo '</tr>';
        }
    } else {
        // Se l'array è vuoto stampo messaggio : nessun risultato trovato
        echo '<p>Nessun risultato trovato</p><br>';
    }
    
    echo '</table>';
    }
    
}
?>