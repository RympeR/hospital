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
     $sql1 = "INSERT INTO comments(hospital,name,email,ip,user_agent,comment) values('".$_POST['hide']."','".$_POST['name']."','".$_POST['email']."','".$_SERVER['REMOTE_ADDR']."','".
                                                                            $_SERVER['HTTP_USER_AGENT']."','".$_POST['comment']."');";
     if ($conn->query($sql1) === TRUE) {
        echo "New record created successfully";
    }
    else{
        echo $_POST['comment'];
    }
?>