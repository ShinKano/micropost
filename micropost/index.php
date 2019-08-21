<?php
    include 'header.php';
?>



<!-- Validation for Non-loged in User -->
<?php
    if(!($_COOKIE['userID'])){
        header('Location: login.php');
    }
?>

<title>Hello, world!</title>
</head>
<body>

    <div class="container centered">
        <div class="post">
            <h4 class="page-title">Say Something...</h4>
            <form action="index.php" method="post">
                <textarea name="post" id="" cols="30" rows="5" placeholder="Write down what you think..."></textarea>
                <br>
                <input type="submit" value="Post" class="btn btn-primary"/>
            </form>
        </div>


        <!-- Post Function -->
        <?php
            if(isset($_POST['post'])) {
                if($_POST['post'] != '') {
                    $sql = "INSERT INTO `posts` (`postUserID`, `content`, `date`) VALUES ('".$_COOKIE['userID']."', '".$_POST['post']."', CURRENT_TIME());";
                    if ($conn->query($sql) === TRUE) {
                        echo "🐟~ Thank You!";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Please write something...🐟";
                }
            }
        ?>

        
        <!-- Display Post Function -->
        <?php
            $sql = "SELECT * FROM `posts` ORDER BY `posts`.`postID` DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>

        <?php require_once('searchFromPosts.php');?>

                    <div class="posts">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-div">
                                <img class="profile-img" src="images/<?php echo searchPostImg($row['postUserID']);?>" />
                            </div>
                            <h5 class="card-title"><?php echo searchPostName($row['postUserID']) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['date'] ?></h6>
                            <p class="card-text"><?php echo $row['content'] ?></p>
                            <?php if($row['postUserID'] == $_COOKIE['userID']) { ?>
                                <a href="editpost.php?postID=<?php echo $row['postID'] ?>&content=<?php echo $row['content'] ?>" class="card-link">Edit</a>
                                <a href="deletepost.php?postID=<?php echo $row['postID'] ?>" class="card-link">Delete</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php
                }
            }
        ?>

    </div>


<!-- footer.php  -->
<?php
    include 'footer.php';
?>



