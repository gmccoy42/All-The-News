<?php

	session_start();
	$uid = $_SESSION['u_id'];


	if(isset($_POST['site']))
	{
		$nsite = $_POST['site'];
		sitesUp($uid, $nsite);
	}

	if(isset($_POST['key']))
	{
		$nkey = $_POST['key'];
		keyUp($uid, $nkey);
	}
	
	echo "Something went wrong!";

	function sitesUp($uid, $nsite)
	{
		//Check SQL database
		$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

		if (!$link) 
		{
	    	echo "Oh no!";
		}

	  	$sql = "INSERT INTO site(u_id, url) VALUES('" . $uid . "', '" . $nsite . "');";	
	  	$result = mysqli_query($link,$sql); 
	  	
		header('Location: sites.php');
	}

	function keyUp($uid, $nkey)
	{
		//Check SQL database
		$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

		if (!$link) 
		{
	    	echo "Oh no!";
		}

	  	$sql = "INSERT INTO s_key(u_id, k) VALUES('" . $uid . "', '" . $nkey . "');";	
	  	$result = mysqli_query($link,$sql); 
	  	
		header('Location: Keywords.php');


	}

?>