<?php session_start(); ?>
<?php
	$error= NULL;
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$password=$_POST['pwd'];
		$salt='$6$okay';
        echo "HELLLOP";
		
		/*if(strlen($username)<5){
			$error="<p>Your username must be at least 5 characters</p>";
		}else{*/
			require('dbparam.php');
			try {
                 $conn = new PDO($db_dsn, $db_user, $db_password);

                 // set the PDO error mode to exception
                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                 $sql = "SELECT * FROM accounts WHERE email=:email";
				$stmt = $conn->prepare($sql); 
				$stmt->execute(['email' => $email]);
		
				$record = $stmt -> fetch();
				if ($record['email'] == $email && $record['password'] == crypt($_POST['pwd'], $record['salt'])) {
					//$_SESSION['active'] = 1;
					//$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					header('Location: index.php');
				} else {
					header('Location: index.php?msg=Username or password is wrong..');
					//echo crypt($_POST['password'], $record['salt']);
					//echo $salt.'</br>';
					//echo $password.'</br>';
					//echo crypt($_POST['pwd'], $record['salt']).'</br>';
					//echo '$6$okay$akt1syUhq0R.HpH2u00HdRKUHXe1KLlVBIzIq';
				}
             }
             catch(PDOException $e) {
                 echo "Connection failed: " . $e->getMessage();
            }
		//}
		}
		
?>