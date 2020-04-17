<?php 
    require_once('header.php');
?>

	<div class="big-name">
		<div class="wrap">
			<h1><?= strtoupper($_GET['city'])?></h1>
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
                $sql = "SELECT DISTINCT NAME, FID from pharmacy where STATE='".
                strtoupper($_GET['state'])."' and COUNTY='".
                strtoupper($_GET['county'])."' and CITY='".strtoupper($_GET['city'])."';";
                // echo $sql;
                $res = $conn->query($sql);

                while($row = $res->fetch_assoc()){
                    echo '<li><a href= "/'.$_GET['state']."-".
                    $_GET['county']."-".$_GET['city']."-".join("-",explode(' ',strtolower($row['NAME']))).'~P'.$row['FID'].'.html">'.$row['NAME']."</a></li>";
                }

                echo "</ul><br>";
                echo "<h2>List of Hospital's</h2>";
                echo "<ul>";
                $sql = "SELECT DISTINCT hospital_name, fid from hospital_info where state_='".
                strtoupper($_GET['state']) ."' and county_name='".
                strtoupper($_GET['county']) ."' and city='". strtoupper($_GET['city']) ."';";
                // echo $sql;
                $res = $conn->query($sql);

                while($row = $res->fetch_assoc()){
                    echo '<li><a href="/'.$_GET['state']."-".$_GET['county']."-".$_GET['city']."-".join("-",explode(' ',strtolower($row['hospital_name']))).'~H'.$row['fid'].'.html">'.$row['hospital_name']."</a></li>";
                }
                $sql_state = "SELECT DISTINCT description from city_description_pharmacy where city='".strtoupper($_GET["state"])."' limit 0,1";
                $res_state = $conn->query($sql_state);
                $row_state = $res_state->fetch_assoc();
            ?>
                <br>
                </ul>
        
        <?php 
            $sql_pill = "SELECT DISTINCT pill_name from pills where city='".strtoupper($_GET["city"])."';";
            $res_pill = $conn->query($sql_pill);
            ?>
            <h2>Pill's list</h2>
            <ul>
            
            
            <?php 
            while ($row = $res_pill->fetch_assoc()){?>
                <li><a href="-<?= $row["pill_name"]; ?>-<?=$_GET['city']?>.html"><?= $row["pill_name"] ?></a></li>
        <?php 
            }?>
            </ul>
             </div>
			<div class="ls-col-right">
            <div class="country-info">
					<img src="img/emblem.png" alt="" />

					<h2>Facts about <?= strtoupper($_GET['city'])?></h2>

			
					<div class="cl"></div>
				</div>
				<p><?= $row_state['description'] ?></p>

			</div>
			<div class="cl"></div>
		</div>
	</div>
	
</div><?php 
    require_once('footer.php');
?>