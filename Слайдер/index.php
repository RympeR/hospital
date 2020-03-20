<?php
        echo "<a href='description.php'>Add  description</a>";
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
        $sql = "SELECT DISTINCT state_ from hospital_info order by state_";
        $sql_comment = "SELECT DISTINCT hospital, name, comment from comments limit 0,10";
        
       
        $res = $conn->query($sql);
        $res_comment = $conn->query($sql_comment);
        echo "<table border='1'>";
        echo "<tr><td>State Name</td><td>description</td><tr>";
        while($row = $res->fetch_assoc()){
                $sql_state = "SELECT DISTINCT description from state_description where state='".$row["state_"]."' limit 0,1";
                $res_state = $conn->query($sql_state);
                $row_state = $res_state->fetch_assoc();
                echo "<tr><td><a href='county.php?state=".$row['state_']."'>".$row['state_']."</a></td><td>".$row_state["description"]."</td><tr>";
        }

        echo "</table>";
        
        echo "<table border='1'>";
        echo "<tr><td>Hospital</td><td>Name</td><td>Comment</td><tr>";
        // echo $sql_comment;
        while($row = $res_comment->fetch_assoc()){
            $sql_hospital = "SELECT DISTINCT hospital_name, state_, county_name, city from hospital_info where hospital_name='".$row['hospital']."';";
            $res_link = $conn->query($sql_hospital);
            // echo $sql_hospital;
            while ($row_link = $res_link->fetch_assoc()){
               
                echo "<tr><td><a href='hospital_info.php?state=".$row_link['state_']."&county=".$row_link['county_name']."&city=".$row_link['city']."&hospital=".$row_link['hospital_name']."'>".$row['hospital'].
                "</a></td><td>".$row['name']."</td><td>".$row['comment']."</td><tr>";
            }
            
        }
        echo "</table>";
?>
