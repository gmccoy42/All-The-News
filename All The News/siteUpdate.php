<?php

	session_start();
	$uid = $_SESSION['u_id'];


	if(isset($_POST['site']))
	{
		$nsite = $_POST['site'];
		sitesUp($uid, $nsite);
	}
	else if(isset($_POST['key']))
	{
		$nkey = $_POST['key'];
		keyUp($uid, $nkey);
	}
	else
	{
		$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");
		$result = mysqli_query($link,"SELECT * FROM s_key WHERE u_id='" . $_SESSION['u_id'] . "';"); 
		
		while($row = mysqli_fetch_array($result)) 
		{
			$k = $row['k'];
			$k2 = str_replace(" ","", $k);
			$nval = $_POST[$k2];
			echo $k . "<br>";

			//echo $_POST['Ubuntu'];// THE POST IS NULL
			keyVal($uid, $nval, $k);
	  	}

	  	header('Location: Keywords.php');

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

	  	$sql = "INSERT INTO s_key(u_id, k, val) VALUES('" . $uid . "', '" . $nkey . "', 5);";	
	  	$result = mysqli_query($link,$sql); 
	  	
		header('Location: Keywords.php');


	}

	function KeyVal($uid, $nval, $k)
	{
		$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

		if (!$link) 
		{
	    	echo "Oh no!";
		}
		$sql = "UPDATE s_key SET val='" . $nval . "' WHERE u_id='" . $uid . "' && k='" . $k . "';";
		echo $sql . "<br>";
		$result = mysqli_query($link, $sql);
		//echo $sql . "<br>";

	}

?>