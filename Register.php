<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/registration.css">
    <link rel="stylesheet" href="Css/sharedStyle.css">
    <?php
    include "header.php";
    require_once "./controllers/UserController.php";
    $userController = new UserController;
    if (isset($_POST['submit'])) {
        $userController->insert($_POST);
        echo "<script>confirm('Insertimi eshte kryer me sukses!');</script>";;
        echo "<script>window.location = './index.php';</script>";
    }
    ?>
    <title>Register</title>
</head>

<body>
    <div>
        <div class="register-div">
            <h1>Register</h1>
            <form action="" id="relReg" method="post">
                <div class="input-style">
                    <div class="align-center">
                        <div class="inputField" id="borderEmri">
                            <img src="Images/Icons/nameIcon.png" alt="">
                            <input type="text" id="emri" name="emri" onclick='removeError("errorEmri", "borderEmri")' placeholder="Emri">
                        </div>
                        <span style="display: none;" id='errorEmri' class='allSpan'>Emri nuk eshte valid</span>
                    </div>
                    <div class="align-center">
                        <div class="inputField" id="borderMbiemri">
                            <img src="Images/Icons/nameIcon.png" alt="">
                            <input type="text" id="mbiemri" name="mbiemri" placeholder="Mbiemri" onclick='removeError("errorMbiemri", "borderMbiemri")'>
                        </div>
                        <span style="display: none;" id='errorMbiemri' class='allSpan'>Mbiemri nuk eshte
                            valid</span>
                    </div>
                </div>
                <div class="input-style">
                    <div class="align-center">
                        <div class="inputField">
                            <input id="date" type="date" min="1920-01-01" name="dataLindjes" onclick='removeError("errorDate", "date")'>
                            <div onclick='infoDate()'>
                                <img class="infoIcon" src="Images/Icons/infoIcon.png" alt="">
                            </div>
                        </div>
                        <span style="display: none;" id="errorDate" class='allSpan'>Data nuk eshte valide!</span>
                    </div>
                    <div class="align-center">
                        <div class="inputField" id="borderGjinia">
                            <img src="Images/Icons/genderIcon.jpg" alt="">
                            <select name="gjinia" id="select" onclick='removeError("errorGjinia", "borderGjinia")'>
                                <option value="">Gjinia</option>
                                <option value="Femër">Femër</option>
                                <option value="Mashkull">Mashkull</option>
                                <option value="Preferoj të mos e them">Preferoj të mos e them</option>
                            </select>
                        </div>
                        <span style="display: none;" id='errorGjinia' class='allSpan'>Selektoni gjinien!</span>
                    </div>
                </div>
                <div class="input-style">
                    <div class="align-center">
                        <div class="inputField" id="borderEmail">
                            <img src="Images/Icons/emailIcon.png" alt="">
                            <input type="email" id="email" name="email" onclick='removeError("errorEmail","borderEmail")' placeholder="example@example.com">
                        </div>
                        <span style="display: none;" id='errorEmail' class='allSpan'>Emaili nuk eshte valid</span>
                    </div>
                    <div class="align-center">
                        <div class="inputField" id="borderUsername">
                            <img src="Images/Icons/usernameIcon.png" alt="">
                            <input type="text" id="username" name="username" onclick='removeError("errorUsername", "borderUsername")' placeholder="Username">
                            <div onclick='infoUsername()'>
                                <img class="infoIcon" src="Images/Icons/infoIcon.png" alt="">
                            </div>
                        </div>
                        <span style="display: none;" id='errorUsername' class='allSpan'>Username nuk eshte
                            valid</span>

                    </div>
                </div>
                <div class="input-style">
                    <div class="align-center">
                        <div class="inputField" id="borderpw1">
                            <img src="Images/Icons/passwordIcon.png" alt="">
                            <input type="password" id="pw1" name="password" onclick='removeError("errorPassword", "borderpw1")' placeholder="Password">
                            <div onclick='infoPw()'>
                                <img class="infoIcon" src="Images/Icons/infoIcon.png" alt="">
                            </div>
                            <div onclick="showPassword('pw1')">
                                <img class="icon" id="eyeIcon" src="Images/Icons/eyeIcon.png" alt="">
                            </div>
                        </div>
                        <span style="display: none;" id='errorPassword' class='allSpan'>Passwordi nuk eshte
                            valid!</span>
                    </div>
                    <div class="align-center">
                        <div class="inputField" id="borderpw2">
                            <img src="Images/Icons/passwordIcon.png" alt="">
                            <input type="password" id="pw2" onclick='removeError("errorConfirmPW","borderpw2")' placeholder="Confirm Password">
                            <div onclick="showPassword('pw2')">
                                <img class="icon" id="eyeIcon" src="Images/Icons/eyeIcon.png" alt="">
                            </div>
                        </div>

                        <span style="display: none;" id='errorConfirmPW' class='allSpan'>Confirm passwordi nuk
                            pershtatet!</span>
                    </div>
                </div>
                <div class="submit-flex">
                    <input type="Submit" onclick="registerLogin()" name="submit" id="submit" value="Submit">
                </div>
            </form>
            Alredy have an account? <a href="login.html">Log in</a>
        </div>
    </div>
    </div>
    <script src="Js/registerValidation.js"></script>
    <?php include 'footer.php'?>
</body>

</html>