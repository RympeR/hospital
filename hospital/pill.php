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
        $sql = "SELECT DISTINCT * FROM pills where pill_name='".$_GET['pill']."' and city='".strtoupper($_GET['city'])."';";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
    ?>
    <div class="wrap">
		<div class="table_holder">  
            <?php 
                echo "<table border='1'>".
                "<col class='coln1'><col class='coln2'>";
                echo "<tr><td class='left'>Pill name</td><td id='token' class='right'>".$_GET['pill']."</td></tr>";
                echo "<tr><td class='left'>Amount</td><td class='right'>".$row['amount']."</td></tr>";
                echo "<tr><td class='left'>Price</td><td class='right'>".$row['price']."</td></tr>";
                echo "<tr><td class='left'>Description</td><td class='right'>".$row['description']."</td></tr>";
                echo "</table>";
            ?>
           
        </div>
    </div>
    <br><br><br>
    <div class="comments">
        <div class="wrap">
				<h2 class="title">Comment about <b><?= $_GET['pill'] ?></b></h2>
                <?php 
                $sql1 = "SELECT * FROM comments_pill where pill ='".$_GET['pill']."';";
        // if($conn->query($sql1)){
        try {
            $res1 = $conn->query($sql1);

            while($row = $res1->fetch_assoc()){?>
				<div class="comment">
					<div class="author">
						<?=$row["name"]?>- <?=$row["email"]?>
						<span class="date"><?=$row["date_c"]?></span>
					</div>
					<div class="name"><?= $_GET['pill']?></div>
					
					<p><?=$row["comment"]?></p>
				
				</div>
				<?php
                        }
                        }catch (Exception $e){
                            echo $e;
                        }
                ?>
		
		
			<div class="comment_form">
				<h3>Write your comment about <b><?= $_GET['pill'] ?></b>...</h3>

                <form onsubmit="return false" id="form" name="form" method="POST">
                    <input id ="hide" name="hide" type="hidden" value="">
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                    <h3>Name</h3>
                    <input type="text" class="input_field_form" name="name" placeholder="Name"/>
                    <h3>Email</h3>
                    <input type="text" class="input_field_form" name="email" placeholder="Email"/>
                    <h3>Comment</h3>
                    <input type="text" class="input_field_form" name="comment" placeholder="Comment"/>
                    <input type="button" class="sub-btn" id="send-btn"  value="Send comment" onclick="send_data_form();" name="SubmitButton"/>
                   <!-- js-скрипт гугл капчи -->

                </form>    
               
                <script>
                   
                </script>
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
                                    url: "/insert_pill.php",
                                    type: "POST",
                                    data: fd,
                                    success: function (data) {
                                            alert("Data was processed. Reload page to insert new");
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
    </div><?php 
	require_once('footer.php');
?>