<head>
<link rel="stylesheet" href="Css/sharedStyle.css">
</head>
<?php
?>
<header class="header">
        <div>
            <img class="logoImg" onclick="location.href = 'index.php'" src="Images/logo.png" alt="">
        </div>
        <div class="nav-div">
            <div><button onclick="location.href = 'index.php'">Home</button></div>
            <div><button onclick="location.href = 'aboutUs.php'">About Us</button></div>
            <div><button onclick="location.href ='ContactUs.php'">Contacts</button></div>
            <div><button onclick="location.href ='productPage.php'">Products</button></div>
            <?php 
                if(isset($_COOKIE['roli']) && $_COOKIE['roli'] == 1){
            ?>
            <div><button onclick="location.href ='dashboard.php'">Dashboard</button></div>
            <div><button onclick="location.href = 'logout.php'">Logout</button></div>
            <?php } ?> 
        </div>
        <?php 
            if(isset($_COOKIE['username']) && isset($_COOKIE['emri'])){ ?>
                <div class = "user">
                    <div class = "profilePic">
                        <img src="./Images/Icons/profile.jpg" alt="">
                    </div>
                    <h3 style = "color: white;">Welcome <?php echo $_COOKIE['emri']." ".$_COOKIE['mbiemri'] ?></h3>
                </div>    
            <?php
            }
            else{
        ?>
        <div class="logReg">
            <button onclick="location.href='Register.php'" id="register">Register</button>
            <button onclick="location.href='login.php'"  id="login">Login</button>
        </div>
        <?php }?>
        
</header>
<body>
<div class="asideCover" onclick = "removeAside()">
    </div>
    <aside class="asideBurger">
        <div class = "asideBurgerChildren">
            <img src="Images/Icons/xIcon.png" id = "xIcon" onclick = "removeAside()" alt="">
                <div class="relativeSearchAside">
                <input class="search" type="search" placeholder="Çfarë po kërkoni?">
            <img src="Images/Icons/searchIcon.png" id="searchIcon" alt="">
            </div>
        <h1>Menu</h1>
        <hr>
            <ul class="burgerAsideCategory">
                <?php if(isset($_COOKIE['emri'])){?>
                    <li><a href='dashboard.php'>Dashboard</a></li>
                <?php } ?>
                <li><a href = 'index.php'>Home</a></li>
                <li><a href = 'aboutUs.php'>About Us</a></li>
                <li><a href ='ContactUs.php'>Contacts</a></li>
                <li><a href='Register.php' id="register">Register</a></li>
                <li><a href='login.php'  id="login">Login</a></li>
                <?php if(isset($_COOKIE['emri'])){?>
                    <li><a href='logout.php'>Logout</a></li>
                <?php } ?>
            </ul>
        <h1>Kategoritë</h1>
        <hr>
            <ul class="burgerAsideCategory">
                <li onclick="removeAside()"><a href="category.php?category=Aksesori">Aksesorë</a></li>
                <li onclick="removeAside()"><a href="category.php?category=Laptop">Laptop</a></li>
                <li onclick="removeAside()"><a href="category.php?category=PC">PC</a></li>
                <li onclick="removeAside()"><a href="category.php?category=Phone/Tablet">Celulare/Tablet</a></li>
            </ul>
        </div>
        </aside>
</body>