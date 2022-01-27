var items = document.getElementsByName("breakline");
var lastchild = items[items.length-1];
lastchild.remove();

function val() {
    d = document.getElementById("select_id").value;
    var select = document.getElementById("section_select");
    if(select){
        for(i = 0; i < select.length; i++)
        if(d == select.options[i].value){
            select.options[i].style.display = "block";
            select.options[0].innerHTML = "-- Select section -- "; 
        } else {
            select.options[i].style.display = "none"; 
            select.value = 0;
        }
    }
}