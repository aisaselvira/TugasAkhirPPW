<?php 
	session_start();
	unset($_SESSION['pembeli']);
	unset($_SESSION['id']);
	header('location:../user_login.php');
 ?>