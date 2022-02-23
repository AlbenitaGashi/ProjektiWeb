<?php 
    include "header.php";
    include "search.php";
    //require "dbProd.php";
    require_once "./controllers/ProductController.php";
    $prodController = new ProductController;
    $products = $prodController -> readData();
    $category = $_GET['category'];
    echo "<h1 class='categoryHeader'>Kategoria: ".$category."</h1><div id = 'productsCategory'>";
    foreach($products as $product){
        if($product['kategoria'] == $category){?>
            <div class='product'>
            <h2> <?php echo $product['emri']?></h2>
            <?php if($product["discount"] != 0){ ?>
                <a href="singleProd.php?kodiProd=<?php echo $product['kodiProd']?>">
                <div style = "position:relative;">
                    <img src='<?php echo $product["image"]?>'  alt="" >
                    <label class = "discount">-<?php echo $product["discount"];?>%</label>
                </div>
                </a>
            <h3>Çmimi: <label style = "text-decoration :line-through"><?php echo $product['cmimi']?>€</label><label><?php echo " ".calcDiscount($product['cmimi'], $product['discount'])?>€</label></h3>
            <?php } if($product["discount"] == 0){?>
                <a href="singleProd.php?kodiProd=<?php echo $product['kodiProd']?>">
                <div onclick="location.href = 'singleProd.php'<?php $product['kodiProd'];?>" style = "position:relative;">
                    <img src='<?php echo $product["image"]?>'  alt="" >
                </div>
                </a>
            <h3>Çmimi: <label><?php echo $product['cmimi']?>€</label></h3>
            <?php }?>
            <div class="flex-Button-Heart">
                <button class = "addToCartIndex">Shto ne shporte</button>
                <img id="heartIconStyle" src="Images/Icons/heartIcon.png" alt="">
            </div>
            </div>
            <?php
        }
    } 
    function calcDiscount($cmimi, $discount){
        return $cmimi - ($cmimi * $discount / 100);
    }
    echo "</div>";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>