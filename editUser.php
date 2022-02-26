<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "./Css/sharedStyle.css">
    <link rel="stylesheet" href="./Css/viewInsert.css">
    <title>Document</title>
    <?php 
    require_once './controllers/UserController.php';
    include './header.php';
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
        header("Location: ./dashboard.php");
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
<form method="POST" class="forma">
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="emri" value = "<?php echo $user['emri'];?>" required />
            <label for="name" class="form__label">Emri:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="mbiemri"  value = "<?php echo $user['mbiemri'];?>" required />
            <label for="name" class="form__label">Mbiemri:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="date" class="form__field" placeholder="Name" name="dataLindjes" value = "<?php echo $user['dataLindjes'];?>" required />
            <label for="name" class="form__label">DataLindjes:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="gjinia" value = "<?php echo $user['gjinia'];?>" required />
            <label for="name" class="form__label">Gjinia:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="email" class="form__field" placeholder="Name" name="email" value = "<?php echo $user['email'];?>" required />
            <label for="name" class="form__label">Email:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="username" value = "<?php echo $user['username'];?>" required />
            <label for="name" class="form__label">Username:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="password" class="form__field" placeholder="Name" name="password" value = "<?php echo $user['password'];?>" required />
            <label for="name" class="form__label">Password:</label>
        </div>
        <br>
        <input type="submit" name = "submit" value = "Edit" class="button">
    </form>
</body>
</html>