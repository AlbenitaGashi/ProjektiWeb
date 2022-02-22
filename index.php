<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/sharedStyle.css">
    <?php
    include "header.php";
    include "search.php";
    ?> 
</head>

<body>
    <div class="main-content" id="hide-main-content">
        <aside class="aside">
            <h1>Kategoritë</h1>
            <button><a href="category.php?category=Aksesorë">Aksesorë</a></button>
            <button><a href="category.php?category=Laptop">Laptop</a></button>
            <button><a href="category.php?category=PC">PC</a></button>
            <button><a href="category.php?category=Phone/Tablet">Celulare/Tablet</a></button>
        </aside>
        <div class="slider-background">
            <div class="div-slideshow">
                <h1>Top of the day</h1>
                <div class="slider">
                    <a href="singleProd.php?id=11">
                    <div class="slideContent animation">
                        <img src="Images/SliderImg/sliderImg1.jfif" class="imgSliderSize" alt="">
                    </div>
                    </a>
                    <a href="register.php">
                    <div class="slideContent animation">
                        <img src="Images/SliderImg/sliderImg2.png" class="imgSliderSize" alt="">
                    </div>
                    </a>
                    <div class="slideContent animation" onclick="discount(20)">
                        <img src="Images/SliderImg/sliderImg3.jfif" class="imgSliderSize" alt="">
                    </div>
                    <div class="arrow">
                        <img src="Images/Icons/left-arrow.png" id="prev" onclick="slidechange(-1)" alt="">
                        <img src="Images/Icons/right-arrow.png" id="next" onclick="slidechange(1)" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <li><a href = 'index.php'>Home</a></li>
                <li><a href = 'aboutUs.php'>About Us</a></li>
                <li><a href ='ContactUs.php'>Contacts</a></li>
                <li><a href='Register.php' id="register">Register</a></li>
                <li><a href='login.php'  id="login">Login</a></li>
            </ul>
        <h1>Kategoritë</h1>
        <hr>
            <ul class="burgerAsideCategory">
                <li onclick="removeAside()"><a href="category.php?category=Aksesorë">Aksesorë</a></li>
                <li onclick="removeAside()"><a href="category.php?category=Laptop">Laptop</a></li>
                <li onclick="removeAside()"><a href="category.php?category=PC">PC</a></li>
                <li onclick="removeAside()"><a href="category.php?category=Phone/Tablet">Celulare/Tablet</a></li>
            </ul>
        </div>
        </aside>
    <div>
    <div>
        <h1 class="headerProd">Të Gjitha Produktet</h1>
        <div class="div-products" id="products"><?php include "products.php"?></div>
    </div><!-- 
    <div id="singleProd"></div>
    <div style="display: none;" id="category">
        <div id="nameCategory"></div>
        <div id="productsCategory"></div>
    </div> -->
    <div id="discount"></div>
    <footer class="footer">
        <h4>Disclaimer</h5>
            <h5>©2021 - AsterTech</h6>
    </footer>
    <script src="Js/main.js">
    </script>
</body>

</html>