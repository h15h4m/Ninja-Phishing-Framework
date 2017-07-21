<?php
require_once('includes/bitly.inc.php');
$client_id = '2f4b1eb5beb9b615ac70b16e34daf4bc6b899112';
$client_secret = '149e58cfb3f5d508386822be40afc8ce75ca1c26';
$user_access_token = 'c041ec00cdfa5cefe8bda46afaa996bb038527a4';
$user_login = 'greyzer0';
$user_api_key = 'bfb71a18779eaa3e6fe3618d44f8c9e5e150aa9d';

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