<?php
    function select($city, $pill){
        return "SELECT city, pill_name from pills where city='$city' and pill_name='$pill'";
    }
    function update($name, $destintaion, $amount, $price, $city){
        return "update pills set description='$destintaion', amount=$amount, price=$price where city='$city' and pill_name='$name';";
    }
    function insert( $pill_name, $city, $description, $amount, $price){
        return "insert into pills(pill_name,city,description,amount,price) values('$pill_name','$city','$description',$amount,$price);";
    }
    
    $servername = "localhost";
    $username = "admin_admin";
    $password = "cJ9Mhri450";
    $dbname = "admin_hospital";
    $flag = 0;

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error){
        die("Connection error: ");
    }
    if(!$conn->set_charset("utf8")){
        echo "ошибка кодировки";
    }
    echo select($_POST["index1"],$_POST["pill_name"]);
    $res = $conn->query(select($_POST["index1"],$_POST["pill_name"]));
    
    while ($row = $res->fetch_assoc()){
        if ($row["pill_name"] == $_POST["pill_name"]){
            $flag =1;
        }
    }
    echo $flag;

    if ($flag == 1){
        if($conn->query(update($_POST["pill_name"],$_POST["description_pi"],$_POST["amount"], $_POST["price"],$_POST["index1"]))){
            echo update($_POST["pill_name"],$_POST["description_pi"],$_POST["amount"], $_POST["price"],$_POST["index1"]);
        }
    }
    else{
        if($conn->query(insert($_POST["pill_name"],$_POST["index1"], $_POST["description_pi"], $_POST["amount"], $_POST["price"]))){
            echo insert($_POST["pill_name"],$_POST["index1"], $_POST["description_pi"], $_POST["amount"], $_POST["price"]);
        }
    }
    
    

?>