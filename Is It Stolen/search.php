<?php include('header.php'); ?>
<?php
	$error= NULL;
	if(isset($_POST['submit']) ){
		//&& (isset($_POST['serial-number']))
		$object=$_POST['choice'];
        $serialn=$_POST['serial-number'];
		//echo $object;
        //echo $serialn;
    
		require('dbparam.php');
		try {
            $conn = new PDO($db_dsn, $db_user, $db_password);
             // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM bicycle WHERE serialnum = :serial";
			$stmt = $conn->prepare($sql); 
			$stmt->execute(['serial' => $serialn]);
		
			$record = $stmt -> fetch();
			if($_POST['serial-number'] != ""){ //If serial num is not empty!!
			if ($record['serialnum'] == $serialn) {
				//$_SESSION['email'] = $email;
				header('Location: index.php?msgg=Serial number exists');
			} else {
				header('Location: index.php?msg=Serian number does NOT exist!');
			}
		}else{
			header('Location: index.php?msg=Try giving a value!');
		}
            }catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
			
		}
		
?>