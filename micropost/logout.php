<?php
    setcookie("userID", $_POST['userID'], time()-100000000000);//delete cockie
    header('Location: login.php');
?>