<?php
        // print_r($_POST);
        $text = $_POST["validator"];
        // echo $text;
        $decode = array();

        for ($i = 0; $i < strlen($text); $i++) {

            array_push($decode, chr(ord($text[$i]) - 2));

        }
        // print_r($decode);
        // echo gmdate('H')."::";
        // echo join("",array_slice($decode,0,2))."::";
        // echo join("",array_slice($decode,2))."::";
        if (join("",array_slice($decode,0,2)) == gmdate('H') && join("",array_slice($decode,2)) == $_POST["login"]){
            echo "::valid";
        }
        else{
            echo "::not";
        }
    
        
    ?>