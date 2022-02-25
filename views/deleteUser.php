<?php 
    require_once "../controllers/UserController.php";
    $userContoller = new UserController;
    if(isset($_GET['username'])){
        $username = $_GET['username'];
        $userContoller -> delete($username);
        header("Location: ../dashboard.php");
    }
?>