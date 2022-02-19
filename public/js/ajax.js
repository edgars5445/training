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
            document.querySelector(".postTitle").style.boxShadow = "0px 0px 3px #CC0000";
        }
        
        alert("The necessary fields must be filled or the correct length!");
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