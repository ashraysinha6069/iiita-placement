<?php

    include ("header.php");

    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $error ='';

//when submit button is pressed
	if (isset($_REQUEST['submit'])){
        
        //checking first the credentials
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $number = $_REQUEST['contact'];
        
        if (empty($name)){
			$error .= 'please enter subject<br/>';
		}
		if (empty($email)){
			$error .= 'please enter email';
		}
        if (empty($number)){
			$error .= 'please enter contact number';
		}
		if (!empty($name) and !empty($email) and !empty($number)){
            
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
                        $select_query = "SELECT * FROM students WHERE email='$email'";
				        $check = mysqli_query($connection , $select_query);
                        $data = mysqli_fetch_array($check, MYSQLI_NUM);
				        if ($data[0]>1){
					       echo "entry already exists";
				        }
                        else{
                            $filename = $_FILES['resume']['name'];
                            $filename = $filename.$name;
                            $target_file = "uploads/".$filename;
                            if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
                                
                                $query  = "INSERT INTO students SET
                                                id='',
                                                name='$name',
                                                email='$email',
                                                contact='$number',
                                                file='$filename'";

                                mysqli_query($connection , $query);
                                
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

<div class="container content">
    <hr/>
    <span style="font-size:20px; margin:20px 20px;">Enter your details</span>
    <form class="form-horizontal" style="margin-top:10px;" name="frm" method="post" action="form.php" enctype="multipart/form-data">
          <div class="form-group" style="margin-top:10px;">
                <label for="inputName2" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputEmail2" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="inputContact2" class="col-sm-2 control-label">Phone number</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="contact" maxlength="10" size="10" required="required"  />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="file">Upload your resume</label>
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