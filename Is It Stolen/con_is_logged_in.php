<?php
	//session_start();
	if (!isset($_SESSION['email'])){	
		//$_SESSION['msg'] = 'Πρέπει να κάνεις Login!';
		header("Location: index.php?msg=Πρέπει να κάνεις Login!");
		exit();
	}
?>