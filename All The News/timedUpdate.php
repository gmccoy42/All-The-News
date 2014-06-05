<?php
session_start();

include 'rss.php';

timed();

function timed()
{
	echo "Connecting to Database...<br>";
	
	$q = "SELECT COUNT(u_id) FROM user;";
	$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

	if (!$link) 
	{
		echo "Oh no!";
	}
	
	echo "Running Query...<br>";

	$result = mysqli_query($link,$q);
	$num = mysqli_fetch_array($result);
	$x = 0;

	while($x <= $num)
	{
		loadRSS($num);
		echo $x . " Updated Successfully<br>";
		$x++;
	}

	sleep(0);
}



?>