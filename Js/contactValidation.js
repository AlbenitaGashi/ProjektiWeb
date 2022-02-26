function validateContacts() {
    var regexEmail = /^[a-z A-Z 0-9]+@[a-z A-Z 0-9]+\.[a-z]+$/;
    var emri = document.querySelector('#emri').value;
    var mbiemri = document.querySelector('#mbiemri').value;
    var email = document.querySelector('#email').value;
    var message = document.querySelector('#message').value;
    var count = 0;

    if (!regexEmail.test(email)) {
        document.getElementById('email').style.border = "2px solid #fd5c5c";
        document.getElementById('errorEmail').style.display = "block";

        count++;
    }
    if (emri == null || emri == "" || emri.includes(" ")) {
        document.getElementById('emri').style.border = "2px solid #fd5c5c";
        document.getElementById('errorEmri').style.display = "block";

        count++;
    }
    if (mbiemri == null || mbiemri == "" || mbiemri.includes(" ")) {
        document.getElementById('mbiemri').style.border = "2px solid #fd5c5c";
        document.getElementById('errorMbiemri').style.display = "block";

        count++;
    }
    if (message == null || message == "") {
        document.getElementById('message').style.border = "2px solid #fd5c5c";
        document.getElementById('errorMessage').style.display = "block";
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