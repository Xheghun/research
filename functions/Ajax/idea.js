function idea_form() {
    var i_xhr = new  XMLHttpRequest();
    var target = document.getElementById("id_form");
    var name = document.getElementById("id_name");
    var email = document.getElementById("id_email");
    var idea = document.getElementById("id_idea");
    i_xhr.open("GET","functions/idea.php",true);
    console.log("Opened");
    i_xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    i_xhr.onratechange = function () {
        if (i_xhr.readyState < 4) {
            console.log("Please wait...");
        }
        if (i_xhr.readyState === 4 && i_xhr.status === 200) {
            target.innerHTML = i_xhr.responseText;
            console.log("yass");
        }
    };
    i_xhr.send("id_name="+name.value+"&id_email="+email.value+"&id_idea="+idea.value,"&rs="+i_xhr.responseText);
    console.log("here");
}
var button = document.getElementById("submit");
button.addEventListener("click",idea_form);