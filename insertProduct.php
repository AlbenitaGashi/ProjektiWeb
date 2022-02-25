<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = '../Css/sharedStyle.css'>
    <title>Document</title>
</head>
<?php 
$kategoria = $_GET['kategoria'];
require_once 'controllers/ProductController.php';
include 'header.php';
$product = new ProductController;
if(isset($_POST['submit'])){
    $checked = checkFields($_POST);
    if($checked){
        echo "<script>confirm('Insertimi eshte kryer me sukses!')</script>";
        $product -> insert($_POST, $kategoria);
    }
    else{
        echo "<script>alert('Gjitha fushat duhet te plotesohen!')</script>";
    }
}
function checkFields($fields){
    foreach($fields as $field){
        if($field == null || $field == ""){
            echo $field;
            return false;
        }
    }
    return true;
}
?>
<body>
    <form method="POST">
        Image:
        <input type="file" name="image">
        <br>
        KodiProd:
        <input type="number" name="kodiProd">
        <br>
        Name:
        <input type="text" name = "emri">
        <br>
        Cmimi:
        <input type="number" step = "0.01" name = "cmimi">
        <br>
        Discount:
        <input type="number" name = "discount">
        <br>
        <?php 
        if($kategoria == "PC" || $kategoria == "Laptop"){
            ?>
            Sistemi Operativ:
            <input type="text" name = "os">
            <br>
            Storage:
            <input type="text" name = "storage">
            <br>
            Ram:
            <input type="text" name = "ram">
            <br>
            Procesori:
            <input type="text" name = "cpu">
            <br><!-- 
            <select name="lloji">
                <option value=""></option>
                <option value="Laptop">Laptop</option>
                <option value="PC">PC</option>
            </select> -->
        <?php
        }
        if($kategoria == "SmartDevices"){
            ?>
            Storage:
            <input type="text" name = "storage">
            <br>
            Ram:
            <input type="text" name = "ram">
            <br>
            Procesori:
            <input type="text" name = "cpu">
            <br>
            <?php
        }
        if($kategoria == "Aksesori"){
            ?>
            Pershkrimi:
            <input type="text" name = "pershkrimi">
            <?php
        }
        ?>
        <input type="submit" name = "submit" value = "Save">
    </form>
</body>
</html>