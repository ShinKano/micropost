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
            <h1 class="page-title"><?php echo search('username'); ?></h1>
            <h6><a href="editProfile.php">Edit Profile</a></h6>
        </div>


        
        <!-- Display Post Function -->
      
        <?php
            $sql = "SELECT * FROM `posts` WHERE `postUserID` = '".$_COOKIE['userID']."' ORDER BY `posts`.`postID` DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
        ?>


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