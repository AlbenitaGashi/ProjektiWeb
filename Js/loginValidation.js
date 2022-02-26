function validateLogin() {
    var username = document.querySelector("#username").value;
    var password = document.querySelector("#password").value;
    var count = 0;

    if (username == null || username == "" || username.includes(" ")) {
        document.getElementById('borderUsername').style.border = "2px solid #fd5c5c";
        document.getElementById('errorUsername').style.display = "block";
        count++;
    }
    if (password == null || password == "") {
        document.getElementById('borderPassword').style.border = "2px solid #fd5c5c";
        document.getElementById('errorPassword').style.display = "block";
        count++;
    }
    if (count == 0) {
        var reload = document.getElementById('rel');
        reload.onsubmit = function(e){ return true; }
    }
    else if(count != 0){
        var reload = document.getElementById('rel');
        reload.onsubmit = function(e){ e.preventDefault()}
    }
}
function removeError(spanId, inputId) {
    document.getElementById(spanId).style.display = "none";
    document.getElementById(inputId).style.border = "none";
}
function showPassword() {
    var show = document.getElementById("password");
    if (show.type == "password") {
        show.type = "text";
    }
    else {
        show.type = "password";
    }
}