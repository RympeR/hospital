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
            .coln1{width:10px;}
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
            $name = "";
            $servername = "localhost";
            $username = "admin_admin";
            $password = "cJ9Mhri450";
            $dbname = "admin_hospital";
            $sql = "SELECT *  from pharmacy where FID='".
            $_GET['fid']."';";
            // echo $sql;
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error){
                die("Connection error: ");
            }
            if(!$conn->set_charset("utf8")){
                echo "ошибка кодировки";
            }
           
            
            $res = $conn->query($sql);
            echo "<table border='1'>".
            "<col class='coln1'><col class='coln2'>";
            while($row = $res->fetch_assoc()){
                    $name = $row['NAME'];
                    echo "<tr>".
                        "<td class='left'>Pharmacy Name</td>".
                        "<td id='token' class='right'>". ucfirst(strtolower($row['NAME']))."</td></tr>".
                        "<tr>". "<td class='left'>Address</td>".
                        "<td class='right'>".$row['ADDRESS']."</td></tr>".
                        "<tr>". "<td class='left'>ZIP</td>".
                        "<td class='right'>".$row['ZIP']."</td></tr>".
                        "<tr>". "<td class='left'>ZIP4</td>".
                        "<td class='right'>".$row['ZIPP4']."</td></tr>".
                        "<tr>". "<td class='left'>FIPS</td>".
                        "<td class='right'>".$row['FIPS']."</td></tr>".
                        // "<tr>". "<td>CONTDATE</td>".
                        // "<td>".$row['CONTDATE']."</td></tr>".
                        // "<tr>". "<td>CONTHOW</td>".
                        // "<td>".$row['CONTHOW']."</td></tr>".
                        // "<tr>". "<td>GEODATE</td>".
                        // "<td>".$row['GEODATE']."</td></tr>".
                        // "<tr>". "<td>GEOHOW</td>".
                        // "<td>".$row['GEOHOW']."</td></tr>".
                        "<tr>". "<td class='left'>HSIPTHEMES</td>".
                        "<td class='right'>".ucfirst(strtolower($row['HSIPTHEMES']))."</td></tr>".
                        "<tr>". "<td class='left'>NAICSCODE</td>".
                        "<td class='right'>".$row['NAICSCODE']."</td></tr>".
                        "<tr>". "<td class='left'>NAICSCDESCR</td>".
                        "<td class='right'>".$row['NAICSCDESCR']."</td></tr>".
                        // "<tr>". "<td>X</td>".
                        // "<td>".$row['X']."</td></tr>".
                        // "<tr>". "<td>Y</td>".
                        // "<td>".$row['Y']."</td></tr>".
                        "<tr>". "<td class='left'>ST_VENDOR</td>".
                        "<td class='right'>".$row['ST_VENDOR']."</td></tr>".
                        "<tr>". "<td class='left'>ST_VERSION</td>".
                        "<td class='right'>".$row['ST_VERSION']."</td></tr>".
                        // "<tr>". "<td>GEOPREC</td>".
                        // "<td>".$row['GEOPREC']."</td></tr>".
                        "<tr>". "<td class='left'>PHONELOC</td>".
                        "<td class='right'>".$row['PHONELOC']."</td></tr>".
                        "<tr>". "<td class='left'>QC_QA</td>".
                        "<td class='right'>".$row['QC_QA']."</td></tr>".
                        "<tr>". "<td class='left'>WEBSITE</td>".
                        "<td>".strtolower($row['WEBSITE'])."</td></tr>".
                        "<tr>". "<td class='left'>NPI</td>".
                        "<td class='right'>".$row['NPI']."</td></tr>".
                        // "<tr>". "<td>ENT_TYPE</td>".
                        // "<td>".$row['ENT_TYPE']."</td></tr>".
                        "<tr>". "<td class='left'>ORGAN_NAME</td>".
                        "<td class='right'>".$row['ORGAN_NAME']."</td></tr>";
                        
            }

            echo "</table>";
        ?>
        </div>
    </div>
    
    <div style="display:none" class="hospital_info">
		<div class="wrap">
			<h2 class="title">Facts about <b><?= $name ?></b></h2>
	
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
				<h2 class="title">Comment about <b><?= $name ?></b></h2>
        <?php
        // if($conn->query($sql1)){
        $sql1 = "SELECT * FROM comments_pharmacy where id_pharm ='".$_GET['fid']."';";
        try {
            $res1 = $conn->query($sql1);
           
           

            while($row = $res1->fetch_assoc()){?>
                <div class="comment">
                <div class="author">
                    <?=$row["name"]?>- <?=$row["email"]?>
                    <span class="date"><?=$row["date_c"]?></span>
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
				<h3>Write your comment about <b><?= $name ?></b>...</h3>

                <form onsubmit="return false" id="form" name="form" method="POST">
                    <input id ="hide" class="input_field_form" name="hide" type="hidden" value="">
                    <input id ="pharm_id" class="input_field_form" name="pharm_id" type="hidden" value="<?= $_GET['fid'] ?>">
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                    <h3>Name</h3>
                    <input type="text" class="input_field_form" name="name" placeholder="Name"/>
                    <h3>Email</h3>
                    <input type="text" class="input_field_form" name="email" placeholder="Email"/>
                    <h3>Comment</h3>
                    <input type="text" class="input_field_form"  name="comment" placeholder="Comment"/>
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
                                url: "/insert_p.php",
                                type: "POST",
                                data: fd,
                                success: function (data) {
                                    alert("Comment was processed. Reload page to insert new");
                                   
                                    // document.location.reload();
                                        },
                                processData: false, 
                                contentType: false   
                                });;
                        }
                    </script>
			</div>
            </div>
            </div>
    </div>
    <?php 
    require_once('footer.php');
?>