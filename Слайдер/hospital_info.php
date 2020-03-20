<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
<body>    
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
        $sql = "SELECT *  from hospital_info where state_='".
                $_GET['state']."' and county_name='".
                $_GET['county']."' and city='".$_GET['city']."' and hospital_name='".$_GET['hospital']."';";
        $sql1 = "SELECT * FROM comments where hospital ='".$_GET['hospital']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        while($row = $res->fetch_assoc()){
                echo "<tr>".
                    "<td>Hospital Name</td>".
                    "<td id='token'>".$row['hospital_name']."</td></tr>".
                    "<tr>". "<td>Address</td>".
                    "<td>".$row['address_']."</td></tr>".
                    "<tr>". "<td>Phone Number</td>".
                    "<td>".$row['phone_number']."</td></tr>".
                    "<tr>". "<td>Hospital Type</td>".
                    "<td>".$row['hospital_type']."</td></tr>".
                    "<tr>". "<td>Hospital Ownership</td>".
                    "<td>".$row['hosp_ownership']."</td></tr>".
                    "<tr>". "<td>Emergency Services</td>".
                    "<td>".$row['emerg_services']."</td></tr>".
                    "<tr>". "<td>Meets criteria for meaningful use of EHRs</td>".
                    "<td>".$row['EHRs_criteria']."</td></tr>".
                    "<tr>". "<td>Hospital overall rating</td>".
                    "<td>".$row['rating']."</td></tr>".
                    "<tr>". "<td>Hospital overall rating footnote</td>".
                    "<td>".$row['rating_footnote']."</td></tr>".
                    "<tr>". "<td>Mortality national comparison</td>".
                    "<td>".$row['mortality_comparsion']."</td></tr>".
                    "<tr>". "<td>Mortality national comparison footnote</td>".
                    "<td>".$row['mortality_footnote']."</td></tr>".
                    "<tr>". "<td>Safety of care national comparison</td>".
                    "<td>".$row['safety_comparison']."</td></tr>".
                    "<tr>". "<td>Safety of care national comparison footnote</td>".
                    "<td>".$row['safety_footnote']."</td></tr>".
                    "<tr>". "<td>Readmission national comparison</td>".
                    "<td>".$row['readmission_comparison']."</td></tr>".
                    "<tr>". "<td>Readmission national comparison footnote</td>".
                    "<td>".$row['readmission_footnote']."</td></tr>".
                    "<tr>". "<td>Patient experience national comparison</td>".
                    "<td>".$row['patient_comparison']."</td></tr>".
                    "<tr>". "<td>Patient experience national comparison footnote</td>".
                    "<td>".$row['patient_footnote']."</td></tr>".
                    "<tr>". "<td>Effectiveness of care national comparison</td>".
                    "<td>".$row['effectiveness_comparison']."</td></tr>".
                    "<tr>". "<td>Effectiveness of care national comparison footnote</td>".
                    "<td>".$row['effectiveness_footnote']."</td></tr>".
                    "<tr>". "<td>Timeliness of care national comparison</td>".
                    "<td>".$row['timeliness_comparison']."</td></tr>".
                    "<tr>". "<td>Timeliness of care national comparison footnote</td>".
                    "<td>".$row['timeliness_footnote']."</td></tr>".
                    "<tr>". "<td>Efficient use of medical imaging national comparison</td>".
                    "<td>".$row['efficient_comparison']."</td></tr>".
                    "<tr>". "<td>Efficient use of medical imaging national comparison footnote</td>".
                    "<td>".$row['efficient_footnote']."</td></tr>".
                    "<tr>". "<td>Coords</td>".
                    "<td>".$row['coords']."</td></tr>".
                    "<tr>". "<td>Location</td>".
                    "<td>".$row['location']."</td><tr>";
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
            url: "/insert.php",
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