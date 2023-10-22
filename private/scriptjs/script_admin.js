function form_delete() {
    var div_delete = document.getElementById("div_delete");
    if(div_delete.style.display == "block"){
        div_delete.style.display = "none";
    }
    else
    {
        div_delete.style.display = "block";
    }
}
function form_update() {
    var div_update = document.getElementById("div_update");
    if(div_update.style.display == "block"){
        div_update.style.display = "none";
    }
    else
    {
        div_update.style.display = "block";
    }
}
function form_insert() {
    var div_insert = document.getElementById("div_insert");
    if(div_insert.style.display == "block"){
        div_insert.style.display = "none";
    }
    else
    {
        div_insert.style.display = "block";
    }
}