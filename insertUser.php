<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/sharedStyle.css">
    <link rel="stylesheet" href="./Css/viewInsert.css">
    <title>Document</title>
    <?php
    require_once './controllers/UserController.php';
    include './header.php';
    $userController = new UserController;
    if (isset($_POST['submit'])) {
        $checked = checkFields($_POST);
        if ($checked) {
            $userController->insert($_POST);        
                echo "<script>confirm('Insertimi eshte kryer me sukses!');</script>";
                echo "<script>window.location = './dashboard.php';</script>";
        } else {
            echo "<script>alert('Gjitha fushat duhet te plotesohen!')</script>";
        }
    }
    function checkFields($fields)
    {
        foreach ($fields as $field) {
            if ($field == null || $field == "") {
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
            <input type="text" class="form__field" placeholder="Name" name="emri" required />
            <label for="name" class="form__label">Emri:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="mbiemri" required />
            <label for="name" class="form__label">Mbiemri:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="date" class="form__field" placeholder="Name" name="dataLindjes" required />
            <label for="name" class="form__label">DataLindjes:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="gjinia" required />
            <label for="name" class="form__label">Gjinia:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="email" class="form__field" placeholder="Name" name="email" required />
            <label for="name" class="form__label">Email:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="text" class="form__field" placeholder="Name" name="username" required />
            <label for="name" class="form__label">Username:</label>
        </div>
        <br>
        <div class="form__group field">
            <input type="password" class="form__field" placeholder="Name" name="password" required />
            <label for="name" class="form__label">Password:</label>
        </div>
        <br>
        <input type="submit" name="submit" value="Insert" class="button">
    </form>
</body>

</html>