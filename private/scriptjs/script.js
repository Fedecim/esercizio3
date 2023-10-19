document.addEventListener("DOMContentLoaded",function() {
    var p = document.getElementById("test");
    p.textContent = "stu vazzo";
})

function mostraDivChiave() {
    var adminCheck = document.getElementById("adminCheck");
    var chiave_div = document.getElementById("chiave_div");
    var ruolo = document.getElementById("ruolo");

    if(adminCheck.checked){
        chiave_div.style.display = "block";
        ruolo.value = "admin";
    }
    else{
        chiave_div.style.display = "none";
        ruolo.value = "utente";
    }
}