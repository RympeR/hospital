<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
        $sql = "SELECT DISTINCT * FROM pills where pill_name='".$_GET['pill']."' and city='".$_GET['city']."';";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();
    ?>
    <div>
        <h1><?= $_GET['pill']?></h1>
        <div >
            <h4>AMOUNT</h4>
                <?php
                   echo $row["amount"];
                ?>    
            </div>
        </div>
        <div >
            <h4>PRICE</h4>
            <p>
                <?php
                    echo $row["price"];
                ?>
            </p>
            </div>
        </div>
        <div><h4>Description</h4>
            <?php
                echo $row["description"];
            ?>    
        </div>
    </div>
</body>
</html>