<?php 
    require_once "./controllers/shoppingController.php";
    $shoppingController = new ShoppingController;
    $shops = $shoppingController ->readData();
    ?>
    <hr style ="margin:10px">
    <h1 style = "text-align:center;">Produktet e blera</h1>
    <hr style ="margin:10px">

    <table class = "table">
        <thead>
            <tr>
              <th>ID</th>
              <th>Emri</th>
              <th>Mbiemri</th>
              <th>Kodi produktit</th>
              <th>Cmimi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($shops as $shop):?>
            <tr>
                <td><?php echo $shop['id'];?></td>
                <td><?php echo $shop['emri'];?></td>
                <td><?php echo $shop['mbiemri']?></td>
                <td><?php echo $shop['kodiProd']?></td>
                <td><?php echo $shop['cmimi']?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>