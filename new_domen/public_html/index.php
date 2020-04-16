<?php ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form onsubmit="return false"  name="client_form"  id="form">
        <p>Login</p>
        <input style="display: block" type="text" name = 'login' id='login'>
        <p>Token</p>
        <input style="display: block" type="text" name = 'validator' id = "validator">
        <button onclick="send_data();" style="display: block" value="clck">click</button>
        <!-- <a href="my.php"></a> -->
        <!-- <input type="submit" value="click"> -->
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>    
        function send_data(){
            var fd = new FormData(document.getElementById("form"));

						$.ajax({
							url: "valid.php",
							type: "POST",
							data: fd,
							success: function (data) {
								alert(data);
								// alert("Ваша заявка успешно добавлена");
								// window.location = "/account/";	
							},
							processData: false,  // tell jQuery not to process the data
							contentType: false   // tell jQuery not to set contentType
						});
        }
        
    </script>
</body>
</html>