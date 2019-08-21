<?php
    include 'header.php';
?>


<title>Sign Up</title>
</head>
<body>
    <div class="container centered">
        <h1 class="page-title">Sign Up</h1>

        <form action="signup.php" method="post" enctype="multipart/form-data">
            <p>User Name</p>
            <input type="text" name="username" required><br><br>
            <p>Password</p>
            <input type="password" id="pass" name="password" required><br><br>
            <p>Profile Picture</p>
            <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
            <input type="submit" value="Sign Up" name="submit">
        </form>

        <!-- sign up Function -->
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

                $sql = "INSERT INTO `users` (`username`, `password`, `img`) VALUES('".$_POST['username']."', '".MD5($_POST['password'])."','".basename($_FILES['fileToUpload']['name'])."');";
                if ($conn->query($sql) === TRUE) {
                    //setcookie("username", $_POST['username'], time()+ 86400 * 30); //1day = 86400sec
                    header('Location: login.php');
                } else {
                    echo "Error";
                }
            }
        ?>

    </div>




<!-- footer.php  -->
<?php
    include 'footer.php';
?>