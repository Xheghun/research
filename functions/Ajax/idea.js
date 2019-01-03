function idea_form() {
    var i_xhr = new  XMLHttpRequest();
    var target = document.getElementById("id_form");
    var name = document.getElementById("name");
    var email = document.getElementById("email");
    var idea = document.getElementById("idea");
    i_xhr.open("POST","functions/idea.php",true);
    console.log("Opened");
    i_xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    i_xhr.onreadystatechange = function () {
        if (i_xhr.readyState < 4) {
            console.log("Please wait...");
        }
        if (i_xhr.readyState === 4 && i_xhr.status === 200) {
            target.innerHTML = i_xhr.responseText;
            console.log("yass");
        }
    };
    i_xhr.send("name="+name.value+"&email="+email.value+"&idea="+idea.value,"&rs="+i_xhr.responseText);
    console.log(idea.value);
}
var button = document.getElementById("submit");
button.addEventListener("click",idea_form);