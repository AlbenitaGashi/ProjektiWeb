<?php 
    require_once '../controllers/ProductController.php';
    if(isset($_GET['kodiProd'])){
        $kodiProd = $_GET['kodiProd'];
    }
    $productController = new ProductController;
    $productController -> delete($kodiProd);
    header('Location: dashboard.php');
?>