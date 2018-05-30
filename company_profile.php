<?php

    include ("header.php");
    include ("company_panel.php");
    session_start();

//if not logged in send to login page

    if(!isset($_SESSION['company_username'])){
		header('Location: company_login.php');
		exit();
	}

?>
<div class="container"><hr/></div>
<div class="container content mid-header shadow">
    
    <br/>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Company id</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['company_id'];?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Company Name</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['company_name'];?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Username</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['company_username'];?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Organization</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['company_organization'];?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">E-mail address</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['company_email']; ?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Contact No.</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['company_contact']; ?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Website</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['company_website'];?></div>
    </div>
    <div class="row">
        <div class="col-12" style="text-align:center;">
            <form class="form-horizontal" style="margin-top:10px;" name="frm" method="post" action="company_edit_profile.php" enctype="multipart/form-data">
                <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default">Edit profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br/>
<?php

    include ("footer.php");

?>