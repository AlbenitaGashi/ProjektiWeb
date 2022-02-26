<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "./Css/style.css">
    <title>Products</title>
    <?php 
        include 'header.php';
        include 'search.php';
    ?>
    <ul class = "productPageCategory">
        <li><a href="category.php?category=Aksesori">Aksesorë</a></li>
        <li><a href="category.php?category=PC">PC</a></li>
        <li><a href="category.php?category=Laptop">Laptop</a></li>
        <li><a href="category.php?category=Phone/Tablet">Celulare/Tablet</a></li>
    </ul>
</head>
<body>
    <div class="div-products" id="products"><?php include "products.php"?></div>
</body>
</html>