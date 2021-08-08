<?php
	$email 	  = $_GET['email'];
	$password = $_GET['password'];
	include_once('cn.php');
	$query = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
	//var_dump($query);
	$result = mysqli_query($cn,$query) or die("Cant Run Query".mysqli_error($cn));
	$rows = mysqli_num_rows($result);
	if ($rows > 0){
		$row = mysqli_fetch_array($result);
		$user = $row['fname'];
		session_start();
		$_SESSION['user'] = $user; 
		header('Location:../home.php');
	} else {
		header('Location:../index.php');
	}
?>