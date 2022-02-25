<?php
//require "dbProd.php";
require_once "./controllers/ProductController.php";
$allProduct = new ProductController;
$products = $allProduct ->readData();
$count = 0;
foreach($products as $product){
    ?>
        <div class='product'>
        <h2> <?php echo $product['emri']?></h2>
        <?php if($product["discount"] != 0){ ?>
            <a href="singleProd.php?kodiProd=<?php echo $product['kodiProd']?>">
            <div style = "position:relative;">
                <img src='<?php echo $product["image"]?>'  alt="" >
                <label class = "discount">- <?php echo $product["discount"];?>%</label>
            </div>
            </a>
        <h3>Çmimi: <label style = "text-decoration :line-through"><?php echo $product['cmimi']?>€</label><label><?php echo " ".calcDiscount($product['cmimi'], $product['discount'])?>€</label></h3>
        <?php } if($product["discount"] == 0){?>
            <a href="singleProd.php?kodiProd=<?php echo $product['kodiProd']?>">
            <div onclick="location.href = 'singleProd.php'<?php echo $product['kodiProd'];?>" style = "position:relative;">
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
        $count++;
        if($_SERVER['SCRIPT_NAME'] == '/ProjektiWeb/index.php' && $count == 8){
            break;
        }
} 
function calcDiscount($cmimi, $discount){
    return round(($cmimi - ($cmimi * $discount / 100)), 2);
}
?> 