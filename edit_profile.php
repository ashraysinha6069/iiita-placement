<?php

    include("header.php");
    include("student_panel.php");
    session_start();
    $connection = mysqli_connect("localhost","root","","iiita-placement");
//if not logged in send to login page

    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

    if(isset($_REQUEST['submit'])){
        
    //checking first the credentials
        $student_id=$_SESSION['student_id'];
        $name = $_REQUEST['name'];
        $roll = $_REQUEST['roll'];
        $email = $_SESSION['student_email'];
        $number = $_REQUEST['contact'];
        
        if (empty($name)){
			$error .= 'Name field empty<br/>';
		}
        if (empty($number)){
			$error .= 'Contact field empty';
		}
        if(empty($roll)){
            $error .='Roll numver field empty';
        }
        //if all filled
        if($name!=="" and $number!=="" and $roll!==""){
            
            //if user also uploaded resume
            if(is_uploaded_file($_FILES['resume']['tmp_name'])){

                //if error in file
                if ($_FILES["resume"]["error"] > 0) {
                    alert("problem with upload. please submit again");
                }
                
                //if no error
                else{
                    //if extension is OK
                    if( $_FILES["resume"]["type"]==='application/pdf'){
                        
                        //if wrong size
                        if($_FILES["resume"]["size"]/1048576>5){   //Larger than 5 MB is prohibited 
                            echo "File size IS LARGER than 5 MB";
                        }
                        //if size perfect
                        else{
                            
                            //everything is OK
                        //delete old resume
                            $target = "uploads/";
                            $target=$target.$_SESSION['student_file'];
                            unlink($target);
                        //add new resume
                            $filename = $email;
                            $filename=$filename.$_FILES['resume']['name'];
                            $target_file = "uploads/".$filename;
                            
                            if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
                                
                                $_SESSION['student_file']=$filename;
                                $query ="UPDATE students SET
                                                student_roll_no='$roll',
                                                student_name='$name',
                                                student_email='$email',
                                                student_contact='$number',
                                                file='$filename'
                                                WHERE student_id='$student_id'";
                                mysqli_query($connection , $query);
                                
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                            
                        }
                    }
                    //if wrong extension
                    else{
                        echo"Error, Extentions other than pdf are prohibited"."<br>";
                    }
                }
            }
            //if resume not uploaded
            else{
                $query ="UPDATE students SET
                                student_roll_no='$roll',
                                student_name='$name',
                                student_email='$email',
                                student_contact='$number'
                                WHERE student_id='$student_id'";
                mysqli_query($connection , $query);
            }
            //logout user
            header("Location: logout.php");
        }
    }

?>
<div class="container"><hr/></div>
<div class="container content mid-header shadow">
    <span style="font-size:20px; margin:20px 20px; font-family: 'Montserrat', sans-serif;">Edit Profile</span>
    <form class="form-horizontal" style="margin-top:10px;" name="frm" method="post" action="edit_profile.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-5" id="col-5" style="text-align:center;">Name</div>
            <div class="col-2" id="col-2" style="text-align:center;">:</div>
            <div class="col-5" id="col-5"><input type="text" class="form-control" name="name" value="<?php echo $_SESSION['student_name'];?>" placeholder="Full Name" required="required" /></div>
        </div>
        <div class="row">
            <div class="col-5" id="col-5" style="text-align:center;">Roll Number</div>
            <div class="col-2" id="col-2" style="text-align:center;">:</div>
            <div class="col-5" id="col-5"><input type="text" class="form-control" name="roll" value="<?php echo $_SESSION['student_roll_no'];?>" placeholder="Roll no." required="required" /></div>
        </div>
        <div class="row">
            <div class="col-5" id="col-5" style="text-align:center;">Phone Number</div>
            <div class="col-2" id="col-2" style="text-align:center;">:</div>
            <div class="col-5" id="col-5"><input type="number" class="form-control" name="contact" value="<?php echo $_SESSION['student_contact'];?>" placeholder="Roll no." required="required" /></div>
        </div>
        <div class="row">
            <div class="col-5" id="col-5" style="text-align:center;">Date of Birth</div>
            <div class="col-2" id="col-2" style="text-align:center;">:</div>
            <div class="col-5" id="col-5"><input type="date" class="form-control" name="date" value="<?php echo $_SESSION['student_date'];?>" placeholder="Roll no." required="required" /></div>
        </div>
        <div class="row">
            <div class="col-5" id="col-5" style="text-align:center;">Change Resume</div>
            <div class="col-2" id="col-2" style="text-align:center;">:</div>
            <div class="col-5" id="col-5"><button class="btn btn-primary" onclick="callme(event)">Edit</button></div>
        </div>
        <div class="row">
            <div class="col-5" id="col-5" style="text-align:center;"></div>
            <div class="col-2" id="col-2" style="text-align:center;"><input type="file" style="margin:10px auto; display:none;" id="resume" name="resume" class="form-control-file"/></div>
            <div class="col-5" id="col-5"></div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align:center;">
                    <div class="form-group">
                          <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    </div>
            </div>
        </div>
    </form>
</div><br/><br/>
<script type="text/javascript">
    function callme(e){
        e.preventDefault();
        $("#resume").fadeToggle();
    };   
</script>
<?php

    include("footer.php");

?>