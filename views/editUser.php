<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "../Css/sharedStyle.css">
    <title>Document</title>
    <?php 
    require_once '../controllers/UserController.php';
    include '../header.php';
    if(isset($_GET['username'])){
        $username = $_GET['username'];
    }
    $userController = new UserController;
    $user = $userController -> readUser($username);
    if(isset($_POST['submit'])){
    $checked = checkFields($_POST);
    if($checked){
        echo "<script>confirm('Insertimi eshte kryer me sukses!')</script>";
        $userController -> update($_POST, $username);
        header("Location: ../dashboard.php");
    }
    else{
        echo "<script>alert('Gjitha fushat duhet te plotesohen!')</script>";
    }
}
function checkFields($fields){
    foreach($fields as $field){
        if($field == null || $field == ""){
            return false;
        }
    }
    return true;
}
    ?>
</head>
<body>
    <form method="POST">
        Emri:
        <input type="text" name = "emri" value = "<?php echo $user['emri'];?>">
        <br>
        Mbiemri:
        <input type="text" name = "mbiemri" value = "<?php echo $user['mbiemri'];?>">
        <br>
        DataLindjes:
        <input type="date" name = "dataLindjes" value = "<?php echo $user['dataLindjes'];?>">
        <br>
        Gjinia:
        <input type="text" name = "gjinia" value = "<?php echo $user['gjinia'];?>">
        <br>
        Email:
        <input type="email" name = "email" value = "<?php echo $user['email'];?>">
        <br>
        Username:
        <input type="text" name = "username" value = "<?php echo $user['username'];?>">
        <br>
        <input type="submit" name = "submit" value = "Update">
    </form>
</body>
</html>