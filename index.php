<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Ninja Phishing Framework</title>

    <!-- Bootstrap core CSS -->
    <link href="includes/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="includes/style.inc.css" rel="stylesheet">
    <link href="includes/notes.inc.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
   

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Ninja Phishing Framework</a>
        </div>
          
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="index.php?id=0">Statistics</a></li>
            
            
            
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Phishing<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?id=1&action=1">Phishing Pages</a></li>
                <li><a href="index.php?id=1&action=2">Tabnabbing Pages</a></li>
                <li><a href="index.php?id=1&action=0">Phishing Reports</a></li>
                <li role="separator" class="divider"></li>
                <!--<li class="dropdown-header"></li>-->
                <li><a href="index.php?id=1&action=3">Add a Phishing Link</a></li>
                <li><a href="index.php?id=1&action=4">Add a Phishing Page</a></li>
              </ul>
            </li>
            
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mail<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?id=4&action=1">Single Target</a></li>
                <li><a href="index.php?id=4&action=2">Multiple Targets</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="index.php?id=4&action=0">SMTP Servers</a></li>
                <li><a href="index.php?id=4&action=4">SMTP Logs</a></li>
                <li><a href="index.php?id=4&action=3">Email Templates</a></li>
              </ul>
            </li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exploits<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?id=2&action=0">Exploits Links</a></li>
                <li><a href="index.php?id=2&action=1">Add an Exploit Link</a></li>
              </ul>
            </li>
            
            <!--<li><a href="index.php?id=3&action=0">XSS</a></li>-->
            
            <li><a href="index.php?id=5&action=0">Notes</a></li>
            <li><a href="index.php?id=6&action=0">Capturer</a></li>
            <li><a href="index.php?id=7&action=0">URL Shortner</a></li>
            <li><a href="index.php?id=8&action=0">Settings</a></li>
            <li><a href="index.php?id=100&action=0">Sign out</a></li>
          </ul>
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container-fluid">
        <?php
        
        include_once dirname(__FILE__)."/includes/functions.inc.php";
        
        //
        // GET variables to control what to show.
        //
        $id = @$_GET['id'];
        $action = @$_GET['action'];
        $show = @$_GET['show'];
        
        // connect to mysql database.
        require_once dirname(__FILE__)."/includes/mysql_connect.inc.php";
        
        
        //
        // Routing && Mapping
        //
        if ($id == 0 && $action == NULL) {
            include_once dirname(__FILE__)."/includes/home.inc.php";
        } else if ($id == 1 && $action == 0) {
            include_once dirname(__FILE__)."/includes/phishing_reports.inc.php";
        } else if ($id == 1 && $action == 1) {
            include_once dirname(__FILE__)."/includes/phishing_pages.inc.php";
        } else if ($id == 1 && $action == 2) {
            include_once dirname(__FILE__)."/includes/phishing_tabnabbing_pages.inc.php";
        } else if ($id == 1 && $action == 3) {
            include_once dirname(__FILE__)."/includes/phishing_add_link.inc.php";
        } else if ($id == 1 && $action == 4) {
            include_once dirname(__FILE__)."/includes/phishing_add_page.inc.php";
        } else if ($id == 1 && $action == 5) {
            include_once dirname(__FILE__)."/includes/phishing_edit_page.inc.php";
        } else if ($id == 1 && $action == 6) {
            include_once dirname(__FILE__)."/includes/phishing_reports_show.inc.php";
        }  else if ($id == 2 && $action == 0) {
            include_once dirname(__FILE__)."/includes/exploits_links.inc.php";
        } else if ($id == 2 && $action == 1) {
            include_once dirname(__FILE__)."/includes/exploits_add_link.inc.php";
        } else if ($id == 4 & $action == 0) {
            include_once dirname(__FILE__)."/includes/mail_smtp_servers.inc.php";
        } else if ($id == 4 & $action == 1) {
            include_once dirname(__FILE__)."/includes/mail_compose_single.inc.php";
        } else if ($id == 4 & $action == 2) {
            include_once dirname(__FILE__)."/includes/mail_compose_multi.inc.php";
        } else if ($id == 4 & $action == 3) {
            include_once dirname(__FILE__)."/includes/mail_templates.inc.php";
        } else if ($id == 4 & $action == 4) {
            include_once dirname(__FILE__)."/includes/mail_smtp_log.inc.php";
        } else if ($id == 5) {
            include_once dirname(__FILE__)."/includes/notes.inc.php";
        } else if ($id == 6 && $action == 0) {
            include_once dirname(__FILE__)."/includes/ip_capturer.inc.php";
        } else if ($id == 7 && $action == 0) {
            include_once dirname(__FILE__)."/includes/url_shortner.inc.php";
        } else if ($id == 8 && $action == 0) {
            include_once dirname(__FILE__)."/includes/settings.inc.php";
        }
        
        ?>
      <hr/>
      <footer>
          <p>&copy; <a href="http://twitter.com/GreyZer0">Hisham Alshaikh</a> 2015 | This application is for educational purposes only. You're responsible for all of your actions.</p>
      </footer>
    </div><!-- /.container -->

    <?php mysql_close($mysql_connect); ?>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="includes/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="includes/bootstrap/js/ie10-viewport-bug-workaround.js"></script> -->
                        
  </body>
</html>
