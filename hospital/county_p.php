
	<?php 
	require_once('header.php');
?>
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
			<h2>List of County</h2>
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
							$sql_state = "SELECT DISTINCT description from state_description_pharmacy where state='".$_GET["state"]."' limit 0,1";
							$res_state = $conn->query($sql_state);
							$row_state = $res_state->fetch_assoc();
                    ?>
                </ul>
                </div>
			<div class="ls-col-right">
				<div class="country-info">
					<img src="img/emblem.png" alt="" />

					<h2>Facts about <?= $_GET['state']?></h2>

			
					<div class="cl"></div>
				</div>
				<p><?= $row_state['description'] ?></p>
			</div>
			<div class="cl"></div>
		</div>
	</div>
	
</div>
<?php 
	require_once('footer.php');
?>