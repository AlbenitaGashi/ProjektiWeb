<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/sharedStyle.css">
    <?php
    session_start();
    include "header.php";
    include "search.php";
    ?> 
</head>

<body>
    <div class="main-content" id="hide-main-content">
        <aside class="aside">
            <h1>Kategoritë</h1>
            <button><a href="category.php?category=Aksesori">Aksesorë</a></button>
            <button><a href="category.php?category=Laptop">Laptop</a></button>
            <button><a href="category.php?category=PC">PC</a></button>
            <button><a href="category.php?category=SmartDevices">SmartDevices</a></button>
        </aside>
        <div class="slider-background">
            <div class="div-slideshow">
                <h1>News</h1>
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
                    <div class="slideContent animation" >
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
    <div>
    <div>
        <h1 class="headerProd">Produktet e dites</h1>
        <div class="div-products" id="products"><?php include "products.php"?></div>
    </div>
    <div id="discount"></div>
    <footer class="footer">
        <h4>Disclaimer</h5>
            <h5>©2021 - AsterTech</h6>
    </footer>
    <script src="Js/main.js">
    </script>
</body>

</html>