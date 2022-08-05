<?php 
    $stolen = 0;
    $serial_num = $_POST['serial-num'];
    $owner = $_POST['owner'];
    echo $serial_num;
    echo $owner;

    require('dbparam.php');
    $error= NULL;
    if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] != ""){
        $secret = '6LesNk0hAAAAABd1JWTYGLGnsWD7rYW6hy--5Fpq';
    	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    	$responseData = json_decode ($verifyResponse);

    if ($response->success){

    }else{
        header("add.php?msg=Wrong Captcha Code!");
    }
        try {
            $conn = new PDO($db_dsn, $db_user, $db_password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO bicycle (serialnum, owner, stolen) VALUES (:serialnum, :owner, :stolen)";
            $stmt = $conn->prepare($sql); 
            $stmt->execute(['serialnum' => $serial_num, 'owner' => $owner, 'stolen' => $stolen]);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        if($sql){
            header('Location:add.php?msgg=Record was added in the database!');
        }else{
            echo $mysqli->error;
        }
    }else{
        header("Location:add.php?msg=Something Went Wrong!");
    }
    ?>
    <?php
        echo $error;
    ?>
