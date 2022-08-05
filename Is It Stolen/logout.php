<?php
	//require("con_is_logged_in.php");
	session_start();
	session_destroy();
	header("Location: index.php?msgg=Επιτυχής Αποσύνδεση!");
	exit();
?>