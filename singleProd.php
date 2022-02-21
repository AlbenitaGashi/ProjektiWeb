<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />    <link rel="stylesheet" href="Css/style.css"> 
    <?php 
    include "header.php";
    include "search.php";
    include "dbProd.php";
    $id = $_GET['id'];
    function calcDiscount($cmimi, $discount){
        return $cmimi - ($cmimi * $discount / 100);
    }
?>
</head>
<body>
<div id="wrapper">
        <div class="singleProd" id="${specificProduct.id}">
        <?php if($products[$id]["discount"] != 0){ ?>
            <div style = "position:relative;">
                <img src="Images/ProductImg/<?php echo $products[$id]['imagePath']?>" alt="" >
                <label class = "discount">- <?php echo $products[$id]["discount"];?>%</label>
            </div>
        <?php } ?>
        <?php if($products[$id]["discount"] == 0){ ?>
            <div>
                <img src="Images/ProductImg/<?php echo $products[$id]['imagePath']?>" alt="" >
            </div>
        <?php } ?>
            <div>
                <h1>Emri:</h1>
                <p><?php echo $products[$id]['name']?></p>
                <h1>Çmimi:</h1>
                <?php if($products[$id]["discount"] != 0){ ?>
                 <h3>Çmimi: <label style = "text-decoration :line-through"><?php echo $products[$id]['cmimi']?>€</label><label><?php echo " ".calcDiscount($products[$id]['cmimi'], $products[$id]['discount'])?>€</label></h3>
        <?php } if($products[$id]["discount"] == 0){?>
            <h3>Çmimi: <label><?php echo $products[$id]['cmimi']?>€</label></h3>
        <?php }?>
                <h1>Pershkrimi:</h1>
                <p><?php echo $products[$id]['descript']?></p>
                    <div class= "singlePButton">
                        <div class="heartButtonCart">
                            <button>Shto ne shporte</button>
                             <img id="heartIconStyle" src="Images/Icons/heartIcon.png" alt="">
                        </div>
                        <button class = "addToCart" onclick="orderNow('${id}')">Porosit tani!</button>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>