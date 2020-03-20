<?php
        
        $servername = "localhost";
        $username = "admin_admin";
        $password = "cJ9Mhri450";
        $dbname = "admin_hospital";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection error: ");
        }
        if(!$conn->set_charset("utf8")){
            echo "ошибка кодировки";
        }
        $sql = "SELECT DISTINCT COUNTY from pharmacy where STATE='".$_GET['state']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><td>County Name</td><td>Description</td><tr>";
        while($row = $res->fetch_assoc()){
            $sql_county = "SELECT DISTINCT description from county_description_pharmacy where county='".$row["COUNTY"]."' limit 0,1";
            $res_county = $conn->query($sql_county);
            $row_county = $res_county->fetch_assoc();
            echo "<tr><td><a href='city_p.php?county=".$row['COUNTY']."&state=".$_GET['state']."'>".
            $row['COUNTY']."</a></td><td>".$row_county["description"]."</td><tr>";
        }

        echo "</table>";
?>
