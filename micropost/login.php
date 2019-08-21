<?php
    include 'header.php';
?>


<title>Login</title>
</head>
<body>
    <div class="container centered">
        <h1 class="page-title">Log In</h1>

        <form action="login.php" method="post">
            <p>User Name</p>
            <input type="text" name="username"><br><br>
            <p>Password</p>
            <input type="password" id="pass" name="password" minlength="5" required><br><br>
            
            <input type="submit" value="Log In">
        </form>

        <!-- Log in Function -->
        <?php
            $sql = "SELECT * FROM `users`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                if(isset($_POST['username']) && isset($_POST['password'])) {
                    while($row = $result->fetch_assoc()) {
                        if ($row["username"] == $_POST['username'] || $row["password"] == md5($_POST['password'])) {
                            setcookie("userID", $row["id"], time()+ 86400 * 30); //1day = 86400sec
                            header('Location: index.php');
                        }else {
                            echo "<h2>log in error!</h2>";
                            
                        }
                    } 
                }
            }
        ?>


    </div>




<!-- footer.php  -->
<?php
    include 'footer.php';
?>