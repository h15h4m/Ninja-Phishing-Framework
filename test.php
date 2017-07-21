<?php
require_once('includes/bitly.inc.php');
$client_id = '';
$client_secret = '';
$user_access_token = '';
$user_login = '';
$user_api_key = '';

$params['access_token'] = $user_access_token;
$params['longUrl'] = 'http://google.com';
$params['domain'] = 'j.mp';
$results = bitly_get('shorten', $params);
var_dump($results);


$params = array();
$params['access_token'] = $user_access_token;
$params['link'] = 'http://j.mp/O2eT';
$results = bitly_get('link/clicks', $params);
var_dump($results);
?>
