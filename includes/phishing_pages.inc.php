<div class="content">
<table class="table table-hover" style="width: 30cm;" align="center">
      <thead>
        <tr>
          <!--<th>#</th>-->
          <th>Service</th>
          <th>Description</th>
          <th>URL</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        //
        // Deleting the selected page.
        //
        
        $delete = @$_GET['delete'];
        
        if ($delete != "") {
            if (mysql_query("DELETE FROM phishing_pages WHERE id=".$delete)) {
                echo "<div align='center' class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> the phishing page has been deleted successfuly.</div>";
            } else { die(mysql_error()); }
        }
        
        //
        // Extracting data from database.
        //
        $phishing_pages = mysql_query("SELECT * FROM phishing_pages");
        if (mysql_num_rows($phishing_pages) > 0) {
            while($row = mysql_fetch_array($phishing_pages)){
        ?>
        <tr>
          <td><span class="label label-default"><?php echo $row['service']; ?></span></td>
          <td><?php echo $row['description']; ?></td>
          <td><a target="_blank" href="<?php echo $row['url']; ?>"><?php echo $row['url']; ?></a></td>
          <td><a href="index.php?id=1&action=5&edit=<?php echo $row['id']; ?>"><img height="16" width="16" src="images/glyphicons-151-edit.png" /></a></td>
          <td><a href="index.php?id=1&action=1&delete=<?php echo $row['id']; ?>"><img height="12" width="12" src="images/glyphicons-208-remove-2.png" /></a></td>
        </tr>
        <?php
            } // end while
        
        } // end if       
        ?>
      </tbody>
      
</table>
    
</div>