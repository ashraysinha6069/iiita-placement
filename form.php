<?php

    include ("header.php");
    
 //if not logged in send to login page
    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}   
    
    //if user already exists in database, send to profile page
    $email = $_SESSION['email'];
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query = "SELECT * FROM students WHERE email='$email' LIMIT 1";
    $check = mysqli_query($connection , $select_query);
    $data = mysqli_fetch_array($check, MYSQLI_NUM);
    if (mysqli_num_rows($check)==1){
        header("Location: profile.php");        
    }
    $error ='';
//when submit button is pressed
	if (isset($_REQUEST['submit'])){
        
        //checking first the credentials
        $name = $_REQUEST['name'];
        $email = $_SESSION['email'];
        $number = $_REQUEST['contact'];
        
        if (empty($name)){
			$error .= 'please enter subject<br/>';
		}
        if (empty($number)){
			$error .= 'please enter contact number';
		}
		if (!empty($name) and !empty($number)){
            
            //resume check
            if ($_FILES["resume"]["error"] > 0) {
                alert("problem with upload. please submit again");
            } 
            else {

                //check extension
                if( $_FILES["resume"]["type"]==='application/pdf'){

                   //check size
                    if($_FILES["resume"]["size"]/1048576>5){   //Larger than 5 MB is prohibited 
                        echo "File size IS LARGER than 5 MB";
                    }
                    else{
                        
                        //if everything correct
				        if ($data[0]>1){
					       echo "entry already exists";
				        }
                        else{
                            $filename = $email;
                            $filename=$filename.$_FILES['resume']['name'];
                            $target_file = "uploads/".$filename;
                            if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
                                
                                $query  = "INSERT INTO students SET
                                                id='',
                                                name='$name',
                                                email='$email',
                                                contact='$number',
                                                file='$filename'";

                                mysqli_query($connection , $query);
                                header ("Location: profile.php");
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                
                        }
                
                    }
                }
                else{

                        echo"Error, Extentions other than pdf are prohibited"."<br>";
                }
           }            
		}
    }
?>

<div class="container">
    <hr/>
    <span style="font-size:20px; margin:20px 20px;" style="font-family: 'Montserrat', sans-serif;">Fill this form first </span>
    <form class="form-horizontal" style="margin-top:10px;" name="frm" method="post" action="form.php" enctype="multipart/form-data">
          <div class="form-group" style="margin-top:10px;">
                <label for="inputName2" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputContact2" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Phone number</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="contact" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputContact2" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Date of Birth</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="date" required="required" />
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
    include ("footer.php");
?>