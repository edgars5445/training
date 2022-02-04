var items = document.getElementsByName("breakline");
var lastchild = items[items.length-1];
lastchild.remove();

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