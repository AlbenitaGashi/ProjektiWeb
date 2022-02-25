<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/sharedStyle.css">
    <link rel="stylesheet" href="Css/dashboardStyle.css">
    <title>Document</title>
    <?php include 'header.php';?>
    <nav>
        <ul class="nav-style">
            <li><a href="./insertProduct.php?kategoria=PC">Shto PC</a></li>
            <li><a href="./insertProduct.php?kategoria=Laptop">Shto Laptop</a></li>
            <li><a href="./insertProduct.php?kategoria=SmartDevices">Shto SmartDevice</a></li>
            <li><a href="./insertProduct.php?kategoria=Aksesori">Shto Aksesorë</a></li>
            <li><a href="./insertUser.php?admin=true">Shto Admin</a></li>
            <li><a href="./insertUser.php">Shto User</a></li>
        </ul>
    </nav>
    <?php
    include './showProducts.php';
    include './showContacts.php';
    include './showUsers.php';
    ?>
</head>
<body>
</body>
</html>