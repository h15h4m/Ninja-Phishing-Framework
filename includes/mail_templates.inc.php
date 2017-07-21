<div class="content">
    <?php
    
    
    //
    // Edit.
    //
    $edit = @$_GET['edit'];
    
    
    if ($edit != "")
    {
        $template_name = @$_POST['template_name'];
        $template_description = @$_POST['template_description'];
        $template_subject = @$_POST['template_subject'];
        $template_content = mysql_real_escape_string(@$_POST['template_content']);
        
        $validate = @$_POST['validate'];
        
        
        if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h")
        {
            if ($template_name != "" && $template_subject != "" && $template_content != "")
            {
                if (mysql_query("UPDATE mail_templates SET template_name = '$template_name', template_description = '$template_description', template_subject = '$template_subject', template_content = '$template_content' WHERE id = ".$edit))
                {
                    alert_success("Template has been updated successfuly, <a href='index.php?id=4&action=3&show=".$edit."'>show template</a>.");
                }
            } else { alert_danger("You should fill everything."); }
        }
        
        $get_temp = mysql_query("SELECT * FROM mail_templates WHERE id = ".$edit);
        if (mysql_num_rows($get_temp) > 0) {
            while($row = mysql_fetch_array($get_temp)){
    ?>
    <form class="form-horizontal" method="post" action="index.php?id=4&action=3&edit=<?php echo $edit; ?>">
  
    
  <div class="form-group">
      <label for="" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" value="<?php echo $row['template_name']; ?>" class="form-control" id="service" name="template_name" placeholder="Template name" style="width: 15cm;">
          </div>
  </div>
  <div class="form-group">
      <label for="" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <input type="text" value="<?php echo $row['template_description']; ?>" class="form-control" id="service" name="template_description" placeholder="Description" style="width: 15cm;">
    </div>
  </div>
    <br />
  <div class="form-group">
    <label for="" class="col-sm-2 control-label">Subject</label>
    <div class="col-sm-10">
        <input type="text" value="<?php echo $row['template_subject']; ?>" class="form-control" id="description" name="template_subject" placeholder="Message Subject" style="width: 15cm;">
    </div>
  </div>
    
    <div class="form-group">
    <label for="" class="col-sm-2 control-label">Content</label>
    <div class="col-sm-10">
        <textarea spellcheck="false" class="form-control" name="template_content" placeholder="Message Content... HTML is allowed" style="width: 15cm;height:10cm;"><?php echo $row['template_content']; ?></textarea> 
    </div>
  </div>
    <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>
    <?php
            }
        }
    }
    
    //
    // Show.
    //
        
    $show = @$_GET['show'];
        
    if ($show != "")
    {
        $get_template_info = @mysql_query("SELECT * FROM mail_templates WHERE id = ".$show);
        if (mysql_num_rows($get_template_info) > 0) {
            while($row = mysql_fetch_array($get_template_info)){
    ?>
    
    <a class="btn btn-default" href="index.php?id=4&action=3&edit=<?php echo $row['id']; ?>" role="button">Update</a>
    <a class="btn btn-danger" href="index.php?id=4&action=3&delete=<?php echo $row['id']; ?>" role="button">Delete</a>
    <br /><br />
    <label>Subject: </label> <?php echo $row['template_subject']; ?> <br />
    <label>Content: </label> <br />
    <?php   echo $row['template_content']; ?>
    <?php
            }
        }
    }
    
    
    if ($show == "" && $edit == "") {
    ?>
<table class="table table-hover" style="width: 20cm;" align="center">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Description</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        //
        // Delete.
        //
        
        $delete = @$_GET['delete'];
        
        if ($delete != "") {
            if (mysql_query("DELETE FROM mail_templates WHERE id=".$delete)) {
                alert_success("the template has been deleted successfuly.");
            } else { die(mysql_error()); }
        }
        
        
        
        
        //
        // Extracting data from database.
        //
        $get_temp = mysql_query("SELECT * FROM mail_templates");
        if (mysql_num_rows($get_temp) > 0) {
            while($row = mysql_fetch_array($get_temp)){
        ?>
        <tr>
          <th scope="row"></th>
          <td><?php echo $row['template_name']; ?></td>
          <td><?php echo $row['template_description']; ?></td>
          <td><a href="index.php?id=4&action=3&show=<?php echo $row['id']; ?>"><img height="13" width="" src="images/glyphicons-52-eye-open.png" /></a></td>
          <td><a href="index.php?id=4&action=3&edit=<?php echo $row['id']; ?>"><img height="16" width="16" src="images/glyphicons-151-edit.png" /></a></td>
          <td><a href="index.php?id=4&action=3&delete=<?php echo $row['id']; ?>"><img height="12" width="12" src="images/glyphicons-208-remove-2.png" /></a></td>

        </tr>
        <?php
            } // end while
        
        } // end if       
    }
        ?>
      </tbody>
</table>
</div>