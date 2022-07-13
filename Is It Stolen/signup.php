<?php 
    $flag=0;
    $email=$_POST['email'];
    require('dbparam.php');
    try {
        $conn = new PDO($db_dsn, $db_user, $db_password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT email from accounts";
        $stmt = $conn->prepare($sql); 
        $stmt->execute(['emaik' => $email]);
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

?>
    
<?php 
    $error= NULL;
    if(isset($_POST['submit']) && $flag == 0){
        $email=$_POST['email'];
        $uid=$username;
        //$email=$_POST['email'];
        $verified=0;
        $salt='$6$okay';
        $password=$_POST['pwd'];
        $passcheck=$_POST['pwdre'];
        $vkey=rand(10000,99999);

        $encrypt_pass = crypt($password, $salt);
        try {
            $conn = new PDO($db_dsn, $db_user, $db_password);

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO accounts (password, salt, email,vkey, verified) VALUES (:password, :salt, :email,:vkey, :verified)";
            $stmt = $conn->prepare($sql); 
            $stmt->execute(['password' => $encrypt_pass, 'salt' => $salt, 'email' => $email,'vkey'=>$vkey, 'verified' => $verified]);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        if($sql){
            //send email
            $to = $email;
            $subject="Email Verification";
            $message="Your verification key is ".$vkey;
            $headers= "From: doki9616@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0 ". "\r\n";
            $headers .="Content-type:text/html;charset=UTF-8" ." \r\n";
            
            mail($to,$subject,$message,$headers);
            header('Location:login.php?msg=Email sent in your email');
        }else{
            echo $mysqli->error;
        }
    }
    ?>
    <?php
        echo $error;
    ?>