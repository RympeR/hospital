<?php
    // function insert($range, $arr){
    //     $sql_input = "";
    //     $columns = array("hospital_name", "address_","city",
    //     "state_","zip_code","county_name", "phone_number",
    //     "hospital_type", "hosp_ownership", "emerg_services", "EHRs_criteria",
    //     "rating", "rating_footnote", "mortality_comparsion", "mortality_footnote",
    //      "readmission_comparsion", "readmission_footnote",  
    //     "patient_comparsion", "patient_footnote", "effectiveness_comparsion", 
    //     "effectiveness_footnote",  "timeliness_comparsion", "timeliness_footnote", 
    //     "efficient_comparsion", "efficient_footnote", "location","coords");

    //     if (count($arr)<26){
    //         if (preg_match('/\(\d*.\d*, [-]*\d*.\d*\)/', $arr[$range-1])){
                
    //             $sql_input = "INSERT INTO hospital_info(".join(",",array_slice($columns, 0, $range-1)).',coords'.")".
    //             "values('".join("','",array_slice($arr, 0, $range))."')";
    //         }
    //         else{
    //             $sql_input = "INSERT INTO hospital_info(".join(",",array_slice($columns, 0, $range-1)).',location'.")".
    //             "values('".join("','",array_slice($arr, 0, $range))."')";
    //         }
    //     }
    //     else {
    //         $sql_input = "INSERT INTO hospital_info(".join(",",array_slice($columns, 0, $range)).',location'.")".
    //         "values('".join("','",array_slice($arr, 0, $range))."')";
    //     }
    //     return $sql_input;
    // }
    
    // $servername = "localhost";
    // $username = "admin_admin";
    // $password = "cJ9Mhri450";
    // $dbname = "admin_hospital";
    // $conn = new mysqli($servername, $username, $password, $dbname);
	// if ($conn->connect_error){
	// 	die("Connection error: ");
    // }
    // if(!$conn->set_charset("utf8")){
    //     echo "ошибка кодировки";
    // }

    // $file = 'new1.txt';
    // if(!file_exists($file)){
    //     echo "Miss path";
    // }
    // else{
    //     $fp = fopen($file,'r');
    //     $k = 0;
    //     $new_name = 'new1.txt';
    //     $range_s = array(0,0,0,0,0,0,0,0);
    //     $min = 40;
    //     $max = 0;
    //     while(!feof($fp)){
    //         $k++;
    //         $curr = fgets($fp);
    //         if($k==1 || $k == 2){
    //             continue;
    //         }
    //         if(!empty($curr) && $curr!='"'){
    //             $columns = array("hospital_name", "address_","city",
    //             "state_","zip_code","county_name", "phone_number",
    //             "hospital_type", "hosp_ownership", "emerg_services", "EHRs_criteria",
    //             "rating", "rating_footnote", "mortality_comparsion", "mortality_footnote",
    //              "readmission_comparsion", "readmission_footnote",  
    //             "patient_comparsion", "patient_footnote", "effectiveness_comparsion", 
    //             "effectiveness_footnote",  "timeliness_comparsion", "timeliness_footnote", 
    //             "efficient_comparsion", "efficient_footnote", "location","coords");
    //             if (count(explode('::', $curr)) >2 ){
    //                 if (count(explode('::', $curr)) < $min)
    //                     $min = count(explode('::', $curr));
    //                 if (count(explode('::', $curr)) <=27){
    //                     $arr = explode('::', $curr);
    //                     $range = count(explode('::', $curr));
    //                     if ($conn->query(insert($range, $arr)) === TRUE) {
    //                         echo "New record created successfully";
    //                     }
    //                     else{
    //                         echo "error";
    //                     }
    //                 }
    //                 $arr = explode('::', $curr);
    //             }
    //             else
    //                 continue;
                
                
    //         }

    //     }
    //     echo $max."<br>";
    //     echo $min."<br>";
    //     fclose($fn);
    //     fclose($fp);
    // }
//     try{
//             exec("/df_sql.py");
    
//     }
//     catch (Exception $e){
//         echo "error0";
//     }
    
// ?>

<html>
 <body>
  <head>
   <title>
     run
   </title>
  </head>

   <form method="post">

    <input type="submit" value="GO" name="GO">
   </form>
 </body>
</html>

<?php
	if(isset($_POST['GO']))
	{
        $command = escapeshellcmd('/df_sql.py');
        $output = shell_exec($command);
        echo $output;
 
        shell_exec("python /df_sql.py");
		echo"success";
	}
?>