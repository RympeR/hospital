<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>City List</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:700|Roboto:300,400,400i,500&display=swap" rel="stylesheet">
	<link href="css/style1.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
    <style>
    </style>
</head>
<body>
<div class="pagetop">
	<div class="head">
		<div class="wrap">
			<a href="/" class="logo"><img src="img/logo_head.png" alt="" /></a>
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
			<h1><?= $_GET['county']?></h1>
			<p>It is a long established fact that a reader will be distracted <br />
by the readable content of a page when looking at its layout.</p>
		</div>
	</div>
	
	<div class="list_holder">
		<div class="wrap">
			<div class="ls-col-left">
                <h2>List of Pharmacy</h2>
                <br>
                <ul>
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
                $sql = "SELECT NAME from pharmacy where STATE='".
                        $_GET['state']."' and COUNTY='".
                        $_GET['county']."' and CITY='".$_GET['city']."';";
                // echo $sql;
                $res = $conn->query($sql);

                while($row = $res->fetch_assoc()){
                    echo "<li><a href='pharmacy_info.php?pharmacy=".$row['NAME']."&state=".$_GET['state']."&county=".
                    $_GET['county']."&city=".$_GET['city']."'>".$row['NAME']."</a></li>";
                }

                echo "</ul><br>";
                echo "<h2>List of Hospital's</h2>";
                echo "<ul>";
                $sql = "SELECT hospital_name from hospital_info where state_='".
                $_GET['state']."' and county_name='".
                $_GET['county']."' and city='".$_GET['city']."';";
                // echo $sql;
                $res = $conn->query($sql);
                echo "<li>Hospital name</li>";
                while($row = $res->fetch_assoc()){
                    echo "<li><a href='hospital_info.php'?hospital=".$row['hospital_name']."&state=".$_GET['state']."&county=".
                    $_GET['county']."&city=".$_GET['city']."'>".$row['hospital_name']."</a></li>";
                }
                ?>
                <br>
                </ul>
        
        <?php 
            $sql_pill = "SELECT DISTINCT pill_name from pills where city='".$_GET["city"]."';";
            $res_pill = $conn->query($sql_pill);
            ?>
            <h2>Pill's list</h2>
            <ul>
            
            
            <?php 
            while ($row = $res_pill->fetch_assoc()){?>
                <li><a href="pill.php?pill=<?= $row["pill_name"]; ?>&city=<?=$_GET['city']?>"><?= $row["pill_name"];?></a></li>
        <?php 
            }?>
            </ul>
             </div>
			<div class="ls-col-right">
			</div>
			<div class="cl"></div>
		</div>
	</div>
	
</div>
<div class="pagebottom">
	<div class="foot">
		<div class="wrap">
			<div class="info">
				<a href="/" class="logo"><img src="img/logo_footer.png" alt="" /></a>
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
</body>
</html>
