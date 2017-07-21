<div class="content">
<table class="table table-hover" style="width: 30cm;" align="center">
      <thead>
        <tr>
          <th>IP Address</th>
          <th>User Agent</th>
          <th>HTTP Referer</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $get_phished = mysql_query("SELECT * FROM phishing_module WHERE id = ".$show);
        if (mysql_num_rows($get_phished) > 0) {
            while($row = mysql_fetch_array($get_phished)){
        ?>
        <tr>
          <th scope="row"><?php echo $row['ip_address']; ?></th>
          <td><?php echo $row['user_agent']; ?></td>
          <td><?php echo $row['http_referer']; ?></td>
        </tr>
        <?php
            } // end while
        
        } // end if       
        ?>
      </tbody>
</table>
</div>