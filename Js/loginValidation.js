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
        confirm("Login eshte kryer me sukses!");
        var activeReload = document.getElementById('rel');
        function activeRel() {
            return true;
        }
        activeReload.addEventListener('submit', activeRel);
    }
    else {
        var stopReload = document.getElementById('rel');
        function stopRel(stop) {
            stop.preventDefault();
        }
        stopReload.addEventListener('submit', stopRel);
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