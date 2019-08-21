<?php
    include 'header.php';
?>

<!-- Validation for Non-loged in User -->
<?php
    if(!($_COOKIE['userID'])){
        header('Location: login.php');
    }
?>


<!-- sign up Function -->
<?php
    $sql = "DELETE FROM `posts` WHERE `posts`.`postID` = '".$_GET['postID']."'";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error";
    }
?>