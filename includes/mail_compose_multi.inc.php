<div class="row">
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        
        <?php
        
        require_once dirname(__FILE__).'/phpmailer/PHPMailerAutoload.php';
        
        $server = @$_GET['server'];
        $template = @$_GET['template'];
        
        $smtp_from_email= @$_POST['smtp_from_email'];
        $smtp_from_name= @$_POST['smtp_from_name'];
        $smtp_to_email = @$_POST['smtp_to_email'];
        $smtp_to_name = @$_POST['smtp_to_name'];
        $smtp_message_subject = @$_POST['smtp_message_subject'];
        $smtp_message_content = @$_POST['smtp_message_content'];
        $validate = @$_POST['validate'];

        
        //
        // Send and mother fuckers get fucked.
        //
        if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h" && $server != "")
        {
            $smtp_server_info = mysql_query("SELECT * FROM smtp_servers WHERE id = ".$server." LIMIT 1");
                if (mysql_num_rows($smtp_server_info) > 0)
                {
                    while($row = mysql_fetch_array($smtp_server_info))
                    {
                        // Splitting the mailing list.
                        $all_emails = @split(',',$smtp_to_email);
                        $emails_count = count($all_emails);
                            
                        // sending the message to each email.
                        for ($i = 0; $i < $emails_count; $i++)
                        {
                            $mail = new PHPMailer;
                            $mail->isSMTP();
                            $mail->Host = $row['smtp_server'];
                            $mail->Port = $row['smtp_port'];
                            $mail->SMTPAuth = $row['smtp_auth'];
                            //$mail->SMTPSecure = 'tls';
                            $mail->Username = $row['smtp_username'];
                            $mail->Password = $row['smtp_password'];
                            $mail->setFrom($smtp_from_email, $smtp_from_name);
                            $mail->addAddress($all_emails[$i], "");
                            $mail->Subject = $smtp_message_subject;
                            $mail->msgHTML($smtp_message_content, dirname(__FILE__));
                            $mail->AltBody = 'This is a plain-text message body';
                                
                            if (!$mail->send()) {
                                $error = $mail->ErrorInfo;
                                alert_danger($error);
                                $email_sent = "No";
                            } else {
                                alert_success("Email has been sent to $all_emails[$i].");
                                $error = "N/A";
                                $email_sent = "Yes";
                            }
                            
                            if (mysql_query("INSERT INTO smtp_log("
                            . "smtp_from_email,"
                            . "smtp_from_name,"
                            . "smtp_to_email,"
                            . "smtp_to_name,"
                            . "smtp_message_subject,"
                            . "smtp_sent,"
                            . "smtp_error,"
                            . "smtp_message_content) "
                            . "VALUES("
                            . "'$smtp_from_email',"
                            . "'$smtp_from_name',"
                            . "'$all_emails[$i]',"
                            . "'$smtp_to_name',"
                            . "'$smtp_message_subject',"
                            . "'$email_sent',"
                            . "'$error',"
                            . "'$smtp_message_content')"))
                            {
                                // done
                            } else { alert_danger("Unable to insert data to database.");  }
                            
                            flush();
                            ob_flush();
                            sleep(1);
                                
                        }
                            
                    }
                }
        }
        
        if ($server != "") {
        ?>
        <div style="margin-left: 5cm;">
            <a class='btn btn-default' href='index.php?id=4&action=1&server=<?php echo $server;?>' role='button'>Single Target</a>
            <a class='btn btn-default active' href='index.php?id=4&action=2&server=<?php echo $server;?>' role='button'>Multiple Targets</a>
            <span class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Templates
                <span class="caret"></span>
                </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php
                $get_templates = @mysql_query("SELECT * FROM mail_templates");
                if (@mysql_num_rows($get_templates) > 0) {
                    while($row = mysql_fetch_array($get_templates)){
                        echo "<li><a href='index.php?id=4&action=2&server=$server&template=".$row['id']."'>".$row['template_name']."</a></li>";
                    }
                }
                ?>
                
            </ul>
            </span>
        </div>
       <br />
        <form action="index.php?id=4&action=2&server=<?php echo $server; ?>" method="post">
            <div class="form-horizontal">
                <label for="" class="col-sm-2 control-label">From</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="smtp_from_email" placeholder="attacker@example.com" style="width:15cm;"/>
                </div>
            </div>
            <br />
            <br />
            <div class="form-horizontal">
                <label for="" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="smtp_from_name" placeholder="Attacker's name" style="width:15cm;"/>
                </div>
            </div>

            <br /><br /><br />
            <div class="form-horizontal">
                <label for="" class="col-sm-2 control-label">To</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="smtp_to_email" placeholder="victim1@example.com,victim2@example.com,..." style="width:15cm;"></textarea>
                </div>
            </div>
            <br />
            <br />
            <br /><br /><br />
            <?php
            if ($template != "") {
                $get_templates = @mysql_query("SELECT * FROM mail_templates WHERE id = ".$template." LIMIT 1");
                    if (mysql_num_rows($get_templates) > 0) {
                        while($row = mysql_fetch_array($get_templates)){
            ?>
            <div class="form-horizontal">
                <label for="" class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-10">
                    <input class="form-control" value="<?php echo $row['template_subject']; ?>" autocomplete="false" type="text" name="smtp_message_subject" placeholder="Knock Knock" style="width:15cm;"/>
                </div>
            </div>
            <br /><br />
            <div class="form-horizontal">
                <label for="" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-10 col-sm-10">
                    <div class="checkbox">
                        <textarea name="smtp_message_content" placeholder="Your message in here..." class="form-control" style="width: 15cm; height: 5cm;"><?php echo $row['template_content']; ?></textarea>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            }
            
            if ($template == "")
            {
            ?>
            <div class="form-horizontal">
                <label for="" class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-10">
                    <input class="form-control" autocomplete="false" type="text" name="smtp_message_subject" placeholder="Knock Knock" style="width:15cm;"/>
                </div>
            </div>
            <br /><br />
            <div class="form-horizontal">
                <label for="" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-10 col-sm-10">
                    <div class="checkbox">
                        <textarea name="smtp_message_content" placeholder="Your message in here..." class="form-control" style="width: 15cm; height: 5cm;"></textarea>
                    </div>
                </div>
            </div>
            <?php }?>
            <br />
            <br /><br />
            <div class="form-horizontal">
                
                <div class="col-sm-10">
                    <label for="" class="col-sm-2 control-label"></label><br />
                    <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
                    <button type="submit" class="btn btn-default">Send</button>
                </div>
            </div>
        </form>
    
    <?php
    } // end of if for new server.
    ?>
 
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
                 <li class="active"><a href="index.php?id=4&action=2&server=<?php echo $row['id']; ?>"><?php echo $row['smtp_name']; }?></a></li>
            <?php
                if($server != $row['id']) {
            ?>
                  <li><a href="index.php?id=4&action=2&server=<?php echo $row['id']; ?>"><?php echo $row['smtp_name']; ?></a></li>
            <?php
                }
            }}
            ?>
        </ul>
    </div>