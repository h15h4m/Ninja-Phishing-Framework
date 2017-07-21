<?php


//
// Detect IP address method 1.
//
function detect_ip_address_1() {
    //global $ip;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//
// Detect IP address method 2.
//
function detect_ip_address_2() { 

    if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "Unknown")){
        $ip_address = $_SERVER['REMOTE_ADDR']; 
    }

    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "Unknown")) {
        $ip_address = getenv("REMOTE_ADDR");
    }

    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "Unknown")) {
        $ip_address = getenv("HTTP_X_FORWARDED_FOR"); 
    }
   
    else if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "Unknown")) {
        $ip_address = getenv("HTTP_CLIENT_IP");
    }

    else {
        $ip_address = "Unknown";
    }
        
    return($ip_address); 
} 

//
// Get page full url.
//
function get_current_url($path) {
    $path_parts = pathinfo("http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
    $site_name = $path_parts['dirname'];
    $site_name = str_replace("admin","", $site_name);
    $full_site_name = $site_name.$path;
    return $full_site_name;
}


//
// Success Alert
//
function alert_success($content) {
    echo "<div align='center' class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> $content</div>";
}

//
// Danger Alert
//
function alert_danger($content) {
    echo "<div align='center' class=\"alert alert-danger\" role=\"alert\">
                                <strong>Error!</strong> $content</div>";
}
?>
