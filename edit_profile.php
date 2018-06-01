<?php

    include("header.php");
    include("student_panel.php");
//if not logged in send to login page

    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

?>
<div class="container content mid-header">
    <hr/>
    <span style="font-size:20px; margin:20px 20px; font-family: 'Montserrat', sans-serif;">Edit Profile</span>
    <form class="form-horizontal" style="margin-top:10px;" name="frm" method="post" action="edit_profile.php" enctype="multipart/form-data">
          <div class="form-group" style="margin-top:10px;">
                <label for="inputName2" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;"></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['student_name'];?>" placeholder="Full Name" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputroll2" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Roll Number</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $_SESSION['student_roll_no'];?>" name="roll" placeholder="Roll No." required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputContact2" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Phone number</label>
                <div class="col-sm-10">
                    <input type="number" value="<?php echo $_SESSION['student_contact'];?>" class="form-control" name="contact" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputContact2" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Date of Birth</label>
                <div class="col-sm-10">
                    <input type="date" value="<?php echo $_SESSION['student_date'];?>" class="form-control" name="date" required="required" />
                </div>
          </div>        
          <div class="form-group" style="margin-top:10px;">
                <label for="file" style="font-family: 'Montserrat', sans-serif;" class="col-sm-4 control-label">Upload your resume</label>
                <input type="file" id="resume" name="resume" class="form-control-file" required="required" />
          </div>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </div>
          </div>
    </form>
</div>
<?php

    include("footer.php");

?>