<?php
require_once "./controllers/shoppingController.php";
$shoppingController = new ShoppingController;
$shops = $shoppingController->readData();
?>
<hr style="margin:10px">
<h1 style="text-align:center;">Produktet e blera</h1>
<hr style="margin:10px">

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Emri</th>
            <th>Mbiemri</th>
            <th>Kodi produktit</th>
            <th>Qyteti</th>
            <th>Numri Telefonit</th>
            <th>Cmimi</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($shops as $shop) : ?>
            <tr>
                <td><?php echo $shop['id']; ?></td>
                <td><?php echo $shop['emri']; ?></td>
                <td><?php echo $shop['mbiemri'] ?></td>
                <td><?php echo $shop['kodiProd'] ?></td>
                <td><?php echo $shop['qyteti'] ?></td>
                <td><?php echo $shop['numriTel'] ?></td>
                <td><?php echo $shop['cmimi'] ?></td>
                <td><a href="./deleteShopping.php?id=<?php echo $shop['id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>