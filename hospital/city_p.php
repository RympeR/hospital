<?php 
	require_once('header.php');
?>
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
                <h2>List of City</h2>
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
        $sql = "SELECT DISTINCT CITY from pharmacy where STATE ='".
                $_GET['state']."' and COUNTY='".
                $_GET['county']."';";
        // echo $sql;
        $res = $conn->query($sql);
        while($row = $res->fetch_assoc()){
            $sql_city = "SELECT DISTINCT description from city_description_pharmacy where city='".$row["CITY"]."' limit 0,1";
            $res_city = $conn->query($sql_city);
            $row_city = $res_city->fetch_assoc();
            echo "<li><a href='pharmacy_p.php?county=".$_GET['county']."&state=".$_GET['state']."&city=".
            $row['CITY']."'>".$row['CITY']."</a></td><td>".$row_city["description"]."</li>";
        }
        $sql_state = "SELECT DISTINCT description from county_description_pharmacy where county='".$_GET["county"]."' limit 0,1";
        $res_state = $conn->query($sql_state);
        $row_state = $res_state->fetch_assoc();
?>  
</ul>
                </div>
			<div class="ls-col-right">
				<h2>Facts about <?= $_GET['county']?></h2>
				<p><?= $row_state['description'] ?></p>
			</div>
			<div class="cl"></div>
		</div>
	</div>
	
</div>
<?php 
	require_once('footer.php');
?>