<?php 
    require_once "./controllers/ProductController.php";
    $prodController = new ProductController;
    $products = $prodController ->readData();
    ?>
    <hr style ="margin:10px">
    <h1 style = "text-align:center;">Produktet</h1>
    <hr style ="margin:10px">

    <table class = "table">
        <thead>
            <tr>
              <th>Kodi Produktit</th>
              <th>Emri</th>
              <th>Cmimi</th>
              <th>Zbritja</th>
              <th>Modified by</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product):?>
            <tr>
                <td><?php echo $product['kodiProd'];?></td>
                <td><?php echo $product['emri'];?></td>
                <td><?php   if($product["discount"] != 0){
                                echo $product['cmimi']."€";
                            }
                            else{
                                echo " ".calcDiscount($product['cmimi'], $product['discount'])."€";
                            }
                             ?></td>
                <td><?php echo $product['discount']."%"?></td>
                <td><?php echo $product['username']?></td>
                <td><a href="./editProduct.php?kodiProd=<?php echo $product['kodiProd'];?>">Edit</a></td>
                <td><a href="./deleteProduct.php?kodiProd=<?php echo $product['kodiProd'];?>">Delete</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
<?php
function calcDiscount($cmimi, $discount){
    return round(($cmimi - ($cmimi * $discount / 100)), 2);
}
?> 