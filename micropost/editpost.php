<?php
    include 'header.php';
?>

<!-- Validation for Non-loged in User -->
<?php
    if(!($_COOKIE['userID'])){
        header('Location: login.php');
    }
?>

<title>Edit Post</title>
</head>
<body>
    <div class="container centered">
        <h1 class="page-title">Edit Post</h1>
        
        <form action="editpost.php?postID=<?php echo $_GET['postID']?>" method="post">
            <textarea name="editpost" id="" cols="30" rows="5" placeholder="Write down what you think..."><?php echo $_GET['content']?></textarea>
            <br>
            <input type="submit" value="Post" class="btn btn-primary"/>
        </form>

    </div>


    <!-- Edit Post Function -->
    <?php
        if(isset($_POST['editpost'])){
            $sql = "UPDATE `posts` SET `content` = '".$_POST['editpost']."' WHERE `posts`.`postID` = '".$_GET['postID']."'";
            if ($conn->query($sql) === TRUE) {
                echo "Edit Complete";
                header('Location: index.php');
            } else {
                echo "Error";
            }
        }
    ?>

<!-- footer.php  -->
<?php
    include 'footer.php';
?>