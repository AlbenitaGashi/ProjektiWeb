<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <title>Search result</title>
    <?php
    include 'header.php';
    include 'search.php';
    ?>

<body>
    <?php
    require_once "./controllers/ProductController.php";
    $allProduct = new ProductController;
    $products = $allProduct->searchresult($_GET['search']);
    if ($products == null) {
        echo "<h1 class='categoryHeader'>Nuk eshte gjetur asnje produkt</h1>";
    } else {
        echo "<h1 class='categoryHeader'>Rezultatet per: \"" . $_GET['search'] . "\"</h1>" . "<br>"; ?>
        <div style="display:flex; flex-wrap:wrap;" id="products">
            <?php
            foreach ($products as $product) {
            ?>
                <div class='product'>
                    <h2> <?php echo $product['emri'] ?></h2>
                    <?php if ($product["discount"] != 0) { ?>
                        <a href="singleProd.php?kodiProd=<?php echo $product['kodiProd'] ?>">
                            <div style="position:relative;">
                                <img src='<?php echo $product["image"] ?>' alt="">
                                <label class="discount">- <?php echo $product["discount"]; ?>%</label>
                            </div>
                        </a>
                        <h3>Çmimi: <label style="text-decoration :line-through"><?php echo $product['cmimi'] ?>€</label><label><?php echo " " . calcDiscount($product['cmimi'], $product['discount']) ?>€</label></h3>
                    <?php }
                    if ($product["discount"] == 0) { ?>
                        <a href="singleProd.php?kodiProd=<?php echo $product['kodiProd'] ?>">
                            <div onclick="location.href = 'singleProd.php'<?php echo $product['kodiProd']; ?>" style="position:relative;">
                                <img src='<?php echo $product["image"] ?>' alt="">
                            </div>
                        </a>
                        <h3>Çmimi: <label><?php echo $product['cmimi'] ?>€</label></h3>
                    <?php } ?>
                    <div class="flex-Button">
                        <button class="orderNow"><a href="shoppingCard.php?kodiProd=<?php echo $product['kodiProd'] ?>">Porosit Tani</a></button>
                    </div>
                </div>
        <?php
            }
        }
        function calcDiscount($cmimi, $discount)
        {
            return round(($cmimi - ($cmimi * $discount / 100)), 2);
        }
        ?>
        </div>
        </head>
</body>

</html>