<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/loginStyle.css">
    <link rel="stylesheet" href="Css/sharedStyle.css">
    <title>Login</title>
    <?php
    include "header.php";
    ?>
</head>

<body>
    <div class="flexLogin">
        <div class="login-div">
            <h1>Login</h1>
            <form class="form" id="rel">
                <div class="relative">
                    <div class="inputField" id="borderUsername">
                        <img class="icon" src="Images/Icons/usernameIcon.png" alt="">
                        <input type="text" id="username" onclick="removeError('errorUsername', 'borderUsername')"
                            placeholder="Username">
                    </div>
                    <span style="display: none;" id='errorUsername' class='allSpan'>Shenoni username</span>
                </div>
                <div class="relative">
                    <div class="inputField" id="borderPassword">
                        <img class="icon" src="Images/Icons/passwordIcon.png" alt="">
                        <input type="password" id="password" onclick="removeError('errorPassword', 'borderPassword')"
                            placeholder="Password">
                        <div onclick="showPassword()">
                            <img class="icon" id="eyeIcon" src="Images/Icons/eyeIcon.png" alt="">
                        </div>
                    </div>
                    <span style="display: none;" id='errorPassword' class='allSpan'>Shenoni passwordin</span>
                </div>
                <input type="submit" onclick="validateLogin()" id="submit" value="Submit">
            </form>
            You don't have an account? <a href="Register.html">Register now</a>
        </div>
    </div>
    <script src="Js/loginValidation.js"></script>
    <footer class="footer">
        <h4>Disclaimer</h5>
            <h5>©2021 - AsterTech</h6>
    </footer>
</body>

</html>