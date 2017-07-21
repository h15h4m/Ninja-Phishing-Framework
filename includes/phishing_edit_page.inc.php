<div class="content">
    
<?php

$edit = @$_GET['edit'];

$page_file_name = @$_POST['filename'];
$page_service = @$_POST['service'];
$page_description = @$_POST['description'];
$page_source_code = @$_POST['sourcecode'];
$validate = @$_POST['validate'];
//echo $page_file_name;
if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h")
{
    if ($page_service != "" && $page_description != "" && $page_source_code != "")
    {
        if (mysql_query("UPDATE phishing_pages SET service = '$page_service', description = '$page_description' WHERE id = ".$edit)) {
            
            $handle = fopen(dirname(__FILE__)."/../pages/".$page_file_name, 'w')
                    or die("Unable to create the file.");
            if ($handle) {
                fwrite($handle, $page_source_code);
                fclose($handle);
            }
            
            echo "<div align='center' class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> the phishing page has been updated successfuly.</div>";
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
<form class="form-horizontal" method="post" action="index.php?id=1&action=5&edit=<?php echo $edit; ?>">
  
<?php

$phishing_page_edit = mysql_query("SELECT * FROM phishing_pages WHERE id=".$edit);

if (mysql_num_rows($phishing_page_edit) > 0) {
            while($row = mysql_fetch_array($phishing_page_edit)){
               echo "<input type='hidden' name='filename' value='".$row['filename']."' />";
?> 
  <div class="form-group">
      <label for="filename_disabled" class="col-sm-2 control-label">File name</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="filename_disabled" name="filename_disabled" value="<?php echo $row['filename']; ?>" placeholder="PageName.html or similar" style="width: 15cm;" disabled>
          </div>
  </div>
  <div class="form-group">
      <label for="service" class="col-sm-2 control-label">Service</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="service" name="service" value="<?php echo $row['service']; ?>" placeholder="Service name" style="width: 15cm;">
    </div>
  </div>
    
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']; ?>"placeholder="Description" style="width: 15cm;">
    </div>
  </div>
    
    <div class="form-group">
    <label for="URL" class="col-sm-2 control-label">Source Code</label>
    <div class="col-sm-10">
        <code><textarea spellcheck="false" class="form-control" name="sourcecode" placeholder="Place your source code here" style="width: 15cm;height:10cm;"><?php
        //
        // PHP START HERE
        //
        
        $file_content = @readfile(dirname(__FILE__)."/../pages/".$row['filename']) or die("File not found!");
        
        ?></textarea></code>
    </div>
  </div>
    <?php
    // end of loop and if
    }}
    ?>
    <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Edit Phishing Page</button>
    </div>
  </div>
</form>
    
    

</div>