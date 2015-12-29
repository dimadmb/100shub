<?php

$keyword = $_GET['keyword'];
$keyword = str_replace(' ', '+', $keyword);

$start='';
if(isset($_GET['start']))
	$start = intval($_GET['start']);

$url = "http://images.google.com/search?tbm=isch&tbs=isz:lt,islt:qsvga,itp:photo&start=$start&q=$keyword";
$page = file_get_contents($url);

preg_match_all('/imgurl\\\x3d(http:\/\/[^\\\]*(jpg|png|gif|jpeg))\\\x26/', $page, $matches, PREG_SET_ORDER);
$images = array();

foreach($matches as $m)
{
	$image = str_replace('%2520', '%20', $m[1]);
		$images[] = urldecode($image);
}

header("Content-type: application/json; charset=UTF-8");
header("Cache-Control: must-revalidate");
header("Pragma: no-cache");
header("Expires: -1");		

print(json_encode($images));