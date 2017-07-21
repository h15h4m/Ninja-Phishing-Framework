<div class="content">
    
<?php

$service = @$_POST['service'];
$description = @$_POST['description'];
$url = @$_POST['url'];
$validate = @$_POST['validate'];

if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h")
{
    if ($service != "" && $description != "" && $url != "")
    {
        if (mysql_query("INSERT INTO phishing_pages(service,description,url) VALUES('$service','$description','$url')")) {
            echo "<div align='center' class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> the phishing page link has been added successfuly.</div>";
        } else {
            echo "<div align='center' class=\"alert alert-danger\" role=\"alert\">
                    <strong>Error!</strong>".mysql_error()."</div>";
        }
    } else {
        echo "<div align='center' class=\"alert alert-danger\" role=\"alert\">
                    <strong>Error!</strong> You should fill everything</div>";
    }
}
?>
<form class="form-horizontal" method="post" action="index.php?id=1&action=3">
    
  <div class="form-group">
      <label for="service" class="col-sm-2 control-label">Service</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="service" name="service" placeholder="Service name" style="width: 15cm;">
    </div>
  </div>
    
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description" placeholder="Description" style="width: 15cm;">
    </div>
  </div>
    
    <div class="form-group">
    <label for="URL" class="col-sm-2 control-label">URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="URL" name="url" placeholder="Page URL" style="width: 15cm;"> 
    </div>
  </div>
    <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Add Phishing Page</button>
    </div>
  </div>
</form>
    
    

</div>