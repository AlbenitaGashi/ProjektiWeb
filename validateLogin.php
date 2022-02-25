<?php 
    session_start();
    require_once "./controllers/UserController.php";
    function validateEmptyData($username,$password){
        if(empty($username) || empty($password)){
            return true;
        }
        return false;
    }
    function validate($username, $password){
        $userController = new UserController;
        $users = $userController -> readData();
        foreach($users as $user){
            if($user['username'] == $username && $user['password'] == $password){
                echo "!";
                setcookie('username', $user['username'], time()+60*60*24);
                setcookie('emri', $user['emri'], time()+60*60*24);
                setcookie('mbiemri', $user['mbiemri'], time()+60*60*24);
                setcookie('roli', $user['roli'], time()+60*60*24);
                return true;
            }
        }
        return false;
    }
?>