<?php
require_once "./controllers/ProductController.php";
require_once "./controllers/shoppingController.php";
?>

<head>
    <link rel="stylesheet" href="./Css/style.css">
</head>
<?php 
if(isset($_GET['kodiProd']) && isset($_COOKIE['username'])) {
    $productController = new ProductController;
    $product = $productController->readAProduct($_GET['kodiProd']);
} 
else{
    header('Location:login.php');
}
$cmimi;
if ($product["discount"] != 0) {
    $cmimi = calcDiscount($product['cmimi'], $product['discount']);
}
else{
    $cmimi = $product['cmimi'];
}
function calcDiscount($cmimi, $discount)
{
    $cmimi = round(($cmimi - ($cmimi * $discount / 100)), 2);
    return $cmimi;
}
if(isset($_POST['submit'])){
    $shoppingController = new ShoppingController;
    $shoppingController -> insert($_POST, $product['kodiProd'], $cmimi);
}
?>
<div class="shoppingCardBody">
    <h1>Shopping card</h1>
    <form class="shoppingCard" method = "POST">
        <div>
            Emri:
            <input type="text" name="emri">
            Mbiemri:
            <input type="text" name="mbiemri">
            Adresa:
            <input type="text" name="adresa">
            Qyteti:
            <input type="text" name="qyteti">
            Kodi postal:
            <input type="number" name="kodipostal">
            Telefoni:
            <input type="number" name="numriTel">
            <br>
            <input type="submit" name="submit" value="Dergo">
            <label>Vini re!! Pagesa behet vetem ne cash!</label>
        </div>
        <div>
            <div class="shoppingImage">
                <img src="<?php echo $product['image'] ?>">
            </div>
            <div>
                <b><label>Emri : </b><?php echo $product['emri'] ?></label>
                <b><label>Kodi produktit:</b> <?php echo $product['kodiProd'] ?></label>
                <b><label>Cmimi:</b></label>
                <?php if ($product["discount"] != 0) { ?>
                    <label style="text-decoration :line-through"><?php echo $product['cmimi'] ?>€</label><label><?php echo " " . $cmimi ?>€</label>
                <?php }
                if ($product["discount"] == 0) {
                ?>
                    <label><?php echo $cmimi?>€</label>
                <?php }
                ?>
            </div>
        </div>
    </form>
</div>