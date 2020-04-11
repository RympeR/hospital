
	<?php 
	require_once('header.php');
?>	
	<div class="search_form">
		<div class="wrap">
			<h1>Find a Hospital at Your City, State, County</h1>
			<div class="s-col">
				<h4>Search Hospitals</h4>
				<input type="text" name="" value="" placeholder="Dallas, TX 75247" />
			</div>
			<div class="s-col">
				<h4>For treatment near</h4>
				<input type="text" name="" value="" placeholder="Dallas, TX 75247" />
			</div>
			<div class="s-col-sm">
				<h4>&nbsp;</h4>
				<button>Search</button>
			</div>
			<div class="cl"></div>
		</div>
	</div> 


	<div class="text">
		<div class="wrap">
			<div class="main-left">
				<h2>Latest Reviews on <b>Name Site</b></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra</p>
				<a href="#" class="sub-btn">Leave a Reviews</a>
			</div>
			<div class="main-right testimonials slider">

				
					<?php 
					$servername = "localhost";
					$username = "admin_admin";
					$password = "cJ9Mhri450";
					$dbname = "admin_hospital";
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error){
						die("Connection error: ");
					}
					mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
					mysqli_query($conn, "SET CHARACTER SET 'utf8'");
					if(!$conn->set_charset("utf8")){
						echo "ошибка кодировки";
					}
						$sql_comment = "SELECT DISTINCT pharmacy, name, comment from comments_pharmacy limit 0,10";

       
						$res = $conn->query($sql);
						$res_comment = $conn->query($sql_comment);
						while($row = $res_comment->fetch_assoc()){
							$sql_hospital = "SELECT DISTINCT NAME, STATE, COUNTY, CITY from pharmacy where NAME='".$row['pharmacy']."';";
							$res_link = $conn->query($sql_hospital);
							$k = 0;
							echo "<div class='slide'>";
							// echo $sql_hospital;
							while ($row_link = $res_link->fetch_assoc()){
								
								
							
						
					?>
					<div class="testimonial red">
						<div class="author">
							Ashley<?= $row['name'] ?>
							<!-- <span class="date">25/02/2020</span> -->
						</div>
						<div class="name"></div>
						<div class="stars">
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star"></a>
							<a href="#" class="star"></a>
							<a href="#" class="star"></a>
						</div>
						<p><?= $row['comment']?></p>
						<?php 
							echo "<a href='pharmacy_info.php?state=".$row_link['STATE']."&county=".$row_link['COUNTY']."&city=".$row_link['CITY']."&pharmacy=".$row_link['NAME']."'>"."Read full review".
							"</a>";
						?>
						<!-- <a href="#" class="more">Read full review</a> -->
					</div>
					<?php 
							}
							echo "</div>";
						}?>
					<!-- <div class="testimonial green">
						<div class="author">
							Ashley
							<span class="date">25/02/2020</span>
						</div>
						<div class="name">Hospital</div>
						<div class="stars">
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star"></a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu posuere diam. Ut interdum suscipit tortor, eget fermentum lorem</p>
						<a href="#" class="more">Read full review</a>
					</div> -->
					<div class="cl"></div>
				</div>
				<div style="display: none" class="slide">
					<div class="testimonial red">
						<div class="author">
							Ashley
							<span class="date">25/02/2020</span>
						</div>
						<div class="name">Hospital</div>
						<div class="stars">
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star"></a>
							<a href="#" class="star"></a>
							<a href="#" class="star"></a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu posuere diam. Ut interdum suscipit tortor, eget fermentum lorem</p>
						<a href="#" class="more">Read full review</a>
					</div>
					<div class="testimonial green">
						<div class="author">
							Ashley
							<span class="date">25/02/2020</span>
						</div>
						<div class="name">Hospital</div>
						<div class="stars">
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star full"></a>
							<a href="#" class="star"></a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu posuere diam. Ut interdum suscipit tortor, eget fermentum lorem</p>
						<a href="#" class="more">Read full review</a>
					</div>
					<div class="cl"></div>
				</div>
			</div>
			<div class="cl"></div>
		
			<h2>More Info About <b>Name Site</b></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
			<a href="#" class="sub-btn">Read More</a>
		</div>
	</div>


 </div>
 <script type="text/javascript" src="js/siema.min.js"></script>
<script type="text/javascript">
	function printSlideIndex() {
		$('.slider button').removeClass("selected");
		$('.slider button').eq(this.currentSlide).addClass("selected");
	}
	
	const mySiema_m = new Siema({selector: '.slider',onChange: printSlideIndex});

	Siema.prototype.addPagination = function() {
	  for (let i = 0; i < this.innerElements.length; i++) {
		const btn = document.createElement('button');
		btn.addEventListener('click', () => this.goTo(i));
		this.selector.appendChild(btn);
	  }
	  $('.slider button').eq(0).addClass("selected");
	}
	mySiema_m.addPagination();
	window.onresize = function(event) {
		mySiema_m.addPagination();
	};
</script>
 <?php 
	require_once('footer.php');
?>

 