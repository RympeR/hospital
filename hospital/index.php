<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8_general_ci">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
   
        
        echo "<a href='description_p.php'>Add  description</a>";
        
        $servername = "localhost";
        $username = "admin_admin";
        $password = "cJ9Mhri450";
        $dbname = "admin_hospital";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection error: ");
        }
        mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($conn, "SET CHARACTER SET 'utf8'");
        if(!$conn->set_charset("utf8")){
            echo "ошибка кодировки";
        }
        $sql = "SELECT DISTINCT STATE from pharmacy order by STATE";
        $sql_comment = "SELECT DISTINCT pharmacy, name, comment from comments_pharmacy limit 0,10";
        
       
        $res = $conn->query($sql);
        $res_comment = $conn->query($sql_comment);
        echo "<table border='1'>";
        echo "<tr><td>State Name</td><td>description</td><tr>";
        while($row = $res->fetch_assoc()){
                $sql_state = "SELECT DISTINCT description from state_description_pharmacy where state='".$row["STATE"]."' limit 0,1";
                $res_state = $conn->query($sql_state);
                $row_state = $res_state->fetch_assoc();
                echo "<tr><td><a href='county_p.php?state=".$row['STATE']."'>".$row['STATE']."</a></td><td>".$row_state["description"]."</td><tr>";
        }

        echo "</table>";
        
        echo "<table border='1'>";
        echo "<tr><td>Hospital</td><td>Name</td><td>Comment</td><tr>";
        // echo $sql_comment;
        while($row = $res_comment->fetch_assoc()){
            $sql_hospital = "SELECT DISTINCT NAME, STATE, COUNTY, CITY from pharmacy where NAME='".$row['pharmacy']."';";
            $res_link = $conn->query($sql_hospital);
            // echo $sql_hospital;
            while ($row_link = $res_link->fetch_assoc()){
               
                echo "<tr><td><a href='pharmacy_info.php?state=".$row_link['STATE']."&county=".$row_link['COUNTY']."&city=".$row_link['CITY']."&pharmacy=".$row_link['NAME']."'>".$row['pharmacy'].
                "</a></td><td>".$row['name']."</td><td>".$row['comment']."</td><tr>";
            }
            
        }
        echo "</table>";
?>

</head>
<body>
    
</body>
</html>
