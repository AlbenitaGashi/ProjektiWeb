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
    $userController = new UserController;
    if(isset($_POST['submit'])){
    $checked = checkFields($_POST);
    if($checked){
        echo "<script>confirm('Insertimi eshte kryer me sukses!')</script>";
        $userController -> insert($_POST);
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
        <input type="text" name = "emri">
        <br>
        Mbiemri:
        <input type="text" name = "mbiemri">
        <br>
        DataLindjes:
        <input type="date" name = "dataLindjes">
        <br>
        Gjinia:
        <input type="text" name = "gjinia">
        <br>
        Email:
        <input type="email" name = "email">
        <br>
        Username:
        <input type="text" name = "username">
        <br>
        Password:
        <input type="text" name = "password">
        <br>
        <input type="submit" name = "submit" value = "insert">
    </form>
</body>
</html>