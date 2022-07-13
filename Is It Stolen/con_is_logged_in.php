<?php
	//session_start();
	if (!isset($_SESSION['username'])){	
		//$_SESSION['msg'] = 'Πρέπει να κάνεις Login!';
		header("Location: index.php?Πρέπει να κάνεις Login!");
		exit();
	}
?>