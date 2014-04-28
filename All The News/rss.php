<?php
session_start();

function loadRSS($uid)
{
	$sites = array();
	$keys = array();

	/********************Sites***********************************/
	$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

	if (!$link) 
	{
		echo "Oh no!";
	}
						  		
	$result = mysqli_query($link,"SELECT * FROM site WHERE u_id='" . $_SESSION['u_id'] . "';"); 

	while($row = mysqli_fetch_array($result)) 
	{

		$url = $row['url'];
		array_push($sites, $row['url']);
	}
	

	/*******************Keys************************************/
	$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

	if (!$link) 
	{
		echo "Oh no!";
	}
						  		
	$result = mysqli_query($link,"SELECT * FROM s_key WHERE u_id='" . $_SESSION['u_id'] . "';");  

	while($row = mysqli_fetch_array($result)) 
	{
		array_push($keys, $row['k']);
	}
	

	/********************Values*********************************/
	$storyLimit = 10;
	$siteNum = count($sites);

	$feed = array();
	$index = 0;

	foreach ($sites as $site)
	{
		$rss = new DOMDocument();
		$rss->load($site);
		$counter = 0;


		foreach ($rss->getElementsByTagName('item') as $node) 
		{
			// Create an array to store RSS info in
			$item = array 
			( 
				'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
				'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
				'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
				'date' => $node->getElementsByTagName('date')->item(0)->nodeValue,
				'pubDate' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue

			);

			
			$title = str_replace(' & ', ' &amp; ', $item['title']);
			$r = rank($title, $keys);

			$item['rank'] = $r;

			$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

			if (!$link) 
			{
    			echo "Oh no!";
			}

			
			if($item['date'] == "")
			{
				$item['date'] = date("Y/m/d H:i:s", strtotime($item['pubDate']));

			}
			else
			{
				
				$item['date'] = date("Y/m/d H:i:s", strtotime($item['date']));
			}

			array_push($feed, $item);

			$item['title'] = addslashes($item['title']);
			$dup = "SELECT duplicateCheck('" . $item['title'] . "');";
			$result = mysqli_query($link,$dup);
			//echo $dup . "<br>";
			$sql = "INSERT INTO stories(u_id, title, link, s_date, rank) VALUES('" . $uid . "', '" . $item['title'] . "', '" . $item['link'] . "', '" . $item['date'] . "', '" . $item['rank'] . "');";
			$result = mysqli_query($link,$sql);
			//echo $sql . "<br>";

			$counter++;

			if($counter >= $storyLimit)
			{
				break;
			}
		}

		$index++;	
	}

	show($uid, $feed, $storyLimit, $siteNum, $link);
}


function rank($title, $keys)
{
	$rank = 0;

	foreach($keys as $key)
	{
		$rank += (substr_count ($title , $key) * 5);
		//echo $rank . "      " . $title . "<br>";
	}

	return $rank;
}

function show($uid, $feed, $storyLimit, $siteNum, $link)
{

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