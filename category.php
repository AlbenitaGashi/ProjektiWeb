<?php 
    include "header.php";
    include "search.php";
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
            <div class="flex-Button">
                <button class = "orderNow"><a href="shoppingCard.php?kodiProd=<?php echo $product['kodiProd']?>">Porosit Tani</a></button>
            </div>
            </div>
            <?php
        }
    } 
    function calcDiscount($cmimi, $discount){
        return round(($cmimi - ($cmimi * $discount / 100)), 2);
    }
    echo "</div>";
    ?>