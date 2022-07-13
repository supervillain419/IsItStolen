<?php
	//require("con_is_logged_in.php");
	session_start();
	session_destroy();
	header("Location: index.php?msg=Επιτυχής Αποσύνδεση!");
	exit();
?>