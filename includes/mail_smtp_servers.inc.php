<div class="row">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
        
        $server = @$_GET['server'];
        $delete = @$_GET['delete'];
        
        $smtp_name= @$_POST['smtp_name'];
        $smtp_server= @$_POST['smtp_server'];
        $smtp_port = @$_POST['smtp_port'];
        $smtp_username = @$_POST['smtp_username'];
        $smtp_password = @$_POST['smtp_password'];
        $smtp_auth = @$_POST['smtp_auth'];
        $validate = @$_POST['validate'];
        
        $smtp_auth = ($smtp_auth == 'on') ? 1 : 0;
        
        
        //
        // Delete SMTP server.
        //
        if ($action == 0 && $delete != "")
        {
            if (mysql_query("DELETE FROM smtp_servers WHERE id = ".$delete))
            {
                alert_success("SMTP server has been deleted.");
            } else { alert_danger("problem with deleting server."); }
        }
        
        //
        // Edit SMTP server.
        //
        
        if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h" && $server != "")
        {
            if ($smtp_name != "" && $smtp_server != "" && $smtp_port != "" && $smtp_username != "")
            {
                if (mysql_query("UPDATE smtp_servers SET "
                        . "smtp_name = '$smtp_name', "
                        . "smtp_server = '$smtp_server', "
                        . "smtp_port = '$smtp_port', "
                        . "smtp_username = '$smtp_username', "
                        . "smtp_password = '$smtp_password', "
                        . "smtp_auth = '$smtp_auth' "
                        . "WHERE id = ".$server))
                {
                    alert_success("SMTP server hs been upated.");
                }
                else { alert_danger("there is a problem updating the SMTP server."); }
            } else { alert_danger("you should fill everything."); }
        }
        
        //
        // Add smtp server.
        //
        if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h" && $server == "")
        {
            if ($smtp_name != "" && $smtp_server != "" && $smtp_port != "" && $smtp_username != "")
            {
                if (mysql_query("INSERT INTO smtp_servers("
                        . "smtp_name,"
                        . "smtp_server,"
                        . "smtp_port,"
                        . "smtp_username,"
                        . "smtp_password,"
                        . "smtp_auth) "
                        . "VALUES("
                        . "'$smtp_name',"
                        . "'$smtp_server',"
                        . "'$smtp_port',"
                        . "'$smtp_username',"
                        . "'$smtp_password',"
                        . "'$smtp_auth')")) {
                    alert_success("SMTP server has been added.");
                    
        } else {
            alert_danger("Unable to add SMTP server.");
        }
        } else {
        alert_danger("You should fill everything.");
        }
        }
        
        
        
        if ($server == "") {
        ?>
        <!--
        <a style="margin-left: 64px;" class="btn btn-default" href="ipc.php" role="button">SMTP</a>
        <a style="margin-left: 64px;" class="btn btn-default" href="ipc.php" role="button">Sendmail</a>
        <br /><br />-->
        <h3 class="page-header">New SMTP Server Setup</h3>
        <form action="index.php?id=4&action=0" method="post">
            <div class="form-horizontal">
                <label for="smtp_name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="smtp_name" placeholder="SMTP Server 1" style="width:15cm;"/>
                </div>
            </div>
            <br />
            <br />
            <br />
            <div class="form-horizontal">
                <label for="smtp_server" class="col-sm-2 control-label">SMTP Server</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="smtp_server" placeholder="mail.example.com" style="width:15cm;"/>
                </div>
            </div>
            <br />
            <br />
            <div class="form-horizontal">
                <label for="smtp_port" class="col-sm-2 control-label">SMTP Port</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="smtp_port" placeholder="25, 465 or 587" style="width:15cm;"/>
                </div>
            </div>
            <br /><br />
            <div class="form-horizontal">
                <label for="smtp_username" class="col-sm-2 control-label">SMTP Username</label>
                <div class="col-sm-10">
                    <input class="form-control" autocomplete="false" type="text" name="smtp_username" placeholder="username@example.com" style="width:15cm;"/>
                </div>
            </div>
            <br />
            <br />
            <div class="form-horizontal">
                <label for="smtp_password" class="col-sm-2 control-label">SMTP Password</label>
                <div class="col-sm-10">
                    <input class="form-control" autocomplete="false" type="password" name="smtp_password" placeholder="Password" style="width:15cm;"/>
                </div>
            </div>
            <br /><br />
            <div class="form-horizontal">
                <label for="smtp_auth" class="col-sm-2 control-label">SMTP Authentication</label>
                <div class="col-sm-10 col-sm-10">
                    <div class="checkbox">
                    <label><input name="smtp_auth" type="checkbox"></label>
                    </div>
                </div>
            </div>
            <br />
            <br /><br />
            <div class="form-horizontal">
                
                <div class="col-sm-10">
                    <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
                    <button type="submit" class="btn btn-default">Add Server</button>
                </div>
            </div>
        </form>
    
    <?php
    } // end of if for new server.
    
    else {
        $get_server_data = mysql_query("SELECT * FROM smtp_servers WHERE id=".$server);

        if (mysql_num_rows($get_server_data) > 0) {
            while($row = mysql_fetch_array($get_server_data)){
    ?>
    <h3 class="page-header">Update <?php echo $row['smtp_name']; ?></h3>
    <form action="index.php?id=4&action=0&server=<?php echo $row['id'];?>" method="post">
            <div class="form-horizontal">
                <label for="smtp_name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input value="<?php echo $row['smtp_name']; ?>" class="form-control" type="text" name="smtp_name" placeholder="SMTP Server 1" style="width:15cm;"/>
                </div>
            </div>
            <br />
            <br />
            <br />
            <div class="form-horizontal">
                <label for="smtp_server" class="col-sm-2 control-label">SMTP Server</label>
                <div class="col-sm-10">
                    <input value="<?php echo $row['smtp_server']; ?>" class="form-control" type="text" name="smtp_server" placeholder="mail.example.com" style="width:15cm;"/>
                </div>
            </div>
            <br />
            <br />
            <div class="form-horizontal">
                <label for="smtp_port" class="col-sm-2 control-label">SMTP Port</label>
                <div class="col-sm-10">
                    <input value="<?php echo $row['smtp_port']; ?>" class="form-control" type="text" name="smtp_port" placeholder="25, 465 or 587" style="width:15cm;"/>
                </div>
            </div>
            <br /><br />
            <div class="form-horizontal">
                <label for="smtp_username" class="col-sm-2 control-label">SMTP Username</label>
                <div class="col-sm-10">
                    <input value="<?php echo $row['smtp_username']; ?>"class="form-control" autocomplete="false" type="text" name="smtp_username" placeholder="username@example.com" style="width:15cm;"/>
                </div>
            </div>
            <br />
            <br />
            <div class="form-horizontal">
                <label for="smtp_password" class="col-sm-2 control-label">SMTP Password</label>
                <div class="col-sm-10">
                    <input value="<?php echo $row['smtp_password']; ?>"class="form-control" autocomplete="false" type="password" name="smtp_password" placeholder="Password" style="width:15cm;"/>
                </div>
            </div>
            <br /><br />
            <div class="form-horizontal">
                <label for="smtp_auth" class="col-sm-2 control-label">SMTP Authentication</label>
                <div class="col-sm-10 col-sm-10">
                    <div class="checkbox">
                    <label>
                        <?php
                        if ($row['smtp_auth'] == 1) { echo "<input name='smtp_auth' type='checkbox' checked>"; }
                        else { echo "<input name='smtp_auth' type='checkbox'>"; }
                        ?>
                        
                    </label>
                    </div>
                </div>
            </div>
            <br />
            <br /><br />
            <div class="form-horizontal">
                
                <div class="col-sm-10">
                    <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
                    <button type="submit" class="btn btn-default">Update Server</button>
                    <a class="btn btn-danger" href="index.php?id=4&action=0&delete=<?php echo $row['id']; ?>" role="button">Delete</a>
                    or   <a class="btn btn-default" href="index.php?id=4&action=0" role="button">New Server</a>
                </div>
            </div>
        </form>
    
    <?php }}} ?>
    </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <?php

            $get_servers = @mysql_query("SELECT * FROM smtp_servers");
            if (mysql_num_rows($get_servers) > 0) {
                while($row = mysql_fetch_array($get_servers)){
                 if ($server == $row['id']) {   
            ?>
                 <li class="active"><a href="index.php?id=4&action=0&server=<?php echo $row['id']; ?>"><?php echo $row['smtp_name']; }?></a></li>
            <?php
                if($server != $row['id']) {
            ?>
                  <li><a href="index.php?id=4&action=0&server=<?php echo $row['id']; ?>"><?php echo $row['smtp_name']; ?></a></li>
            <?php
                }
            }}
            ?>
        </ul>
    </div>