<head>
<link rel="stylesheet" href="Css/sharedStyle.css">
</head>
<?php
?>
<header class="header">
        <div>
            <img class="logoImg" onclick="location.href = 'index.html'" src="Images/logo.png" alt="">
        </div>
        <div class="nav-div">
            <div><button onclick="location.href = 'index.php'">Home</button></div>
            <div><button onclick="location.href = 'aboutUs.php'">About Us</button></div>
            <div><button onclick="location.href ='ContactUs.php'">Contacts</button></div>
            <?php 
                //if(isset($_COOKIE['roli']) && $_COOKIE['roli'] == 1){
            ?>
            <div><button onclick="location.href ='dashboard.php'">Dashboard</button></div>
            <?php //} ?> 
        </div>
        <div class="logReg">
            <button onclick="location.href='Register.php'" id="register">Register</button>
            <button onclick="location.href='login.php'"  id="login">Login</button>
        </div>
</header>