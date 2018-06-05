<?php

    include ("header.php");
    include ("student_panel.php");
    session_start();

    //if user does not exists in database, send to form page
    $email = $_SESSION['student_email'];
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query = "SELECT * FROM students WHERE student_email='$email' LIMIT 1";
    $check = mysqli_query($connection , $select_query);
    if (mysqli_num_rows($check)!=1){
        header("Location: form.php");        
    }

//if not logged in send to login page

    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

    $data = mysqli_fetch_array($check);
    $_SESSION['student_id']=$data['student_id'];
    $_SESSION['student_name']=$data['student_name'];
    $_SESSION['student_contact']=$data['student_contact'];
    $_SESSION['student_roll_no']=$data['student_roll_no'];
    $_SESSION['student_file']=$data['file']; 
    $_SESSION['student_date']=$data['date-of-birth'];
    $_SESSION['student_status']=$data['student_status'];

//if user deactivated send to logout
    if($_SESSION['student_status'] == '1'){
        require_once 'config.php';
        unset($_SESSION['access_token']);
        $gClient->revokeToken();
        session_destroy();
        header('Location: login.php?msg=0');
    }
?>
<div class="container"><hr/><hr/></div>
<div class="container content mid-header shadow">
    
    <br/>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Name</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['student_name'];?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Roll No.</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['student_roll_no'];?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">E-mail address</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['student_email']; ?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Contact</div>
        <div class="col-2" id="col-2" style="text-align:center;">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['student_contact']; ?></div>
    </div>
    <div class="row">
        <div class="col-5" id="col-5" style="text-align:center;">Date of Birth</div>
        <div class="col-2" id="col-2">:</div>
        <div class="col-5" id="col-5"><?php echo $_SESSION['student_date'];?></div>
    </div>
    <div class="row">
        <div class="col-12" style="text-align:center;">
                <div class="form-group">
                    <a href="edit_profile.php" class="btn btn-primary">Edit profile</a>
              </div>
        </div>
    </div>
</div>
<br/>
<?php

    include ("footer.php");

?>