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
                            ?>