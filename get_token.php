<?php

require_once('twitter_proxy_post.php');

// Twitter OAuth Config options
$oauth_access_token = '347422573-GmClMaGbZQWlaR6nioWNJTUpjBZEGGBi2zneshA9';
$oauth_access_token_secret = 'K4tdBlEt6oKXRFsLXmGyCXIGS0geX0elHxl4zhSfKDmDu';
$consumer_key = '8yCZFk83SRxPI9W4Br7a00GTm';
$consumer_secret = 'uvxtxJbSnbYJLeClhyDzHiPdTEpJMqoxIv8CauvCKD6h1rJqiO';

$oauth_callback = 'http%3A%2F%2Flocalhost%2Fdashboard%2Ffollowgrid';
// $oauth_callback = 'http%3A%2F%2Fmaxkirkpatrick.com%2Ffollowgrid';


//$source_screen_name = isset($_GET['source_screen_name']) ? $_GET['value'] : '';
//$target_screen_name = isset($_GET['target_screen_name']) ? $_GET['value'] : '';


$count = 1;

$twitter_url = 'oauth/request_token';
$twitter_url .= '?oauth_callback=' . $oauth_callback;

// Create a Twitter Proxy object from our twitter_proxy.php class
@$twitter_proxy_post= new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret				// 'API secret' on https://apps.twitter.com
);

// Invoke the get method to retrieve results via a cURL request
$users = $twitter_proxy_post->get($twitter_url);

echo $users;

?>