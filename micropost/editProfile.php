<?php
    include 'header.php';
?>
<?php require_once('searchFromPosts.php');?>
<!-- Validation for Non-loged in User -->
<?php
    if(!($_COOKIE['userID'])){
        header('Location: login.php');
    }
?>

<title>Your Account</title>
</head>
<body>

    <div class="container centered">


        <div class="profile">
            <div class="profile-img-div">
                <img class="profile-img" src="images/<?php echo searchPostImg($_COOKIE['userID']);?>" />
            </div>
            <br>
            <form action="editProfile.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" value="<?php echo search('username'); ?>" /><br><br><br>
                <p>Profile Picture</p>
                <input type="file" name="fileToUpload" id="fileToUpload"><br><br><br>
                <input type="submit" value="Edit Profile" name="submit">
            </form>
        </div>
    </div>

        <!-- Edit Profile Function -->
        <?php
            if($_POST) {

                $target_dir = "images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                $sql = "UPDATE `users` SET `username` = '".$_POST['username']."', `img` = '".basename($_FILES['fileToUpload']['name'])."' WHERE `users`.`id` = ".$_COOKIE['userID'].";";
                if ($conn->query($sql) === TRUE) {
                    //setcookie("username", $_POST['username'], time()+ 86400 * 30); //1day = 86400sec
                    header('Location: editProfile.php');
                } else {
                    echo "Error";
                }
            }
        ?>


<!-- footer.php  -->
<?php
    include 'footer.php';
?>