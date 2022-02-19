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

function checkCategory(select){
    let paths = window.location.pathname.split("/");
    let endofurl = paths[paths.length - 1];
    let postsCount = $("#ulClass li").length;
    endofurl = endofurl.replace(/%20/g, " ");
    endofurl = endofurl.charAt(0).toUpperCase() + endofurl.slice(1);
    let button = document.getElementById('post-button');
    if(select.options[select.selectedIndex].text == endofurl && postsCount < 10){
        button.type = "button";
    } else {
        button.type = "submit";
    }
}

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

function countChar(val) {
    var len = val.value.length;
    $('#charNum').text(1000 - len +'/1000');
};



