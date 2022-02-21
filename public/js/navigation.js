var postButton = document.getElementById("post-button");
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
var postsCount = $("#ulClass li").length;
let routeName = document.getElementById("routeName").value;

function validateForm() {
    let x = document.forms["postForm"]["title"].value;
    let y = document.forms["postForm"]["description"].value;
    let z = document.forms["postForm"]["price"].value;
    let g = document.forms["postForm"]["section_select"].value;

    if (x == "" || y == "" || z == "" || g == ""  || x.length > 50  || y.length > 1000  || z.length > 20 ) {
        if(x == "" || x.length > 50){
            document.querySelector(".postTitle").style.boxShadow = "0 0 5px #CC0000";
        } else {
            document.querySelector(".postTitle").style.boxShadow = "";
        }

        if(y == "" || y.length > 1000){
            document.querySelector(".postDescription").style.boxShadow = "0 0 5px #CC0000";
        } else {
            document.querySelector(".postDescription").style.boxShadow = "";
        }

        if(z == "" || z.length > 20){
            document.querySelector(".postPrice").style.boxShadow = "0 0 5px #CC0000";
        } else {
            document.querySelector(".postPrice").style.boxShadow = "";
        }

        if(g == 0){
            document.querySelector(".sectionSelect").style.boxShadow = "0 0 5px #CC0000";
        } else {
            document.querySelector(".sectionSelect").style.boxShadow = "";
        }
        
        alert("The necessary fields must be filled!");
        return false;
    }
// style="box-shadow: 0 0 5px #CC0000;"
    return true;
}

if(postButton.type == "button" && postsCount < 10){
    if(routeName =="section"){
        postButton.addEventListener('click', () => {
            if(validateForm()==true){
            let postImage = document.querySelector(".postImage").value;
            let postTitle = document.querySelector(".postTitle").value;
            let postDescription = document.querySelector(".postDescription").value;
            let postPrice = document.querySelector(".postPrice").value;
            let postsContainer = document.querySelector(".ajaxDiv");
            let postSection = document.querySelector(".postSelect").value;
            let postCategory = document.querySelector(".categorySelect").value;
            let user_id = document.querySelector(".userID").value;
            $.post(
                "/new/post2",
                {image: postImage, title: postTitle, description: postDescription, price: postPrice, section_id: postSection, category_id: postCategory,user_id: user_id, _token: CSRF_TOKEN},
                function(data) {
                    let post = `<li>
                    <button class="section">
                    <div class="breakline" name="breakline"></div>\n
                    <div class="post">\n
                    <div class="div-image"><img src="${data[0]}" alt="" class="post-image"></div>\n
                    <div class="div-text">
                        <h2 class="post-title">${data[1]}</h2>\n
                        <p class="post-description">${data[2]}</p>\n
                        <p class="post-price">Cena: ${data[3]}€</p>\n
                    </div>
                    </button>
                    </li>`;
                    
                    $(postsContainer).append(post); 
                    window.scrollTo(0,document.body.scrollHeight);
                    $('#staticBackdrop').modal('hide');
                }
            )
            }
        });
    }
}

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
