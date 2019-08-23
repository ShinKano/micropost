<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

<!-- db.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbpr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!-- db.php end -->

<?php if(isset($_COOKIE['userID'])){
    include 'searchFunc.php';
    $username = search('username');
}
?>

<!-- leyout from here... -->

<div class="header">
    <!-- <div class="logo"><a href="index.php">Shintter</a></div> -->
    <div class="logo"><a href="index.php"><img src="images/shintter_2.png" class="logo-img"></a></div>
    <div class="menu">

        <?php if(isset($_COOKIE['userID'])): ?>
            <ul>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="profile.php"><?= $username; ?></a></li>
            </ul>
        <?php else: ?>
            <ul>
                <li><a href="login.php">Log In</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        <?php endif; ?>


    </div>
    <div class="clear"></div>
</div>
