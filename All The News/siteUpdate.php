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
	else if(isset($_POST['username']))
	{
		$user = $_POST['username'];
		$pass = $_POST['password'];

		Register($user, $pass);

	}
	else if(isset($_POST['update_button']))
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
	else if(isset($_POST['delete_button']))
	{
		$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");
		$result = mysqli_query($link,"SELECT * FROM s_key WHERE u_id='" . $uid . "';"); 

		while($row = mysqli_fetch_array($result)) 
		{
			$k = $row['k'];
			
			$k2 = str_replace(" ","", $k);
			echo "k = " . $k . "<br>k2 = " . $k2 . "<br>";

			if($_POST[$k2] == 'on')
			{
				echo "DELETE TRIGGERED<br>";
				echo $_POST[$k2];
				mysqli_query($link,"DELETE FROM s_key WHERE k='" . $k . "';"); 
			}
			echo "<br>";
		}

		header('Location: Keywords.php');
	}
	else if(isset($_POST['site_delete']))
	{
		$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");
		$result = mysqli_query($link,"SELECT * FROM site WHERE u_id='" . $uid . "';"); 

		while($row = mysqli_fetch_array($result)) 
		{
			$url = $row['url'];
			$url2 = str_replace('/', '', $url);
			$url2 = str_replace('.', '', $url2);
			$url2 = str_replace(':', '', $url2);
			$url2 = str_replace('\\', '', $url2);
			echo "url = " . $url . "<br>";
			echo $_POST[$url2] . "<br>";

			if($_POST[$url2] == 'on')
			{
				echo "DELETE TRIGGERED<br>";
				mysqli_query($link,"DELETE FROM site WHERE url='" . $url . "' && u_id='" . $uid . "';"); 
			}
			echo "<br>";
		}

		header('Location: sites.php');
	}
	else
	{
		echo "Something went wrong!";
	}


	
	

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
	  	/*
	  	$sql = "SELECT ATN_Update();";
	  	$result = mysqli_query($link,$sql); 
	  	*/

	  	header('Location: loadRss.php');
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
	  	  
	  	header('Location: loadRss.php');
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

	function Register($user, $pass)
	{
		$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

		if (!$link) 
		{
	    	echo "Oh no!";
		}

		$sql = "INSERT INTO user(uname, pass) VALUES('" . $user . "', '" . $pass . "');";
		$result = mysqli_query($link, $sql);

		header('Location: loadRss.php');
		header('Location: main.php');

	}

?>