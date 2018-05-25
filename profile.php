<?php

    include ("header.php");
    session_start();

    //if user does not exists in database, send to form page
    $email = $_SESSION['email'];
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query = "SELECT * FROM students WHERE email='$email' LIMIT 1";
    $check = mysqli_query($connection , $select_query);
    if (mysqli_num_rows($check)!=1){
        header("Location: form.php");        
    }

    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
    $data = mysqli_fetch_array($check);
    $_SESSION['contact']=$data['contact'];
    $_SESSION['file']=$data['file']; 
    $_SESSION['date']=$data['date-of-birth'];
    $_SESSION['file']=$data['file'];
?>
<hr/>
<div class="container content">    
    <br/>
    <div class="row">
        <div class="col-5" style="text-align:center;">Name</div>
        <div class="col-2" style="text-align:center;">:</div>
        <div class="col-5"><?php echo $_SESSION['name'];?></div>
    </div>
    <div class="row">
        <div class="col-5" style="text-align:center;">E-mail address</div>
        <div class="col-2" style="text-align:center;">:</div>
        <div class="col-5"><?php echo $_SESSION['email']; ?></div>
    </div>
    <div class="row">
        <div class="col-5" style="text-align:center;">Contact</div>
        <div class="col-2" style="text-align:center;">:</div>
        <div class="col-5"><?php echo $_SESSION['contact']; ?></div>
    </div>
    <div class="row">
        <div class="col-5" style="text-align:center;">Date of Birth</div>
        <div class="col-2">:</div>
        <div class="col-5"><?php echo $_SESSION['date'];?></div>
    </div>
    <div class="row">
        <div class="col-12" style="text-align:center;">
            <form class="form-horizontal" style="margin-top:10px;" name="frm" method="post" action="modify.php" enctype="multipart/form-data">
                <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-default">Fill form again</button>
              </div>
            </form>
        </div>
    </div>
</div>
<?php

    include ("footer.php");

?>