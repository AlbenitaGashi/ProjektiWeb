<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/sharedStyle.css">
    <link rel="stylesheet" href="./Css/viewInsert.css">


    <title>Document</title>
</head>
<?php

$kategoria = $_GET['kategoria'];
require_once './controllers/ProductController.php';
include './header.php';
$product = new ProductController;
if (isset($_POST['submit'])) {
    $checked = checkFields($_POST);
    if ($checked) {
        echo "<script>confirm('Insertimi eshte kryer me sukses!')</script>";
        $product->insert($_POST, $kategoria);
        header("Location: ./dashboard.php");
    } else {
        echo "<script>alert('Gjitha fushat duhet te plotesohen!')</script>";
    }
}
function checkFields($fields)
{
    foreach ($fields as $field) {
        if ($field == null || $field == "") {
            return false;
        }
    }
    return true;
}
?>

<body>
    <form method="POST" class="forma">
        <p class="upmarg">Image:</p>
        <div class="upload-btn-wrapper">
            <button class="btn">Upload a file</button>
            <input type="file" name="image" />
        </div>
        <br>

        <div class="form__group field">
            <input type="number" class="form__field" placeholder="Name" name="kodiProd" required />
            <label for="name" class="form__label">Kodi produktit:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="emri" required />
            <label for="name" class="form__label">Emri:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="number" step="0.01" class="form__field" placeholder="Name" name="cmimi" required />
            <label for="name" class="form__label">Cmimi:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="number" class="form__field" placeholder="Name" name="discount" required />
            <label for="name" class="form__label">Discount:</label>
        </div>
        <br>

        <?php
        if ($kategoria == "PC" || $kategoria == "Laptop") {
        ?>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="os" required />
                <label for="name" class="form__label">Sistemi Operativ:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="storage" required />
                <label for="name" class="form__label">Storage:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="ram" required />
                <label for="name" class="form__label">Ram:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="cpu" required />
                <label for="name" class="form__label">Procesori:</label>
            </div>
        <?php
        }
        if ($kategoria == "SmartDevices") {
        ?>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="storage" required />
                <label for="name" class="form__label">Storage:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="ram" required />
                <label for="name" class="form__label">Ram:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="cpu" required />
                <label for="name" class="form__label">Procesori:</label>
            </div>
        <?php
        }
        if ($kategoria == "Aksesori") {
        ?>
            <div class="form__group field">
                <input type="text" class="form__field" placeholder="Name" name="pershkrimi" required />
                <label for="name" class="form__label">Pershkrimi:</label>
            </div>
        <?php
        }
        ?>
        <br>
        <input type="submit" name="submit" value="Save" class="button">
    </form>
</body>

</html>