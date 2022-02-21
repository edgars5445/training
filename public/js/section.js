var items = document.getElementsByName("breakline");
var lastchild = items[items.length-1];
lastchild.remove();

//Copy link function
function copyToClipboard(id,post) {
    var text = document.getElementById(id);
    text.type = "text";
    text.select();
    document.execCommand('copy');
    text.type= "hidden";
    alert('The link of the' + post +' has been copied!');
}

//Select priceBy box -> save value after refresh
document.getElementById('priceBy').onchange = function() {
    localStorage.setItem('selecteditem', document.getElementById('priceBy').value);
};

if (localStorage.getItem('selecteditem')) {
    document.getElementById('priceBy'+localStorage.getItem('selecteditem')).selected = true;
} 
//

//Input search box -> save value after refresh
    document.getElementById("searchBox").value = getSavedValue("searchBox");   
    
    function saveValue(e){
        localStorage.setItem(e.id, e.value);
    }

    //get the saved value function - return the value of "v" from localStorage. 
    function getSavedValue  (v){
        if (!localStorage.getItem(v)) {
            return "";// You can change this to your defualt value. 
        }
        return localStorage.getItem(v);
    }
//

function resetButton(category,section){
    window.localStorage.clear(); 
    location.href = '/' + category + '/' + section;
}

let reportButtons = document.querySelectorAll(".report-button");
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

reportButtons.forEach((button) => {
    button.addEventListener('click', () => {    
        let reportPostId = button.dataset.postid;
        let reportUserId = button.dataset.userid;
        let submitButton = document.querySelector(".submit-report" + button.dataset.postid);
        submitButton.addEventListener('click',()=>{
            let report = document.querySelector(".report_select" + button.dataset.postid).value;
            $.post(
                "/report",
                {report: report, postId: reportPostId, userId: reportUserId, _token: CSRF_TOKEN}
            )
            
            button.style.background = "red";
            button.disabled ="true";
        })
           
    });
});