<?php
        function search($key) {
            global $conn;
            $sql = "SELECT * FROM `users` WHERE `id` = '".$_COOKIE['userID']."' LIMIT 1";
            $result = $conn->query($sql);
            //var_dump($result);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row[$key];
            }
            return; 
        }

?>