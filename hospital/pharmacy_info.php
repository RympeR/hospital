<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
        $sql = "SELECT *  from pharmacy where STATE='".
                $_GET['state']."' and COUNTY='".
                $_GET['county']."' and CITY='".$_GET['city']."' and NAME='".$_GET['pharmacy']."';";
        $sql1 = "SELECT * FROM comments_pharmacy where pharmacy ='".$_GET['pharmacy']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        while($row = $res->fetch_assoc()){
                echo "<tr>".
                    "<td>Pharmacy Name</td>".
                    "<td id='token'>".$row['NAME']."</td></tr>".
                    "<tr>". "<td>Address</td>".
                    "<td>".$row['ADDRESS']."</td></tr>".
                    "<tr>". "<td>ZIP</td>".
                    "<td>".$row['ZIP']."</td></tr>".
                    "<tr>". "<td>ZIP4</td>".
                    "<td>".$row['ZIPP4']."</td></tr>".
                    "<tr>". "<td>FIPS</td>".
                    "<td>".$row['FIPS']."</td></tr>".
                    "<tr>". "<td>CONTDATE</td>".
                    "<td>".$row['CONTDATE']."</td></tr>".
                    "<tr>". "<td>CONTHOW</td>".
                    "<td>".$row['CONTHOW']."</td></tr>".
                    "<tr>". "<td>GEODATE</td>".
                    "<td>".$row['GEODATE']."</td></tr>".
                    "<tr>". "<td>GEOHOW</td>".
                    "<td>".$row['GEOHOW']."</td></tr>".
                    "<tr>". "<td>HSIPTHEMES</td>".
                    "<td>".$row['HSIPTHEMES']."</td></tr>".
                    "<tr>". "<td>NAICSCODE</td>".
                    "<td>".$row['NAICSCODE']."</td></tr>".
                    "<tr>". "<td>NAICSCDESCR</td>".
                    "<td>".$row['NAICSCDESCR']."</td></tr>".
                    "<tr>". "<td>X</td>".
                    "<td>".$row['X']."</td></tr>".
                    "<tr>". "<td>Y</td>".
                    "<td>".$row['Y']."</td></tr>".
                    "<tr>". "<td>ST_VENDOR</td>".
                    "<td>".$row['ST_VENDOR']."</td></tr>".
                    "<tr>". "<td>ST_VERSION</td>".
                    "<td>".$row['ST_VERSION']."</td></tr>".
                    "<tr>". "<td>GEOPREC</td>".
                    "<td>".$row['GEOPREC']."</td></tr>".
                    "<tr>". "<td>PHONELOC</td>".
                    "<td>".$row['PHONELOC']."</td></tr>".
                    "<tr>". "<td>QC_QA</td>".
                    "<td>".$row['QC_QA']."</td></tr>".
                    "<tr>". "<td>WEBSITE</td>".
                    "<td>".$row['WEBSITE']."</td></tr>".
                    "<tr>". "<td>NPI</td>".
                    "<td>".$row['NPI']."</td></tr>".
                    "<tr>". "<td>ENT_TYPE</td>".
                    "<td>".$row['ENT_TYPE']."</td></tr>".
                    "<tr>". "<td>ORGAN_NAME</td>".
                    "<td>".$row['ORGAN_NAME']."</td></tr>";
                    
        }

        echo "</table>";
        echo "<br>";
        // if($conn->query($sql1)){
        try {
            $res1 = $conn->query($sql1);
            echo "<table border='1'>";
            echo "<tr><td>Name</td><td>email</td><td>IP</td><td>User-agent</td><td>Comment</td></tr>";

            while($row = $res1->fetch_assoc()){
                 echo "<tr><td>".$row["name"]."</td>";
                 echo "<td>".$row["email"]."</td>";
                 echo "<td>".$row["ip"]."</td>";
                 echo "<td>".$row["user_agent"]."</td>";
                 echo "<td>".$row["comment"]."</td></tr>";
                 
            }
            echo "</table>";
        }catch (Exception $e){

        }
    // }
?>



<form onsubmit="return false" id="form" name="form" method="POST">
  <input id ="hide" name="hide" type="hidden" value="">
  <input type="text" name="name"/>
  <input type="email" name="email"/>
  <input type="text" name="comment"/>
  <input type="button" value="send comment" onclick="send_data_form();" name="SubmitButton"/>
</form>    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			
<script>
    window.onload = function(){
        document.getElementById("hide").value = document.getElementById("token").textContent;
    }
    function send_data_form(){
        var fd = new FormData(document.getElementById("form"));

        $.ajax({
            url: "/insert_p.php",
            type: "POST",
            data: fd,
            success: function (data) {
                // alert(data);
                document.location.reload();
                    },
            processData: false, 
            contentType: false   
            });;
    }
</script>
</body>
</html>