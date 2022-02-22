<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
$kategoria = $_GET['Kategoria'];
require_once '../controllers/ProductController.php';
$product = new ProductController;
if(isset($_POST['submit'])){
    $product -> insert($_POST, $kategoria);
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
        <input type="number" name = "cmimi">
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
            <br>
            <select name="lloji" id="">
                <option value="Laptop">Laptop</option>
                <option value="PC">PC</option>
            </select>
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