<?php 
	require_once('header.php');
?>
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
                font-size: 16px;
                table-layout: fixed;
            }
            .coln1{width:20px;}
            .coln2{width:40px;}
            .left{
                font-family: 'Roboto';
                font-weight: 500;
                font-size: 16px;
            }
            .right{
                font-family: 'Roboto';   
                font-size: 16px;
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
            .input_field_form{
                box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.45);
            }
            .comment_form h3 {

                font-weight : 400;

            }
            
    </style>
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
                    $sql = "SELECT *  from hospital_info where state_='".
                            $_GET['state']."' and county_name='".
                            $_GET['county']."' and city='".$_GET['city']."' and hospital_name='".$_GET['hospital']."';";
                    $sql1 = "SELECT * FROM comments where hospital ='".$_GET['hospital']."';";
                    // echo $sql;
                    $res = $conn->query($sql);
                    echo "<table border=1>".
                    "<col class='coln1'><col class='coln2'>";
                    while($row = $res->fetch_assoc()){
                            echo "<tr>".
                                "<td class='left'>Hospital Name</td>".
                                "<td class='right' id='token'>".ucfirst(strtolower($row['hospital_name']))."</td></tr>".
                                "<tr>". "<td class='left'>Address</td>".
                                "<td class='right'>".$row['address_']."</td></tr>".
                                "<tr>". "<td class='left'>Phone Number</td>".
                                "<td class='right'>".$row['phone_number']."</td></tr>".
                                "<tr>". "<td class='left'>Type</td>".
                                "<td class='right'>".$row['hospital_type']."</td></tr>".
                                "<tr>". "<td class='left'>Ownership</td>".
                                "<td class='right'>".$row['hosp_ownership']."</td></tr>".
                                "<tr>". "<td class='left'>Emergency Services</td>".
                                "<td class='right'>".strtolower($row['emerg_services'])."</td></tr>".
                                "<tr>". "<td class='left'>EHRs</td>".
                                "<td class='right'>".strtolower($row['EHRs_criteria'])."</td></tr>".
                                "<tr>". "<td class='left'>Rating1</td>".
                                "<td class='right'>".$row['rating']."</td></tr>".
                                "<tr>". "<td class='left'>Rating footnote</td>".
                                "<td class='right'>".$row['rating_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Mortality</td>".
                                "<td class='right'>".$row['mortality_comparsion']."</td></tr>".
                                "<tr>". "<td class='left'>Mortality footnote</td>".
                                "<td class='right'>".$row['mortality_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Safety</td>".
                                "<td class='right'>".$row['safety_comparison']."</td></tr>".
                                "<tr>". "<td class='left'>Safety footnote</td>".
                                "<td class='right'>".$row['safety_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Readmission</td>".
                                "<td class='right'>".$row['readmission_comparison']."</td></tr>".
                                "<tr>". "<td class='left'>Readmission footnote</td>".
                                "<td class='right'>".$row['readmission_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Patient experience</td>".
                                "<td class='right'>".$row['patient_comparison']."</td></tr>".
                                "<tr>". "<td class='left'>Patient experience footnote</td>".
                                "<td class='right'>".$row['patient_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Effectiveness</td>".
                                "<td class='right'>".$row['effectiveness_comparison']."</td></tr>".
                                "<tr>". "<td class='left'>Effectiveness footnote</td>".
                                "<td class='right'>".$row['effectiveness_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Timeliness</td>".
                                "<td class='right'>".$row['timeliness_comparison']."</td></tr>".
                                "<tr>". "<td class='left'>Timeliness footnote</td>".
                                "<td class='right'>".$row['timeliness_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Efficient use of medical imaging</td>".
                                "<td class='right'>".$row['efficient_comparison']."</td></tr>".
                                "<tr>". "<td class='left'>Efficient use of medical imaging footnote</td>".
                                "<td class='right'>".$row['efficient_footnote']."</td></tr>".
                                "<tr>". "<td class='left'>Coords</td>".
                                "<td class='right'>".$row['coords']."</td></tr>".
                                "<tr>". "<td class='left'>Location</td>".
                                "<td class='right'>".$row['location']."</td><tr>";
                    }

                    echo "</table>";?>
        </div>
	</div>

    <div style="display:none" class="hospital_info">
		<div class="wrap">
			<h2 class="title">Facts about <b>Hospital</b></h2>
	
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

            
    </div>
    </div>
        

<div class="comments">
    <div class="wrap">
				<h2 class="title">Comment about <b><?= $_GET['hospital'] ?></b></h2>
                <?php 
        // if($conn->query($sql1)){
        try {
            $res1 = $conn->query($sql1);

            while($row = $res1->fetch_assoc()){?>
				<div class="comment">
					<div class="author">
						<?=$row["name"]?>- <?=$row["email"]?>
						<span class="date"><?=$row["date_c"]?></span>
					</div>
					<div class="name">Hospital</div>
					<div class="stars">
						<a href="#" class="star full"></a>
						<a href="#" class="star full"></a>
						<a href="#" class="star full"></a>
						<a href="#" class="star full"></a>
						<a href="#" class="star"></a>
					</div>
					<p><?=$row["comment"]?></p>
				
				</div>
				<?php
                        }
                        }catch (Exception $e){
                            echo $e;
                        }
                ?>
			
		
			<div class="comment_form">
				<h3>Write your comment about <b><?= $_GET['hospital'] ?></b>...</h3>

                <form onsubmit="return false" id="form" name="form" method="POST">
                    <input id ="hide" name="hide" type="hidden" value="">
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                    <h3>Name</h3>
                    <input type="text" class="input_field_form" name="name" placeholder="Name"/>
                    <h3>Email</h3>
                    <input type="text" class="input_field_form" name="email" placeholder="Email"/>
                    <h3>Comment</h3>
                    <input type="text" class="input_field_form" name="comment" placeholder="Comment"/>
                    <input type="button" class="sub-btn"  value="Send comment" onclick="send_data_form();" name="SubmitButton"/>
                    </form>    
                    <br>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                    <script src="https://www.google.com/recaptcha/api.js?render=<?= SITE_KEY ?>"></script>
                    <script>
                        grecaptcha.ready(function() {
                            grecaptcha.execute('<?= SITE_KEY ?>', {action: 'homepage'}).then(function(token) {
                                // console.log(token);
                                document.getElementById('g-recaptcha-response').value = token;
                            });
                        });
                    </script>       
                    <script>
                        window.onload = function(){
                            document.getElementById("hide").value = document.getElementById("token").textContent;
                        }
                        function send_data_form(){
                            var fd = new FormData(document.getElementById("form"));

                            $.ajax({
                                url: "/insert.php",
                                type: "POST",
                                data: fd,
                                success: function (data) {
                                        alert("Your comment successfully added");
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
    </div><?php 
	require_once('footer.php');
?>