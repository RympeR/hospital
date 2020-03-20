<?php
        $servername = "127.0.0.1";
        $username = "hospital";
        $password = "1111";
        $dbname = "hospital";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection error: ");
        }
        if(!$conn->set_charset("utf8")){
            echo "ошибка кодировки";
        }
        $sql = "SELECT DISTINCT city from hospitals where state_='".
                $_GET['state']."' and county_name='".
                $_GET['county']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><td>City Name</td><tr>";
        while($row = $res->fetch_assoc()){
            echo "<tr><td><a href='hospitals.php?county=".$_GET['county']."&state=".$_GET['state']."&city=".$row['city']."'>".$row['city']."</a></td><tr>";
        }

        echo "</table>";
?>
