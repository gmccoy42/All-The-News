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
		$s = $row['link'];

		$s = str_replace('http://', '', $s);
		$s = str_replace('www.', '', $s);
		$s = str_replace('rss.', '', $s);
		$start = strpos($s,'http://');
		$start = $start + 7;
		$end = strpos($s,'.');
		//$end = 0 - $end; // convert to negative
		//$end = $end -1;

		$s = substr($s, 0, $end);
		
		echo '<p><strong><a href="'.$href.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'       </em></small>' .$s. '<p>';
		//echo '<p>'.$description.'</p>';
		echo '<p>'.$rank.'</p>';

		$x++;
	}

}


?>  