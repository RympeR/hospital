<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/checkout/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
  <?php
        function select($destintaion){
            return "SELECT $destintaion from $destintaion"."_description_pharmacy";
        }
        
        $sql_pill = "SELECT * from pills;";
        
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
        $res_state = $conn->query(select("state"));
        $res_county = $conn->query(select("county"));
        $res_city = $conn->query(select("city"));
        $res_city_1 = $conn->query(select("city"));
        
    ?>
    <div class="container">
  <div class="py-5 text-center">
   
    <h2>Description add form</h2>
  </div>

  <div class="row">
  
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Description</h4>
      <form class="needs-validation" onsubmit="return false" id="form" name="form" method="POST">
        <div class="mb-3">
          <textarea name="description" class="form-control" rows="5" col style="display: block" id ="description" placeholder="Input description"></textarea>
        </div>

        <div class="row">
            <div class="col-md-5 mb-3">
                
                    <select class="custom-select d-block w-100" id="choice" name="choice" onchange="get_state()">
                        <option name="choose" value="choose" selected disabled>choose</option>
                        <option  name="state" value="state">state</option>
                        <option  value="county">county</option>
                        <option  value="city">city</option>
                    </select>
               
            </div>    
            <div class="col-md-5 mb-3">
                <div style="display: none" id="state_d">
                    <select class="custom-select d-block w-100" style="display: none" id="state" name="state">
                        <?php
                        while($row_state = $res_state->fetch_assoc()){
                            ?><option value="<?=$row_state["state"]?>"><?=$row_state["state"]?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div style="display: none" id="county_d">
                    <select class="custom-select d-block w-100" style="display: none" id="county" name="county">
                        <?php
                            while($row_county = $res_county->fetch_assoc()){
                                ?><option value="<?=$row_county["county"]?>"><?=$row_county["county"]?></option><?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-5 mb-3">
                <div style="display: none" id="city_d">
                    <select class="custom-select d-block w-100"  id="city" name="city">
                        <?php
                            while($row_city = $res_city->fetch_assoc()){
                                ?><option value="<?=$row_city["city"]?>"><?=$row_city["city"]?></option><?php
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <hr class="mb-4">
        <input type="hidden" id="index" name="index">
       
        <button class="btn btn-primary btn-lg btn-block" onclick="send_data_form();">Update description</button>
      </form>
      <br>
      <br>
      <form class="needs-validation" onsubmit="return false" id="form1" name="form1" method="POST">
        <div class="mb-3">
          <textarea name="description_pi" class="form-control" rows="5" col style="display: block" id ="description_pi" placeholder="Input description"></textarea>
        </div>

        <div class="row"> 
            <div class="col-md-5 mb-3">
                
                        <select class="custom-select d-block w-200" id="city1" name="city1">
                            <option selected disabled value="choose city">choose city</option>
                            <?php
                                while($row_city = $res_city_1->fetch_assoc()){
                                    ?><option value="<?=$row_city["city"]?>"><?=$row_city["city"]?></option><?php
                                }
                            ?>
                        </select>

                
                <p>Pill Name</p>
                <input type="text" name="pill_name">
                <p>Price $</p>
                <input type="number" name="price">
                <p>Amount</p>
                <input type="number" name="amount">
            </div>
            
        </div>
        <hr class="mb-4">
        <input type="hidden" id="index1" name="index1">
       
        <button class="btn btn-primary btn-lg btn-block" onclick="insert_pill_info();">Update pills</button>
      </form>
      <a href="index.php">States</a>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
       var choice = '';
        function get_state(){
            
            if(document.getElementById("choice").value == 'state'){
                document.getElementById("state_d").style = 'display:block';
                document.getElementById("county_d").style = 'display:none';
                document.getElementById("city_d").style = 'display:none';
                choice = 'state';
                
            }else if(document.getElementById("choice").value == 'county'){
                document.getElementById("state_d").style = 'display:none';
                document.getElementById("county_d").style = 'display:block';
                document.getElementById("city_d").style = 'display:none';
                choice = 'county';
            }else if(document.getElementById("choice").value == 'city'){
                document.getElementById("state_d").style = 'display:none';
                document.getElementById("county_d").style = 'display:none';
                document.getElementById("city_d").style = 'display:block';
                choice = 'city';
            }
        }
        function send_data_form(){
            if (choice == 'state'){
                document.getElementById("index").value = document.getElementById("state").value;
            }else if(choice=='county'){
                document.getElementById("index").value = document.getElementById("county").value;
            }else if(choice=='city'){
                document.getElementById("index").value = document.getElementById("city").value;
            }
            var fd = new FormData(document.getElementById("form"));
            
            // alert(document.getElementById("index").value)
            $.ajax({
                url: "/pharmacy/description_insert_p.php",
                type: "POST",
                data: fd,
                success: function (data) {
                    // alert(data);
                    // alert(data);
                        },
                processData: false, 
                contentType: false   
            });;
        }
        function insert_pill_info(){
            document.getElementById("index1").value = document.getElementById("city1").value;
            var fd1 = new FormData(document.getElementById("form1"));
            $.ajax({
                url: "/pill_info_insert.php",
                type: "POST",
                data: fd1,
                success: function (data) {
                    // alert(data);
                        },
                processData: false, 
                contentType: false   
            });;
        }
    </script>
</div>