<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>City List</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:700|Roboto:300,400,400i,500&display=swap" rel="stylesheet">
	<link href="/css/style1.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/js.js"></script>
    <style>
    </style>
</head>
<body>
<div class="pagetop">
	<div class="head">
		<div class="wrap">
			<a href="/" class="logo"><img src="/img/logo_head.png" alt="" /></a>
			<div class="search">
				


					<input type="text" name="search" id="search" value=""  placeholder="Find a Hospital" />
					<button></button>
					<ul class="list-group" id="list"></ul>
				
						
				</form>
			</div>
			<div class="menu">
				<a href="states.html">States</a>
				<span class="sep">|</span>
				<a href="text.php">Help & Info</a>
				<span class="sep">|</span>
				<a href="about.php">About Us</a>
			</div>
			
			<div class="cl"></div>
		</div>
	</div>
	<script>
		const people = [
			{'name' : 'rock'},
			{'name' : 'brock'},
		];
		var list = document.getElementById("list");
		var search = document.getElementById("search");

		function set_list(group){
			clear_list();
			for(const person of group){
				const item = document.createElement('li');
				const text = document.createTextNode(person.name);
				item.appendChild(text);
				list.appendChild(item);

			}
			if (group.length==0){
				setNoResults();
			}
		}
		function getRelevancy(value, searchTerm){
			if (value === searchTerm){
				return 2;
			} else if (value.startsWith(searchTerm)){
				return 1;
			}else if (value.includes(searchTerm)){
				return 0;
			}else {
				return -1;
			}

		}
		function clear_list(){
			while (list.firstChild){
				list.removeChild(list.firstChild);
			}
		}
		function setNoResults(){
			const item = document.createElement('li');
			const text = document.createTextNode("No result");
			item.appendChild(text);
			list.appendChild(item);
		}
	
		search.addEventListener('input', (event) => {
			var value = event.target.value;
			if (value && value.trim().length > 0){
				value = value.trim().toLowerCase();
				set_list(people.filter(person => {
					return person.name.includes(value);
				}).sort((pearsonA, pearsonB) => {
					return getRelevancy(pearsonB.name, value)- getRelevancy(pearsonA.name, value);
				}));
			}else{
				clear_list();
			}
		})
		
	</script>
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
	
	?> 