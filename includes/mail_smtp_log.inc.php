<div class="content">
<table class="table table-hover" style="" align="center">
      <thead>
        <tr>
          <th>#</th>
          <th>From Email</th>
          <th>From Name</th>
          <th>To Email</th>
          <th>To Name</th>
          <th>Message Subject</th>
          <th>Message Content</th>
          <th>Sent</th>
          <th>Error</th>
        </tr>
      </thead>
      <tbody>
        <?php
        
        //
        // Extracting data from database.
        //
        $smtp_log_data = mysql_query("SELECT * FROM smtp_log");
        if (mysql_num_rows($smtp_log_data) > 0) {
            while($row = mysql_fetch_array($smtp_log_data)){
        ?>
        <tr>
          <th><?php echo $row['id']; ?></th>
          <td><?php echo $row['smtp_from_email']; ?></td>
          <td><?php echo $row['smtp_from_name']; ?></td>
          <td><?php echo $row['smtp_to_email']; ?></td>
          <td><?php echo $row['smtp_to_name']; ?></td>
          <td><?php echo $row['smtp_message_subject']; ?></td>
          <td><?php echo "show" ?></td>
          <td>
              <?php
              if ($row['smtp_sent'] === "Yes"){
                  echo "<span class='label label-success'>".$row['smtp_sent']."</span>";
              } else {
                  echo "<span class='label label-danger'>".$row['smtp_sent']."</span>";
              }
              ?>
          </td>
          <td><?php echo $row['smtp_error']; ?></td>
        </tr>
        <?php
            } // end while
        
        } // end if       
        ?>
      </tbody>
      
</table>
    
</div>