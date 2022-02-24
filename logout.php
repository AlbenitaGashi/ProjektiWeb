<?php
    session_start();
    session_destroy();
    setcookie('username', ' ', time()-60*60*24);
    setcookie('emri', ' ', time()-60*60*24);
    setcookie('mbiemri', ' ', time()-60*60*24);
    setcookie('roli', ' ', time()-60*60*24);
    header("Location: login.php");
?>