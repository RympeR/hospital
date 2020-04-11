<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Country List</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:700|Roboto:300,400,400i,500&display=swap" rel="stylesheet">
	<link href="css/style1.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
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
			<h1><?= $_GET['state']?></h1>
			<p>It is a long established fact that a reader will be distracted <br />
by the readable content of a page when looking at its layout.</p>
		</div>
	</div>
	
	<div class="list_holder">
		<div class="wrap">
			<div class="ls-col-left">
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
                            $sql = "SELECT DISTINCT COUNTY from pharmacy where STATE='".$_GET['state']."' ORDER BY LEFT(COUNTY, 1);";
                            // echo $sql;
                            $res = $conn->query($sql);
                            while($row = $res->fetch_assoc()){
                                $sql_county = "SELECT DISTINCT description from county_description_pharmacy where county='".$row["COUNTY"]."' limit 0,1";
                                $res_county = $conn->query($sql_county);
                                $row_county = $res_county->fetch_assoc();
                                echo "<li><a href='city_p.php?county=".$row['COUNTY']."&state=".$_GET['state']."'>".
                                $row['COUNTY']."</a></td><td>".$row_county["description"]."</li>";
                            }
                    ?>
                </ul>
                </div>
			<div class="ls-col-right">
				<div class="country-info">
					<img src="img/emblem.png" alt="" />

					<h2>Facts about <?= $_GET['state']?></h2>
					<p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus</p>
			
					<div class="cl"></div>
				</div>
				<p>Dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Dolor sit amet, consectetur adipiscing elit, sed.</p>
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