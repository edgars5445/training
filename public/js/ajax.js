let postButton = document.getElementById("post-button");
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

let routeName = document.getElementById("routeName").value;


if(routeName =="section"){
    postButton.addEventListener('click', () => {
        let postImage = document.querySelector(".postImage").value;
        let postTitle = document.querySelector(".postTitle").value;
        let postDescription = document.querySelector(".postDescription").value;
        let postPrice = document.querySelector(".postPrice").value;
        let postsContainer = document.querySelector(".ajaxDiv");

        let postSection = document.querySelector(".postSelect").value;

        $.post(
            "/new/post2",
            {image: postImage, title: postTitle, description: postDescription, price: postPrice, section_id: postSection ,_token: CSRF_TOKEN},
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
            }
        )
    });
}