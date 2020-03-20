<?php
    function select($destintaion){
        return "SELECT $destintaion from $destintaion"."_description";
    }
    function update($destintaion, $value, $new_value){
        return "update $destintaion"."_description set description='$value' where $destintaion='$new_value';";
    }
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

    if($conn->query(update($_POST["choice"],$_POST["description"], $_POST["index"]))){

    }
    // echo update($_POST["choice"],$_POST["description"], $_POST["index"]);
?>

UPDATE state_description SET description='rew' WHERE state ='AK';