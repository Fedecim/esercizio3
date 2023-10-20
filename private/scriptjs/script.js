// funzione che rende visibile il div con  l input per la chiave admin nel form
function mostraDivChiave() {
    var adminCheck = document.getElementById("adminCheck"); // la checkbox per selezionare se si vuole fare reg da admin
    var chiave_div = document.getElementById("chiave_div"); // il div che contiene input e label
    var ruolo = document.getElementById("ruolo"); // campo nascosto ruolo

    // se il checkbox e' stato selezionato
    if(adminCheck.checked){
        chiave_div.style.display = "block"; // rendilo visibile
        ruolo.value = "admin"; // cambia il ruolo del input ruolo in admin 
    }
    else{
        chiave_div.style.display = "none";
        ruolo.value = "utente";
    }
}