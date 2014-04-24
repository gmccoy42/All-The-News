<?php

function loadRSS($uid)
{
	$sites = array();
	$keys = array();

	/********************Sites***********************************/
	array_push($sites, "http://www.reddit.com/r/technology.rss", "http://soylentnews.org/index.rss", "http://rss.slashdot.org/Slashdot/slashdot");
	//array_push($sites, );

	/*******************Keys************************************/
	array_push($keys, "Arduino","Linux", "Android", "Raspberry Pi", "Google", "Arch Linux", "Debian", "Video Games", "Valve");

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
			$sql = "INSERT INTO stories(u_id, title, link, s_date, rank) VALUES('" . $uid . "', '" . $item['title'] . "', '" . $item['link'] . "', '" . $item['date'] . "', '" . $item['rank'] . "');";
			$result = mysqli_query($link,$sql);

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
		$rank += substr_count ($title , $key);
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