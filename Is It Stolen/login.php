<?php session_start(); ?>
<?php
	$error= NULL;
	if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "" ){
		$secret = '6LesNk0hAAAAABd1JWTYGLGnsWD7rYW6hy--5Fpq';
    	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    	$responseData = json_decode ($verifyResponse);

    if ($response->success){

    }else{
        header("signup.php?msg=Wrong Captcha Code!");
    }
		//$username=$_POST['username'];
		$email=$_POST['email'];
		//$_SESSION['email']=$email;
		$password=$_POST['password'];
		$salt='$6$okay';
		
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
				if ($record['email'] == $email && $record['password'] == crypt($_POST['password'], $record['salt'])) {
					//$_SESSION['active'] = 1;
					//$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					header('Location: logged_in.php?msgg=congratulations');
				} else {
					header('Location: login-form.php?msg=Username or password is wrong..!');
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
		}else{
			header("Location:login-form.php?msg=Some error occured!");
		}
		
?>