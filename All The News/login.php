<?php
	$uname = $_POST['username'];
	$pass = $_POST['password'];

	//Check SQL database
	$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

	if (!$link) 
	{
    	echo "Oh no!";
	}
  		
  	$result = mysqli_query($link,"SELECT * FROM user WHERE uname='" . $uname . "' AND pass='" . $pass . "';"); 
  //	echo $result;
  	$row = mysqli_fetch_array($result);

  	echo $row['uname'];
  	echo $row['pass'];

  	if($row['uname'] == $uname && $row['pass'] == $pass)
  	{

		setcookie("user", $uname, time()+4840480);
		setcookie("pass", $pass, time()+4840480);
		setcookie("login", 1, time()+4840480);
		setcookie("u_id", $row['u_id'], time()+4840480);
		header('Location: main.php');
	}
	else
	{
		echo "Go away!";
	}

	

?>+