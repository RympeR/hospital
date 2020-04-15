<?php 
     define('SITE_KEY', '6LfJYOkUAAAAAM6JHJ-MbRZTapj7wB68pbutQCwn');
     define('SECRET_KEY', '6LfJYOkUAAAAAOTKrQnRx7iaDBgg9OBgyEmn5NJo');
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
     $sql1 = "INSERT INTO comments_pill(pill,name,email,ip,user_agent,comment,date_c) values('".$_POST['hide']."','".$_POST['name']."','".$_POST['email']."','".$_SERVER['REMOTE_ADDR']."','".
     $_SERVER['HTTP_USER_AGENT']."','".$_POST['comment']."','".date("Y-m-d")."');";
     if ($_POST){
        function getCaptcha($secretKey){
           $Response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='. SECRET_KEY ."&response={$secretKey}");
           $Return = json_decode($Response);
           return $Return;
        }
        
        $Return = getCaptcha($_POST['g-recaptcha-response']);
       //  var_dump($Return);

        if ($Return->success == true && $Return->score > 0.5){                                                                      
               if ($conn->query($sql1) === TRUE) {
                   echo "New record created successfully";
               }
               else{
                   echo $sql1;
               }
           }
        else{
            var_dump($Return);
        }
       }
    
     
?>