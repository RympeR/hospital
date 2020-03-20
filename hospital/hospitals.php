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
        $sql = "SELECT hospital_name from hospitals where state_='".
                $_GET['state']."' and county_name='".
                $_GET['county']."' and city='".$_GET['city']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><td>Hospital_name Name</td><tr>";
        while($row = $res->fetch_assoc()){
            echo "<tr><td><a href='hospital_info.php?hospital=".$row['hospital_name']."&state=".$_GET['state']."&county=".$_GET['county']."'>".$row['hospital_name']."</a></td><tr>";
        }

        echo "</table>";
?>
