<div class="content">
    <?php
    require_once dirname(__FILE__)."/../includes/bitly.inc.php";
    
    $original_url = @$_POST['original_url'];
    $validate = @$_POST['validate'];
    $delete = @$_GET['delete'];
    
    // Settings.
    $client_id = '';
    $client_secret = '';
    $user_access_token = '';
    $user_login = '';
    $user_api_key = '';
    
    
    //
    // Delete link
    //
    if ($delete != "") {
            if (mysql_query("DELETE FROM url_shortner_module WHERE id=".$delete)) {
                alert_success("the link has been deleted.");
            } else { die(mysql_error()); }
        }
    
    //
    // New link to shorten.
    //
    if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h" && $original_url != "") {
        $params['access_token'] = $user_access_token;
        $params['longUrl'] = $original_url;
        $params['domain'] = 'j.mp';
        $results = @bitly_get('shorten', $params);
        if (mysql_query("INSERT INTO url_shortner_module(original_url,short_url) VALUES('$original_url','".$results['data']['url']."')"))
        {
            alert_success("The link has been shortened.");
        }
    }
    ?>
    <form class="form-inline" method="post" action="index.php?id=7&action=0">
        <div class="form-group">
            <input type="text" name="original_url" class="form-control" id="original_url" style="width: 15cm;margin-left: 62px;" placeholder="URL to shorten">
        </div>
        <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
        <button type="submit" class="btn btn-default">Shorten</button>
    </form>
    <br />
    <table class="table table-hover" style="width: 30cm;" align="center">
      <thead>
        <tr>
          <th>#</th>
          <th>Original URL</th>
          <th>Shortened URL</th>
          <th></th>
          
          
        </tr>
      </thead>
      <tbody>
        <?php
        //
        // Extracting data from database.
        //
        $links = mysql_query("SELECT * FROM url_shortner_module");
        if (mysql_num_rows($links) > 0) {
            while($row = mysql_fetch_array($links)){
        ?>
        <tr>
            
          <td><?php echo $row['id']; ?></span</td>
          <td><?php echo $row['original_url']; ?></td>
          <td><a href="<?php echo $row['short_url']; ?>"><?php echo $row['short_url']; ?></a></td>
          <td><a href="index.php?id=7&action=0&delete=<?php echo $row['id']; ?>"><img height="12" width="12" src="images/glyphicons-208-remove-2.png" /></a></td>
        </tr>
        <?php
            } // end while
        
        } // end if       
        ?>
      </tbody>
      
</table>
</div>
