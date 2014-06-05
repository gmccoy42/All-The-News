<?php

session_start();

$uid = 1;
$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

$out = mysqli_query($link,"SELECT * FROM site WHERE u_id='" . 1 . "';"); 

while ($uid = mysqli_fetch_array($out))
{
	upByUid($uid['u_id']);
}

		
	

function rank($title, $keys, $val)
{
	$rank = 0;
	$count = 0;

	foreach($keys as $key)
	{
		$rank += (substr_count ($title , $key) * $val[$count]);

		if(substr_count ($title , $key) > 1)
		{
			//Get keywords and tag it
		}
		//echo $rank . "      " . $title . "<br>";

		$count++;
	}

	return $rank;
}

function upByUid($uid)
{
	$sites = array();
	$keys = array();
	$val = array();

	$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

	/********************Sites***********************************/				  		
	$result = mysqli_query($link,"SELECT * FROM site WHERE u_id='" . $uid . "';"); 

	while($row = mysqli_fetch_array($result)) 
	{

		$url = $row['url'];
		array_push($sites, $row['url']);
	}
	

	/*******************Keys************************************/				  		
	$result = mysqli_query($link,"SELECT * FROM s_key WHERE u_id='" . $uid . "';");  

	while($row = mysqli_fetch_array($result)) 
	{
		array_push($keys, $row['k']);
		array_push($val, $row['val']);
	}
	

	/********************Values*********************************/
	$storyLimit = 10;
	$siteNum = count($sites);

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
			$r = rank($title, $keys, $val);

			$item['rank'] = $r;

			$link = mysqli_connect("127.0.0.1","root", "Conestoga1", "ATN_db");

			if (!$link) 
			{
    			echo "Oh no!";
			}

			
			if($item['date'] == "")
			{

				$item['date'] = date("Y/m/d H:i:s", strtotime($item['pubDate']));
				//$item['date'] = date("Y/m/d H:i:s", strtotime($timezone . ' hours', $item['date']));
				//echo $timezone . "<br>";
			}
			else
			{
				
				$item['date'] = date("Y/m/d H:i:s", strtotime($item['date']));
				//$item['date'] = date("Y/m/d H:i:s", strtotime($timezone . ' hours', $item['date']));
			}


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

}

?>