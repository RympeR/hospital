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
        $sql = "SELECT DISTINCT county_name from hospital_info where state_='".$_GET['state']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><td>County Name</td><td>Description</td><tr>";
        while($row = $res->fetch_assoc()){
            $sql_county = "SELECT DISTINCT description from county_description where county='".$row["county_name"]."' limit 0,1";
            $res_county = $conn->query($sql_county);
            $row_county = $res_county->fetch_assoc();
            echo "<tr><td><a href='city.php?county=".$row['county_name']."&state=".$_GET['state']."'>".
            $row['county_name']."</a></td><td>".$row_county["description"]."</td><tr>";
        }

        echo "</table>";
?>
