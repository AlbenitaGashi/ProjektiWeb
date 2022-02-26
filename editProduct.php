<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/sharedStyle.css">
    <link rel="stylesheet" href="./Css/viewInsert.css">
    <title>Document</title>
    <?php
    require_once './controllers/ProductController.php';
    include './header.php';
    if (isset($_GET['kodiProd'])) {
        $kodiProd = $_GET['kodiProd'];
    }
    $productController = new ProductController;
    $product = $productController->readAProduct($kodiProd);
    $kategoria = $product['kategoria'];
    if (isset($_POST['submit'])) {
        $checked = checkFields($_POST);
        if ($checked) {
            echo "<script>confirm('Insertimi eshte kryer me sukses!')</script>";
            $productController->update($_POST, $kodiProd, $kategoria);
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
</head>

<body>
    <form method="POST" class="forma">
        <div class="form__group field">
            <input type="text" class="form__field" name="image" value="<?php echo substr($product['image'], 20); ?>">
            <label for="name" class="form__label">Image:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="number" class="form__field" name="kodiProd" value="<?php echo $product['kodiProd']; ?>">
            <label for="name" class="form__label">KodiProd:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" name="emri" value="<?php echo $product['emri']; ?>">
            <label for="name" class="form__label">Emri:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="number" class="form__field" step="0.01" name="cmimi" value="<?php echo $product['cmimi']; ?>">
            <label for="name" class="form__label">Cmimi:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="number" class="form__field" name="discount" value="<?php echo $product['discount']; ?>">
            <label for="name" class="form__label">Discount:</label>
        </div>
        <br>
        <?php
        if ($kategoria == "PC" || $kategoria == "Laptop") {
        ?>
            <div class="form__group field">
                <input type="text" class="form__field" name="os" value="<?php echo $product['os']; ?>">
                <label for="name" class="form__label">Sistemi Operativ:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" name="storage" value="<?php echo $product['storage']; ?>">
                <label for="name" class="form__label">Storage:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" name="ram" value="<?php echo $product['ram']; ?>">
                <label for="name" class="form__label">Ram:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" name="cpu" value="<?php echo $product['cpu']; ?>">
                <label for="name" class="form__label">Procesori:</label>
            </div>
            <br>
        <?php
        }
        if ($kategoria == "SmartDevices") {
        ?>
            <div class="form__group field">
                <input type="text" class="form__field" name="storage" value="<?php echo $product['storage']; ?>">
                <label for="name" class="form__label">Storage:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" name="ram" value="<?php echo $product['ram']; ?>">
                <label for="name" class="form__label">Ram:</label>
            </div>
            <br>
            <div class="form__group field">
                <input type="text" class="form__field" name="cpu" value="<?php echo $product['cpu']; ?>">
                <label for="name" class="form__label">Procesori:</label>
            </div>
            <br>
        <?php
        }
        if ($kategoria == "Aksesori") {
        ?>
            <div class="form__group field">
                <input type="text" class="form__field" name="pershkrimi" value="<?php echo $product['pershkrimi']; ?>">
                <label for="name" class="form__label">Pershkrimi:</label>
            </div>
            <br>
        <?php
        }
        ?>
        <input type="submit" name="submit" value="Update" class="button">
    </form>
</body>

</html>