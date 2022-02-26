<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="stylesheet" href="Css/style.css">
    <?php
    include "header.php";
    include "search.php";
    require_once "./controllers/ProductController.php";
    $productControl = new ProductController;
    $id = $_GET['kodiProd'];
    $singleProd = $productControl->readAProduct($id);
    function calcDiscount($cmimi, $discount)
    {
        return round(($cmimi - ($cmimi * $discount / 100)), 2);
    }
    if(isset($_GET['submit'])){
        if(isset($_COOKIE['username'])){
            include './shoppingCard.php';
        }
        else{
            header('Location:login.php');
        }
    }
    ?>
</head>

<body>
    <div id="wrapper">
        <div class="singleProd" id="${specificProduct.id}">
            <?php if ($singleProd["discount"] != 0) { ?>
                <div style="position:relative;">
                    <img src="<?php echo $singleProd['image'] ?>" alt="">
                    <label class="discount">- <?php echo $singleProd["discount"]; ?>%</label>
                </div>
            <?php } ?>
            <?php if ($singleProd["discount"] == 0) { ?>
                <div>
                    <img src="<?php echo $singleProd['image'] ?>" alt="">
                </div>
            <?php } ?>
            <div>
                <h2>Emri:</h2>
                <p><?php echo $singleProd['emri'] ?></p>
                <h2>Çmimi:</h2>
                <?php if ($singleProd["discount"] != 0) { ?>
                    <h3><label style="text-decoration :line-through"><?php echo $singleProd['cmimi'] ?>€</label><label><?php echo " " . calcDiscount($singleProd['cmimi'], $singleProd['discount']) ?>€</label></h3>
                <?php }
                if ($singleProd["discount"] == 0) { 
                    ?>
                    <h2><label><?php echo $singleProd['cmimi'] ?>€</label></h2>
                <?php }
                if ($singleProd['kategoria'] == "Aksesori") {
                ?>
                    <h2>Pershkrimi:</h2>
                    <p><?php echo $singleProd['pershkrimi'] ?></p>
                <?php } 
                if($singleProd['kategoria'] == "Laptop" || $singleProd['kategoria'] == "PC"){
                    ?>
                    <h2>Sistemi Operativ:</h2>
                    <?php
                    echo $singleProd['os'];
                    ?>
                    <h2>Memoria:</h2>
                    <?php
                    echo $singleProd['storage'];
                    ?>
                    <h2>Ram:</h2>
                    <?php
                    echo $singleProd['ram'];
                    ?>
                    <h2>Procesori:</h2>
                    <?php
                    echo $singleProd['cpu'];
                }
                if($singleProd['kategoria'] == "SmartDevices"){
                    ?>
                    <h2>Memoria:</h2>
                    <?php
                    echo $singleProd['storage'];
                    ?>
                    <h2>Ram:</h2>
                    <?php
                    echo $singleProd['ram'];
                    ?>
                    <h2>Procesori:</h2>
                    <?php
                    echo $singleProd['cpu'];
                }
                ?>
                <div class="flex-Button">
                    <button class = "orderNow"><a href="shoppingCard.php?kodiProd=<?php echo $singleProd['kodiProd']?>">Porosit Tani</a></button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>