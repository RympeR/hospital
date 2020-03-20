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
        $sql = "SELECT NAME from pharmacy where STATE='".
                $_GET['state']."' and COUNTY='".
                $_GET['county']."' and CITY='".$_GET['city']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><td>Pharmacy name</td><tr>";
        while($row = $res->fetch_assoc()){
            echo "<tr><td><a href='pharmacy_info.php?pharmacy=".$row['NAME']."&state=".$_GET['state']."&county=".
            $_GET['county']."&city=".$_GET['city']."'>".$row['NAME']."</a></td><tr>";
        }

        echo "</table>";
        echo "<br>";


        $sql = "SELECT hospital_name from hospital_info where state_='".
        $_GET['state']."' and county_name='".
        $_GET['county']."' and city='".$_GET['city']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        echo "<tr><td>Hospital name</td><tr>";
        while($row = $res->fetch_assoc()){
            echo "<tr><td><a href='hospital_info.php'?hospital=".$row['hospital_name']."&state=".$_GET['state']."&county=".
            $_GET['county']."&city=".$_GET['city']."'>".$row['hospital_name']."</a></td><tr>";
        }

        echo "</table>";
    ?>
        <br>
    
        
        <?php 
            $sql_pill = "SELECT DISTINCT pill_name from pills where city='".$_GET["city"]."';";
            $res_pill = $conn->query($sql_pill);
            echo "<table border='1'>";?>
            <tr>
                <td>Pill name</td></tr>
            
            <?php 
            while ($row = $res_pill->fetch_assoc()){?>
            <tr>
                <td><a href="pill.php?pill=<?= $row["pill_name"]; ?>&city=<?=$_GET['city']?>"><?= $row["pill_name"];?></a></td>
            </tr>
        <?php 
            echo '</table>';
            }?>
</body>
</html>
