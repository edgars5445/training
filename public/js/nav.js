// function val() {
//     d = document.getElementById("select_id").value;
//     var select = document.getElementById("section_select");
//     if(select){
//         for(i = 0; i < select.length; i++)
//         if(d == select.options[i].value){
//             select.options[i].style.display = "block";
//             select.options[0].innerHTML = "-- Select section -- "; 
//         } else {
//             select.options[i].style.display = "none"; 
//             select.value = 0;
//         }
//     }
// }

var select = document.getElementById("section_select");
$("#category_select").on('change', function() {
    var category_id = document.getElementById("category_select").value;
    if(category_id){
        $("#section_select option").each(function() { 
            section_category =  $(this).attr('name');
            if(section_category){
                if(category_id == section_category){
                    $(this).show();
                } else {
                    $(this).hide();
                    select.value=0;
                }    
            }
        });
    }
});



