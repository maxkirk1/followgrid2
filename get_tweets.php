<?php

require_once('twitter_proxy.php');

// Twitter OAuth Config options
$oauth_access_token = '347422573-GmClMaGbZQWlaR6nioWNJTUpjBZEGGBi2zneshA9';
$oauth_access_token_secret = 'K4tdBlEt6oKXRFsLXmGyCXIGS0geX0elHxl4zhSfKDmDu';

if(isset($_GET['oauth_access_token']) && $_GET['oauth_access_token'] !== '') {
	$oauth_access_token = $_GET['oauth_access_token'];
	$oauth_access_token_secret = $_GET['oauth_access_token_secret'];
}

$consumer_key = '8yCZFk83SRxPI9W4Br7a00GTm';
$consumer_secret = 'uvxtxJbSnbYJLeClhyDzHiPdTEpJMqoxIv8CauvCKD6h1rJqiO';
//$user_id = '78884300';
//$screen_name = 'maxkirkpatrick1';

if(isset($_GET['source_screen_name']))
	$source_screen_name = $_GET['source_screen_name'];
if(isset($_GET['target_screen_name']))
	$target_screen_name = $_GET['target_screen_name'];


//$source_screen_name = isset($_GET['source_screen_name']) ? $_GET['value'] : '';
//$target_screen_name = isset($_GET['target_screen_name']) ? $_GET['value'] : '';


$count = 1;

$twitter_url = 'friendships/show.json';
$twitter_url .= '?source_screen_name=' . $source_screen_name;
$twitter_url .= '&target_screen_name=' . $target_screen_name;

// Create a Twitter Proxy object from our twitter_proxy.php class
@$twitter_proxy = new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret				// 'API secret' on https://apps.twitter.com
);

// Invoke the get method to retrieve results via a cURL request
$users = $twitter_proxy->get($twitter_url);

echo $users;

?>