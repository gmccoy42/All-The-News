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

		setcookie("user", $uname, time()+3600);
		setcookie("pass", $pass, time()+3600);
		setcookie("login", 1, time()+3600);
		setcookie("u_id", $row['u_id'], time()+3600);
	}
	else
	{
		echo "Go away!";
	}

	header('Location: main.php');

?>