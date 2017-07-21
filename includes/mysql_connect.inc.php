<?php

require_once dirname(__FILE__)."/config.inc.php";

$mysql_connect = @mysql_connect($config_mysql_hostname,$config_mysql_username,$config_mysql_password);

if ($mysql_connect) {
    //echo "MySQL Connecting Successful<br>";
} else {
    //echo mysql_error();
    die("SEN CANT CONNECT TO THE MYSQL SERVER"."<br />");
}

if (mysql_select_db($config_mysql_database,$mysql_connect)) {
    //echo "Successfully Connected To $mysql_database Database<br>";
} else {
    echo mysql_error();
    die("SEN CANT SELECT THE DATABASE"."<br />");
}
 
?>