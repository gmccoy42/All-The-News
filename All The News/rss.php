<?php

<<<<<<< HEAD
$sites = array();
$keys = array();

/********************Sites***********************************/
array_push($sites, "http://rss.slashdot.org/Slashdot/slashdot","http://soylentnews.org/index.rss");
//array_push($sites, );

/*******************Keys************************************/
array_push($keys, "Arduino","Linux", "Android", "Raspberry Pi");

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
		);

		$title = str_replace(' & ', ' &amp; ', $item['title']);
		$r = rank($title, $keys);

		$item['rank'] = $r;

		array_push($feed, $item);

		$counter++;

		if($counter >= $storyLimit)
		{
			break;
		}
	}

	$index++;	
}

show($site, $feed, $storyLimit, $siteNum);
=======
function loadRSS()
{
	$sites = array();
	$keys = array();

	/********************Sites***********************************/
	array_push($sites, "http://rss.slashdot.org/Slashdot/slashdot","http://soylentnews.org/index.rss");
	//array_push($sites, );

	/*******************Keys************************************/
	array_push($keys, "Arduino","Linux", "Android", "Raspberry Pi");

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
			);

			$title = str_replace(' & ', ' &amp; ', $item['title']);
			$r = rank($title, $keys);

			$item['rank'] = $r;

			array_push($feed, $item);

			$counter++;

			if($counter >= $storyLimit)
			{
				break;
			}
		}

		$index++;	
	}

	show($site, $feed, $storyLimit, $siteNum);
}

>>>>>>> 5e7674eaefa366b02ae1d3c9ef988731727e4e4b

function rank($title, $keys)
{
	$rank = 0;

	foreach($keys as $key)
	{
		$rank += substr_count ($title , $key);
	}

	return $rank;
}

function show($site, $feed, $storyLimit, $siteNum)
{

	$limit = $storyLimit * $siteNum;

	for($x=0;$x<$limit;$x++) 
	{
		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
		$link = $feed[$x]['link'];
		$description = $feed[$x]['desc'];
		$date = date('l F d, Y', strtotime($feed[$x]['date']));
		$rank = $feed[$x]['rank'];
		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		//echo '<p>'.$description.'</p>';
		echo '<p>'.$rank.'</p>';
	}

}


?>  