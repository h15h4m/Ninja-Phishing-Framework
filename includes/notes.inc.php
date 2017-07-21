<div class="row">
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php
        $edit = @$_GET['edit'];
        $delete = @$_GET['delete'];
        
        $note_name = @$_POST['note_name'];
        $note_content = @$_POST['note_content'];
        $validate = @$_POST['validate'];
        //
        // Edit note.
        //
        if ($edit != "" && $validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h") {
            if (mysql_query("UPDATE notes_module SET note_name = '$note_name', note_content = '$note_content' WHERE id =".$edit)) {
                alert_success("The note has been updated.");
            } else { alert_danger("there is a problem."); }
        }
        ?>
        <!--<h4 class="page-header">Overview</h4>-->
        <form method="post" action="index.php?id=5&action=0&edit=<?php echo $edit; ?>">
            <?php
            $get_notes = @mysql_query("SELECT * FROM notes_module WHERE id = ".$edit." LIMIT 1");
            if (@mysql_num_rows($get_notes) > 0) {
                while($row = mysql_fetch_array($get_notes)){
            ?>
            <input class="form-control" name="note_name" type="text" value="<?php echo $row['note_name']; ?>" /><br />
            <textarea class="form-control" name="note_content" style="height: 10cm;"><?php echo $row['note_content']; ?></textarea>
            <br />
            <div class="form-group">
                <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
                <button type="submit" class="btn btn-default">Update</button>
                <a class="btn btn-danger" href="index.php?id=5&delete=<?php echo $row['id']; ?>" role="button">Delete</a>
                or   <a class="btn btn-default" href="index.php?id=5" role="button">New Note</a>
            </div>
        </form>
            <?php
            }}
            
            //
            // Delete note.
            //
            if ($action == 0 && $delete != "") {
                if (mysql_query("DELETE FROM notes_module WHERE id = ".$delete)) {
                    alert_success("Note has been deleted successfuly.");
                } else {
                    alert_danger("Note has not been deleted for some reason.");
                }
            }
            
            //
            // New note.
            //
            if ($edit == "" || $edit == 0 && $action == 0){
                
            
                if ($validate == "eW91ciBtb3RoZXIncyB2YWdhaW5h"){
                    if ($note_name == ""){
                        alert_danger("Note name is missing!");
                    } else {
                        if (mysql_query("INSERT INTO notes_module(note_name,note_content) VALUES('$note_name','$note_content')")) {
                            alert_success("The new note has been created successfuly.");
                        }
                    }
                }
            ?>
            <h4 class="page-header">New Note</h4>
            <form action="index.php?id=5&action=0" method="post">
                <input class="form-control" type="text" name="note_name" placeholder="Note 1" /><br />
                <textarea class="form-control" style="height: 10cm;" name="note_content" placeholder="Your notes in here..."></textarea>
                <br />
                <input type="hidden" name="validate" value="eW91ciBtb3RoZXIncyB2YWdhaW5h" />
                <input class="form-control" value="Create" type="submit" />
            </form>
            <?php
            } // end main if.
            ?>
    </div></div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
            <?php
            $get_notes = @mysql_query("SELECT * FROM notes_module");
            if (mysql_num_rows($get_notes) > 0) {
                while($row = mysql_fetch_array($get_notes)){
                 if ($edit == $row['id']) {   
            ?>
                 <li class="active"><a href="index.php?id=5&action=0&edit=<?php echo $row['id']; ?>"><?php echo $row['note_name']; }?></a></li>
            <?php
                if($edit != $row['id']) {
            ?>
                  <li><a href="index.php?id=5&action=0&edit=<?php echo $row['id']; ?>"><?php echo $row['note_name']; ?></a></li>
            <?php
                }
            }}
            ?>
        </ul>
 
    </div>
