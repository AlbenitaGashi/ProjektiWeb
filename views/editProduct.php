<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Css/sharedStyle.css">
    <title>Document</title>
    <?php 
    require_once '../controllers/ProductController.php';
    include '../header.php';
    if(isset($_GET['kodiProd'])){
        $kodiProd = $_GET['kodiProd'];
    }
    $productController = new ProductController;
    $product = $productController -> readAProduct($kodiProd);
    $kategoria = $product['kategoria'];
    /* if(isset($_POST['submit'])){
        $productController -> update($_POST, $kodiProd, $kategoria);
    } */
    if(isset($_POST['submit'])){
    $checked = checkFields($_POST);
    if($checked){
        echo "<script>confirm('Insertimi eshte kryer me sukses!')</script>";
        $productController -> update($_POST, $kodiProd, $kategoria);
    }
    else{
        echo "<script>alert('Gjitha fushat duhet te plotesohen!')</script>";
    }
}
function checkFields($fields){
    foreach($fields as $field){
        if($field == null || $field == ""){
            return false;
        }
    }
    return true;
}
    ?>
</head>
<body>
    <form method="POST">
        Image:
        <input type="text" name="image" value = "<?php echo $product['image'];?>">
        <br>
        KodiProd:
        <input type="number" name="kodiProd" value = "<?php echo $product['kodiProd'];?>">
        <br>
        Name:
        <input type="text" name = "emri" value = "<?php echo $product['emri'];?>">
        <br>
        Cmimi:
        <input type="number" step = "0.01" name = "cmimi" value = "<?php echo $product['cmimi'];?>">
        <br>
        Discount:
        <input type="number" name = "discount" value = "<?php echo $product['discount'];?>">
        <br>
        <?php 
        if($kategoria == "PC" || $kategoria == "Laptop"){
            ?>
            Sistemi Operativ:
            <input type="text" name = "os" value = "<?php echo $product['os'];?>">
            <br>
            Storage:
            <input type="text" name = "storage" value = "<?php echo $product['storage'];?>">
            <br>
            Ram:
            <input type="text" name = "ram" value = "<?php echo $product['ram'];?>">
            <br>
            Procesori:
            <input type="text" name = "cpu" value = "<?php echo $product['cpu'];?>">
            <br>
        <?php
        }
        if($kategoria == "SmartDevices"){
            ?>
            Storage:
            <input type="text" name = "storage" value = "<?php echo $product['storage'];?>">
            <br>
            Ram:
            <input type="text" name = "ram" value = "<?php echo $product['ram'];?>">
            <br>
            Procesori:
            <input type="text" name = "cpu" value = "<?php echo $product['cpu'];?>">
            <br>
            <?php
        }
        if($kategoria == "Aksesori"){
            ?>
            Pershkrimi:
            <input type="text" name = "pershkrimi" value = "<?php echo $product['pershkrimi'];?>">
            <?php
        }
        ?>
        <input type="submit" name = "submit" value = "Update">
    </form>
</body>
</html>