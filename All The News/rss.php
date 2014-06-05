<?php
session_start();

function show($uid, $storyLimit, $siteNum)
{
	$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");
	$limit = $storyLimit * $siteNum;
	$query = "SELECT * FROM stories WHERE u_id=" . $uid . " ORDER BY rank DESC, s_date DESC;";
	//echo $query;
	$result = mysqli_query($link,$query);
	$x=0;

	while($x<$limit && $row = mysqli_fetch_array($result)) 
	{
		$title = $row['title'];
		$href = $row['link'];
		$date = $row['s_date'];
		$rank = $row['rank'];
		
		echo '<p><strong><a href="'.$href.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		//echo '<p>'.$description.'</p>';
		echo '<p>'.$rank.'</p>';

		$x++;
	}

}


?>  