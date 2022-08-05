<?php 
    if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] != ""){
    $secret = '6LesNk0hAAAAABd1JWTYGLGnsWD7rYW6hy--5Fpq';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode ($verifyResponse);

    if ($response->success){

    }else{
        header("signup.php?msg=Wrong Captcha Code!");
    }

    $flag=0;
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordre=$_POST['passwordre'];
    require('dbparam.php');

    //validation

        
    if(strlen($username)<5){
        header("Location: sign-up.php?msg=Username must be at least 5 characters!");
        exit;
    }
    if (!preg_match("/^[a-zA-Z0-9']*$/",$username)) {
        header("Location: sign-up.php?msg=Only numbers and letters allowed!");
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: sign-up.php?msg=Invalid email!");
        exit;
    }
    
    //header("Location: sign-up.php?msg=TEST!");
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars) {
        header("Location: sign-up.php?msg=Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");
        exit;
    }

    if ($password != $passwordre) {
        header("Location: sign-up.php?msg=Passwords don't match!");
        exit;
    }



    try {
        $conn = new PDO($db_dsn, $db_user, $db_password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT email from accounts";
        $stmt = $conn->prepare($sql); 
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetchALL();
    
        foreach($row as $rs){
            if($rs['email'] == $email) {
                $flag=1;
                header("Location: sign-up.php?msg=user already exists!");
            }
        }
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

//
    
// 
    $error= NULL;
    if(isset($_POST['submit']) && $flag == 0){
        $email=$_POST['email'];
        $uid=$username;
        //$email=$_POST['email'];
        $verified=0;
        $salt='$6$okay';
        $password=$_POST['password'];
        $passcheck=$_POST['passwordre'];
        $vkey=rand(10000,99999);

        $encrypt_pass = crypt($password, $salt);
        try {
            $conn = new PDO($db_dsn, $db_user, $db_password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO accounts (email ,password, salt, username,vkey, verified) VALUES (:email, :password, :salt, :username,:vkey, :verified)";
            $stmt = $conn->prepare($sql); 
            $stmt->execute(['email' => $email, 'password' => $encrypt_pass, 'salt' => $salt, 'username' => $username,'vkey'=>$vkey, 'verified' => $verified]);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        if($sql){
            /*send email
            $to = $email;
            $subject="Email Verification";
            $message="Your verification key is ".$vkey;
            $headers= "From: doki9616@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0 ". "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" ." \r\n";
            
            mail($to,$subject,$message,$headers);*/
            header('Location:login-form.php?msgg=Account was created!');
        }else{
            echo $mysqli->error;
        }
    }
}else{
    header("Location:sign-up.php?msg=Some error occured!");
}
    ?>
    <?php
        echo $error;
    ?>