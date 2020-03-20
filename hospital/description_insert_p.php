<?php
    function update($destintaion, $value, $new_value){
        return "update $destintaion"."_description_pharmacy set description='$value' where $destintaion='$new_value';";
    }
    
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

    if($conn->query(update($_POST["choice"],$_POST["description"], $_POST["index"]))){

    }
    // echo update($_POST["choice"],$_POST["description"], $_POST["index"]);
?>