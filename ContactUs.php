<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="Css/ContactUs.css">
    <link rel="stylesheet" href="Css/sharedStyle.css">
    <?php include "header.php"?>
</head>

<body>
    <div class="main-div">
        <div class="form-div">
            <h1>Contact Us</h1>
            <form class="form" id="rel" action="">
                <div class="contactForm">
                    Emri:
                    <input type="text" id="emri" onclick="removeError('errorEmri', 'emri')">
                    <span style="display: none;" id='errorEmri' class='allSpan'>Sheno emrin!</span>
                </div>
                <div class="contactForm">
                    Mbiemri:
                    <input type="text" id="mbiemri" onclick="removeError('errorMbiemri', 'mbiemri')">
                    <span style="display: none;" id='errorMbiemri' class='allSpan'>Sheno mbiemrin!</span>
                </div>
                <div class="contactForm">
                    Email:
                    <input type="Email" id="email" onclick="removeError('errorEmail', 'email')">
                    <span style="display: none;" id='errorEmail' class='allSpan'>Emaili nuk eshte valid!</span>
                </div>
                <div class="contactForm">
                    Message:
                    <textarea name="" id="message" cols="30" rows="10"
                        onclick="removeError('errorMessage', 'message')"></textarea>
                    <span style="display: none;" id='errorMessage' class='allSpan'>Sheno mesazhin!</span>
                </div>
                <input id="submit-button" type="Submit" value="Dërgo" onclick="validateContacts()">
            </form>
            <div class="contacts">
                <div onclick="location.href = 'https://www.facebook.com/'" class="singleContact">
                    Facebook: test
                    <img class="icon" src="Images/Icons/facebook.png" alt="">
                </div>
                <div onclick="location.href='https://twitter.com/?lang=en'" class="singleContact">
                    Twitter: test
                    <img class="icon" src="Images/Icons/twitter.png" alt="">
                </div>
                <div onclick="location.href='https://www.google.com/intl/en/gmail/about/'" class="singleContact">
                    E-mail: test@test.com
                    <img class="icon" src="Images/Icons/google.png" alt="">
                </div>
                <div class="singleContact">
                    Tel: +383 45 123 456
                    <img class="icon" src="Images/Icons/telephone.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <h4>Disclaimer</h5>
            <h5>©2021 - AsterTech</h6>
    </footer>
    <script src="Js/contactValidation.js"></script>
</body>

</html>