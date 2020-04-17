    <?php 
	require_once('header.php');
?>	
	<div class="big-name">
		<div class="wrap">
			<h1>Headline 1</h1>
			<p>It is a long established fact that a reader will be distracted <br />
by the readable content of a page when looking at its layout.</p>
		</div>
	</div>
	<div class="alphabet">
		<div class="wrap">
    <?php
   
        
        // echo "<a href='description_p.php'>Add  description</a>";
        function sql_select_state($letter){
            return "SELECT STATE FROM pharmacy WHERE LEFT(STATE,1) = $letter;";
        }

        $states = [
            'A' => [],
            'C' => [],
            'D' => [],
            'F' => [],
            'G' => [],
            'I' => [],
            'K' => [],
            'L' => [],
            'M' => [],
            'N' => [],
            'O' => [],
            'P' => [],
            'R' => [],
            'S' => [],
            'T' => [],
            'U' => [],
            'V' => [],
            'W' => [],
        ];
        $states_full = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Deleware', 
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississipi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'Nex Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennesse',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming'
        ];
        $servername = "localhost";
        $username = "admin_admin";
        $password = "cJ9Mhri450";
        $dbname = "admin_hospital";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection error: ");
        }
        mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
        mysqli_query($conn, "SET CHARACTER SET 'utf8'");
        if(!$conn->set_charset("utf8")){
            echo "ошибка кодировки";
        }
        $sql = "SELECT DISTINCT STATE from pharmacy order by STATE";
        $sql_comment = "SELECT DISTINCT pharmacy, name, comment from comments_pharmacy limit 0,10";
        
       
        $res = $conn->query($sql);
        $res_comment = $conn->query($sql_comment);
    
        while($row = $res->fetch_assoc()){

                $sql_state = "SELECT DISTINCT description from state_description_pharmacy where state='".$row["STATE"]."' limit 0,1";
                $res_state = $conn->query($sql_state);
                $row_state = $res_state->fetch_assoc();
                array_push($states[$row['STATE'][0]], $row['STATE']);
        }
        // echo "<tr><td><a href='".$row['STATE'].".html'>".$row['STATE']."</a></td><td>".$row_state["description"]."</td><tr>";
        $k = 0;
        for ($i=0; $i < count($states); $i++) { 
            
            
            if ($k % 5 == 0 || $k == 0){
                echo "<div class='a-row'>";
                echo "<div class='a-col'>";
				echo "<h2>" . key($states) . "</h2>";
				echo "<ul>";
                foreach ($states[key($states)] as $key => $value) {
                    echo " <li><a href='". strtolower($value)  .".html'>".$states_full[$value] . "</a></li>";
                }
                
				echo "</ul>";
				echo "</div>";
            } else if ($k % 5 == 4){
                echo "<div class='a-col'>";
				echo "<h2>" . key($states) . "</h2>";
				echo "<ul>";
                foreach ($states[key($states)] as $key => $value) {
                    echo " <li><a href='". strtolower($value) .".html'>". $states_full[$value] . "</a></li>";
                }
                
				echo "</ul>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='a-col'>";
				echo "<h2>" . key($states) . "</h2>";
				echo "<ul>";
                foreach ($states[key($states)] as $key => $value) {
                    echo " <li><a href='". strtolower($value) .".html'>". $states_full[$value] . "</a></li>";
                }
                
				echo "</ul>";
				echo "</div>";
            }
            
            $k++;
            next($states);
        }

        
?>
        </div>
    </div>
</div>
<?php 
	require_once('footer.php');
?>