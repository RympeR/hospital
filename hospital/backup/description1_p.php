<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
    <?php
        function select($destintaion){
            return "SELECT $destintaion from $destintaion"."_description";
        }
       
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
        

    ?>
    <form onsubmit="return false" id="form" name="form" method="POST">
        <select id="choice" name="choice" onchange="get_state()">
            <option name="choose" value="choose" selected disabled>choose</option>
            <option  name="state" value="state">state</option>
            <option  value="county">county</option>
            <option  value="city">city</option>
        </select>    
        <br>
        <select style="display: none" id="state" name="state">
            <?php
            while($row_state = $res_state->fetch_assoc()){
                ?><option value="<?=$row_state["state"]?>"><?=$row_state["state"]?></option><?php
            }
            ?>
        </select>
        <br>
        <select style="display: none" id="county" name="county">
        <?php
        while($row_county = $res_county->fetch_assoc()){
            ?><option value="<?=$row_county["county"]?>"><?=$row_county["county"]?></option><?php
        }
        ?>
        </select>
        <br>
        <select style="display: none" id="city" name="city">
        <?php
        while($row_city = $res_city->fetch_assoc()){
            ?><option value="<?=$row_city["city"]?>"><?=$row_city["city"]?></option><?php
        }
        ?>
        </select>
        <br>
        <input type="hidden" id="index" name="index">
        <textarea name="description" rows="5" col style="display: block" id ="description" placeholder="Input description"></textarea>
        <input type="button" onclick="send_data_form();" style="display: block" value="Click"/>
    </form>
    <a href="index.php">States</a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
       var choice = '';
        function get_state(){
            
            if(document.getElementById("choice").value == 'state'){
                document.getElementById("state").style = 'display:block';
                document.getElementById("county").style = 'display:none';
                document.getElementById("city").style = 'display:none';
                choice = 'state';
                
            }else if(document.getElementById("choice").value == 'county'){
                document.getElementById("state").style = 'display:none';
                document.getElementById("county").style = 'display:block';
                document.getElementById("city").style = 'display:none';
                choice = 'county';
            }else if(document.getElementById("choice").value == 'city'){
                document.getElementById("state").style = 'display:none';
                document.getElementById("county").style = 'display:none';
                document.getElementById("city").style = 'display:block';
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
                url: "/description_insert.php",
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
    </script>
</body>
</html>