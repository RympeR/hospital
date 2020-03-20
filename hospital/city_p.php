<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        $sql = "SELECT DISTINCT CITY from pharmacy where STATE ='".
                $_GET['state']."' and COUNTY='".
                $_GET['county']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><td>City Name</td><td>Description</td><tr>";
        while($row = $res->fetch_assoc()){
            $sql_city = "SELECT DISTINCT description from city_description_pharmacy where city='".$row["CITY"]."' limit 0,1";
            $res_city = $conn->query($sql_city);
            $row_city = $res_city->fetch_assoc();
            echo "<tr><td><a href='pharmacy_p.php?county=".$_GET['county']."&state=".$_GET['state']."&city=".
            $row['CITY']."'>".$row['CITY']."</a></td><td>".$row_city["description"]."</td><tr>";
        }

        echo "</table>";

?>


</body>
</html>

