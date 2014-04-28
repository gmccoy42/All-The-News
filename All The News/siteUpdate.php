<?php
	$nsite = $_POST['site'];
	session_start();
	
	$uid = $_SESSION['u_id'];
	//Check SQL database
	$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

	if (!$link) 
	{
    	echo "Oh no!";
	}

  	$sql = "INSERT INTO site(u_id, url) VALUES('" . $uid . "', '" . $nsite . "');";	
  	$result = mysqli_query($link,$sql); 
  	echo $result;
  	
	header('Location: sites.php');

?>