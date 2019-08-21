<?php
    function searchPostName($postUserID) {
        global $conn;
        $sql = "SELECT * FROM `users` WHERE `id` = '".$postUserID."' LIMIT 1";
        $result = $conn->query($sql);
        //var_dump($result);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['username'];
        }
        return; 
    };

    function searchPostImg($postUserID) {
        global $conn;
        $sql = "SELECT * FROM `users` WHERE `id` = '".$postUserID."' LIMIT 1";
        $result = $conn->query($sql);
        //var_dump($result);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($row['img']) {
                return $row['img'];
            } else {
                return "noimg.jpg";
            }
            
        }
        return; 
    };
?>
