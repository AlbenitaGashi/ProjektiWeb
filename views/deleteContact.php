<?php 
    require_once '../controllers/ContactController.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $contactController = new ContactController;
    $contactController -> delete($id);
    header('Location: ../dashboard.php');
?>