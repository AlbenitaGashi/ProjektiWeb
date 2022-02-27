<?php 
    require_once './controllers/ShoppingController.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $shoppingController= new shoppingController;
    $shoppingController -> delete($id);
    header('Location: ./dashboard.php');
?>