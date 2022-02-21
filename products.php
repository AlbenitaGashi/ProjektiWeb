<?php 
require "dbProd.php";
foreach($products as $product){
    ?>
        <div class='product'>
        <h2> <?php echo $product['name']?></h2>
        <?php if($product["discount"] != 0){ ?>
            <a href="singleProd.php?id=<?php echo $product['id']?>">
            <div style = "position:relative;">
                <img src='Images/ProductImg/<?php echo $product["imagePath"]?>'  alt="" >
                <label class = "discount">- <?php echo $product["discount"];?>%</label>
            </div>
            </a>
        <h3>Çmimi: <label style = "text-decoration :line-through"><?php echo $product['cmimi']?>€</label><label><?php echo " ".calcDiscount($product['cmimi'], $product['discount'])?>€</label></h3>
        <?php } if($product["discount"] == 0){?>
            <a href="singleProd.php?id=<?php echo $product['id']?>">
            <div onclick="location.href = 'singleProd.php'<?php echo $_SESSION['id'] = $product['id'];?>" style = "position:relative;">
                <img src='Images/ProductImg/<?php echo $product["imagePath"]?>'  alt="" >
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
function calcDiscount($cmimi, $discount){
    return $cmimi - ($cmimi * $discount / 100);
}
?> 