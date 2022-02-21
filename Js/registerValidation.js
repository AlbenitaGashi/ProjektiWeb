function registerLogin() {
    var regexEmri = /^[A-Z]{1}[a-z]{2,}$/;
    var regexUsername = /^[a-zA-Z0-9]+([._][a-zA-Z0-9]+)*$/;
    var regexEmail = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+$/;
    var regexPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[-_!@?#])[\da-zA-Z-_!@?#]{8,}$/;
    var emri = document.querySelector('#emri').value;
    var mbiemri = document.querySelector('#mbiemri').value;
    var username = document.querySelector('#username').value;
    var email = document.querySelector('#email').value;
    var pw1 = document.querySelector('#pw1').value;
    var pw2 = document.querySelector('#pw2').value;
    var date = document.getElementById('date').value;
    var count = 0;

    if (!regexEmri.test(emri)) {
        document.getElementById('borderEmri').style.border = "2px solid #fd5c5c";
        document.getElementById('errorEmri').style.display = "block";
        count++;
    }

    if (!regexEmri.test(mbiemri)) {
        document.getElementById('borderMbiemri').style.border = "2px solid #fd5c5c";
        document.getElementById('errorMbiemri').style.display = "block";
        count++;
    }

    if (!regexUsername.test(username)) {
        document.getElementById('borderUsername').style.border = "2px solid #fd5c5c";
        document.getElementById('errorUsername').style.display = "block";
        count++;
    }

    if (!regexEmail.test(email)) {
        document.getElementById('borderEmail').style.border = "2px solid #fd5c5c";
        document.getElementById('errorEmail').style.display = "block";

        count++;
    }
    if (!regexPassword.test(pw1)) {
        document.getElementById('borderpw1').style.border = "2px solid #fd5c5c";
        document.getElementById('errorPassword').style.display = "block";
        count++;
    }
    var dateT = new Date();
    date = date.replaceAll('-', '');
    console.log(date);
    var dateToday = dateT.toISOString()/* .replaceAll('-', '').substring(0,8) */; console.log((dateT.getFullYear() - 13) + " " + (dateT.getMonth() + 1) + " " + (dateT.getDate()));
    var countData = 0;
    if (date == "" || date == null || ((date.substring(0, 4)) > dateT.getFullYear() - 12) || ((date.substring(0, 4)) < "1900")) {
        document.getElementById('date').style.border = "2px solid #fd5c5c";
        document.getElementById('errorDate').style.display = "block";
        count++;
    }
    else if ((date.substring(0, 4)) == dateT.getFullYear() - 12 && date.substring(4, 6) == (dateT.getMonth() + 1) && parseInt(date.substring(6, 8)) > (dateT.getDate())) {
        document.getElementById('date').style.border = "2px solid #fd5c5c";
        document.getElementById('errorDate').style.display = "block";
    }
    console.log(date.substring(6, 8)) + " " + (dateT.getDay());

    if (document.getElementById('select').value == "Gjinia") {
        document.getElementById('borderGjinia').style.border = "2px solid #fd5c5c";
        document.getElementById('errorGjinia').style.display = "block";
        count++;
    }
    if (!(pw1 == pw2) || (pw2 == "") || (pw2 == null)) {
        document.getElementById('borderpw2').style.border = "2px solid #fd5c5c";
        document.getElementById('errorConfirmPW').style.display = "block";
        count++;
    }
    if (count == 0) {
        confirm("Regjistrimi eshte kryer me sukses!");
        var activeReload = document.getElementById('rel');
        function activeRel() {
            return true;
        }
        activeReload.addEventListener('submit', activeRel);
    }
    else {
        var stopReload = document.getElementById('relReg');
        function stopRel(stop) {
            stop.preventDefault();
        }
        stopReload.addEventListener('submit', stopRel);
        setTimeout(() => {
            document.getElementById("submit").disabled = false;
        }, 2000);
        activeSubmit();
    }
}
function activeSubmit() {
    document.getElementById("submit").disabled = true;
}
function removeError(spanId, inputId) {
    document.getElementById(spanId).style.display = "none";
    document.getElementById(inputId).style.border = "none";
}
function infoPw() {
    alert("Passwordi duhet te permbaje minimum:\n8 karaktere \nNje shkronje te madhe \nNje shkronje te vogel \nNje karakter special prej: -_!@?#");
}
function showPassword(id) {
    var show = document.getElementById(id);
    if (show.type == "password") {
        show.type = "text";
    }
    else {
        show.type = "password";
    }
}
function infoDate() {
    alert("Për t'u regjistruar duhet të jeni të paktën 12 vjeç");
}
function infoUsername(){
    alert("Username mund te permbaje: \nKarakteret: A-Z, a-z, ._");
}