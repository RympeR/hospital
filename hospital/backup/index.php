<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>State List</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:700|Roboto:300,400,400i,500&display=swap" rel="stylesheet">
	<link href="css/style1.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<div class="pagetop">
	<div class="head">
		<div class="wrap">
			<a href="#" class="logo"><img src="img/logo_head.png" alt="" /></a>
			<div class="search">
				<input type="text" name="" value="" placeholder="Find a Hospital" />
				<button></button>
			</div>
			<div class="menu">
				<a href="#">Report</a>
				<span class="sep">|</span>
				<a href="#">Help & Info</a>
				<span class="sep">|</span>
				<a href="#">About Us</a>
			</div>
			
			<div class="cl"></div>
		</div>
	</div>

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
   
        
        echo "<a href='description_p.php'>Add  description</a>";
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
        echo "<tr><td><a href='county_p.php?state=".$row['STATE']."'>".$row['STATE']."</a></td><td>".$row_state["description"]."</td><tr>";
        $k = 0;
        for ($i=0; $i < count($states); $i++) { 
            
            
            if ($k % 5 == 0 || $k == 0){
                echo "<div class='a-row'>";
                echo "<div class='a-col'>";
				echo "<h2>" . key($states) . "</h2>";
				echo "<ul>";
                foreach ($states[key($states)] as $key => $value) {
                    echo " <li><a href='county_p.php?state=".$value ."'>".$states_full[$value] . "</a></li>";
                }
                
				echo "</ul>";
				echo "</div>";
            } else if ($k % 5 == 4){
                echo "<div class='a-col'>";
				echo "<h2>" . key($states) . "</h2>";
				echo "<ul>";
                foreach ($states[key($states)] as $key => $value) {
                    echo " <li><a href='county_p.php?state=".$value ."'>". $states_full[$value] . "</a></li>";
                }
                
				echo "</ul>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='a-col'>";
				echo "<h2>" . key($states) . "</h2>";
				echo "<ul>";
                foreach ($states[key($states)] as $key => $value) {
                    echo " <li><a href='county_p.php?state=".$value ."'>". $states_full[$value] . "</a></li>";
                }
                
				echo "</ul>";
				echo "</div>";
            }
            
            $k++;
            next($states);
        }

        // echo "<tr><td>Hospital</td><td>Name</td><td>Comment</td><tr>";
        // // echo $sql_comment;
        // while($row = $res_comment->fetch_assoc()){
        //     $sql_hospital = "SELECT DISTINCT NAME, STATE, COUNTY, CITY from pharmacy where NAME='".$row['pharmacy']."';";
        //     $res_link = $conn->query($sql_hospital);
        //     // echo $sql_hospital;
        //     while ($row_link = $res_link->fetch_assoc()){
               
        //         echo "<tr><td><a href='pharmacy_info.php?state=".$row_link['STATE']."&county=".$row_link['COUNTY']."&city=".$row_link['CITY']."&pharmacy=".$row_link['NAME']."'>".$row['pharmacy'].
        //         "</a></td><td>".$row['name']."</td><td>".$row['comment']."</td><tr>";
        //     }
            
        // }
        // echo "</table>";
?>
        </div>
    </div>
</div>

<div class="pagebottom">
	<div class="foot">
		<div class="wrap">
			<div class="info">
				<a href="#" class="logo"><img src="img/logo_foot.png" alt="" /></a>
				<p>Use of this website and any information 
contained herein is governed 
by the HospService User Agreement.</p>
			</div>

			<div class="foot-col">
				<h3>For Businesses</h3>
				<ul>
					<li><a href="#">Claim your Website</a></li>
					<li><a href="#">Install Our Logo</a></li>
					<li><a href="#">Become our Partner</a></li>
				</ul>
			</div>
			<div class="foot-col">
				<h3>For Consumers</h3>
				<ul>
					<li><a href="#">Leave a review</a></li>
					<li><a href="#">Tell your Story</a></li>
					<li><a href="#">Relevant Links</a></li>
				</ul>
			</div>
			<div class="foot-col">
				<h3>About Site</h3>
				<ul>
					<li><a href="#">About Us</a></li>
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Advertising</a></li>
				</ul>
			</div>

			<div class="cl"></div>
		</div>
	</div>
</div>
	
</body>
</html>