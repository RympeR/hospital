<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Search</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:700|Roboto:300,400,400i,500&display=swap" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
    <style> 
        .table_holder table tr td {
            color: #303030;
            font-size: 18px;
            border-bottom: 1px #cbcbcb solid;
            line-height: 23px;
            padding-right: 50px;
            }
            td {
                display: table-cell;
                vertical-align: inherit;
            }
            table {
                border-collapse: collapse;
                border-spacing: 0;
            }
            .table_holder {
                -webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.25);
                -moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.25);
                box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.25);
                padding: 15px 25px;
                border-radius: 10px;
                margin-top: 70px;
            }
            div {
                display: block;
            }
    </style>
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
			<h1>Lorem Ipsum is</h1>
			<h2>simply dummy text</h2>
			<h2>of the printing</h2>
		</div>
    </div>  
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
        $sql = "SELECT DISTINCT * FROM pills where pill_name='".$_GET['pill']."' and city='".$_GET['city']."';";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
    ?>
    <div>
        <h1><?= $_GET['pill']?></h1>
        <div >
            <h4>AMOUNT</h4>
                <?php
                   echo $row["amount"];
                ?>    
            </div>
        </div>
        <div >
            <h4>PRICE</h4>
            <p>
                <?php
                    echo $row["price"];
                ?>
            </p>
            </div>
        </div>
        <div><h4>Description</h4>
            <?php
                echo $row["description"];
            ?>    
        </div>
    </div>
</body>
</html>