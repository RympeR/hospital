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
				<input type="text" name="" value="" placeholder="Find a Pharmacy" />
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

    <div class="wrap">
		        <div class="table_holder">  
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
        $sql = "SELECT *  from pharmacy where STATE='".
                $_GET['state']."' and COUNTY='".
                $_GET['county']."' and CITY='".$_GET['city']."' and NAME='".$_GET['pharmacy']."';";
        $sql1 = "SELECT * FROM comments_pharmacy where pharmacy ='".$_GET['pharmacy']."';";
        // echo $sql;
        $res = $conn->query($sql);
        echo "<table border='1'>";
        while($row = $res->fetch_assoc()){
                echo "<tr>".
                    "<td>Pharmacy Name</td>".
                    "<td id='token'>".$row['NAME']."</td></tr>".
                    "<tr>". "<td>Address</td>".
                    "<td>".$row['ADDRESS']."</td></tr>".
                    "<tr>". "<td>ZIP</td>".
                    "<td>".$row['ZIP']."</td></tr>".
                    "<tr>". "<td>ZIP4</td>".
                    "<td>".$row['ZIPP4']."</td></tr>".
                    "<tr>". "<td>FIPS</td>".
                    "<td>".$row['FIPS']."</td></tr>".
                    "<tr>". "<td>CONTDATE</td>".
                    "<td>".$row['CONTDATE']."</td></tr>".
                    "<tr>". "<td>CONTHOW</td>".
                    "<td>".$row['CONTHOW']."</td></tr>".
                    "<tr>". "<td>GEODATE</td>".
                    "<td>".$row['GEODATE']."</td></tr>".
                    "<tr>". "<td>GEOHOW</td>".
                    "<td>".$row['GEOHOW']."</td></tr>".
                    "<tr>". "<td>HSIPTHEMES</td>".
                    "<td>".$row['HSIPTHEMES']."</td></tr>".
                    "<tr>". "<td>NAICSCODE</td>".
                    "<td>".$row['NAICSCODE']."</td></tr>".
                    "<tr>". "<td>NAICSCDESCR</td>".
                    "<td>".$row['NAICSCDESCR']."</td></tr>".
                    "<tr>". "<td>X</td>".
                    "<td>".$row['X']."</td></tr>".
                    "<tr>". "<td>Y</td>".
                    "<td>".$row['Y']."</td></tr>".
                    "<tr>". "<td>ST_VENDOR</td>".
                    "<td>".$row['ST_VENDOR']."</td></tr>".
                    "<tr>". "<td>ST_VERSION</td>".
                    "<td>".$row['ST_VERSION']."</td></tr>".
                    "<tr>". "<td>GEOPREC</td>".
                    "<td>".$row['GEOPREC']."</td></tr>".
                    "<tr>". "<td>PHONELOC</td>".
                    "<td>".$row['PHONELOC']."</td></tr>".
                    "<tr>". "<td>QC_QA</td>".
                    "<td>".$row['QC_QA']."</td></tr>".
                    "<tr>". "<td>WEBSITE</td>".
                    "<td>".$row['WEBSITE']."</td></tr>".
                    "<tr>". "<td>NPI</td>".
                    "<td>".$row['NPI']."</td></tr>".
                    "<tr>". "<td>ENT_TYPE</td>".
                    "<td>".$row['ENT_TYPE']."</td></tr>".
                    "<tr>". "<td>ORGAN_NAME</td>".
                    "<td>".$row['ORGAN_NAME']."</td></tr>";
                    
        }

        echo "</table>";
        ?>
        </div>
    </div>
    
    <div class="hospital_info">
		<div class="wrap">
			<h2 class="title">Facts about <b>Pharmacy</b></h2>
	
			<div class="burger">
				<a href="#" class="to_show">Lorem ipsum dolor sit amet.</a>
				<div class="hidden">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra </div>
			</div>
			
			<div class="burger">
				<a href="#" class="to_show">Lorem ipsum dolor sit amet.</a>
				<div class="hidden">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra </div>
			</div>
			
			<div class="burger">
				<a href="#" class="to_show">Lorem ipsum dolor sit amet.</a>
				<div class="hidden">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra </div>
			</div>
			
			<div class="burger">
				<a href="#" class="to_show">Lorem ipsum dolor sit amet.</a>
				<div class="hidden">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra </div>
			</div>
			
			<div class="burger">
				<a href="#" class="to_show">Lorem ipsum dolor sit amet.</a>
				<div class="hidden">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra </div>
            </div>

            <div class="comments">
				<h2 class="title">Comment about <b>Pharmacy</b></h2>
        <?php
        // if($conn->query($sql1)){
        try {
            $res1 = $conn->query($sql1);
           
           

            while($row = $res1->fetch_assoc()){?>
                <div class="comment">
                <div class="author">
                    <?=$row["name"]?>- <?=$row["email"]?>
                    <span class="date">25/02/2020</span>
                </div>
                <div class="name">Pharmacy</div>
                <div class="stars">
                    <a href="#" class="star full"></a>
                    <a href="#" class="star full"></a>
                    <a href="#" class="star full"></a>
                    <a href="#" class="star full"></a>
                    <a href="#" class="star"></a>
                </div>
                <p><?=$row["comment"]?></p>
            
            </div>
            <?php }

        }catch (Exception $e){

        }
    // }
?>

<div class="comment_form">
				<h3>Write your comment about <b>Pharmacy</b>...</h3>

                <form onsubmit="return false" id="form" name="form" method="POST">
                    <input id ="hide" name="hide" type="hidden" value="">
                    <input type="text" name="name"/>
                    <input type="text" name="email"/>
                    <input type="text" name="comment"/>
                    <input type="button" class="sub-btn"  value="send comment" onclick="send_data_form();" name="SubmitButton"/>
                    </form>    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                
                    <script>
                        window.onload = function(){
                            document.getElementById("hide").value = document.getElementById("token").textContent;
                        }
                        function send_data_form(){
                            var fd = new FormData(document.getElementById("form"));

                            $.ajax({
                                url: "/insert_p.php",
                                type: "POST",
                                data: fd,
                                success: function (data) {
                                    // alert(data);
                                    document.location.reload();
                                        },
                                processData: false, 
                                contentType: false   
                                });;
                        }
                    </script>
			</div>

            </div>
    </div>
</body>
</html>