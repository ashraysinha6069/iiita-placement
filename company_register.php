<?php

    include ("header.php");
    session_start();
//if company logged in, send to the dashboard page
    if(isset($_SESSION['company_username'])){
        header("Location: company_dashboard.php");
    }
    
        $error ='';
//when submit button is pressed
	if (isset($_REQUEST['submit'])){
        
        //checking first the credentials
        
        $company_name = $_REQUEST['company_name'];
        $company_username = $_REQUEST['company_username'];
        $company_password = $_REQUEST['company_password'];
        $company_email = $_REQUEST['company_email'];
        $company_organization = $_REQUEST['company_organization'];
        $company_contact = $_REQUEST['company_contact'];
        $company_website = $_REQUEST['company_website'];
        //check if fields empty
        if (empty($company_name)){
			$error .= 'please enter company name<br/>';
		}
        if (empty($company_username)){
			$error .= 'please enter company name<br/>';
		}
        if (empty($company_password)){
			$error .= 'please enter company name<br/>';
		}
        if (empty($company_email)){
			$error .= 'please enter company email<br/>';
		}
        if (empty($company_organization)){
			$error .= 'please enter company organization<br/>';
		}
        if (empty($company_contact)){
			$error .= 'please enter contact Number<br/>';
		}
		if ($company_name!=="" and $company_email!=="" and $company_organization!=="" and $company_contact!=="" and $company_username!=="" and $company_password!==""){
            //if fields are fine
            //if user already exists in database, send to profile page
                $connection = mysqli_connect("localhost","root","","iiita-placement");
                $select_query = "SELECT * FROM companies WHERE company_username='$company_username' LIMIT 1";
                $check = mysqli_query($connection , $select_query);
                $data = mysqli_fetch_array($check, MYSQLI_NUM);
                if (mysqli_num_rows($check)==1){
                    $error.= "Account already exists for given email/username";
                }
                else{
                    //if user does not exist in database, send to profile page
                    $query  = "INSERT INTO companies SET
                                        company_id='',
                                        company_name='$company_name',
                                        company_username='$company_username',
                                        company_password='$company_password',
                                        company_organization='$company_organization',
                                        company_website='$company_website',
                                        company_email='$company_email',
                                        company_contact='$company_contact',
                                        company_added_on=NOW(),
                                        company_is_approved='0'";

                    mysqli_query($connection , $query);
                    header ("Location: company_login.php?msg=6069");                    
                }
        }
    }

?>
<div class="container content mid-header">
    <hr/>
        <div style="font-size:20px; margin:30px 30px; font-family: 'Montserrat', sans-serif; color:#dc3545; text-align:center;"><?php echo $error;?></div><br/>
    <span style="font-size:20px; margin:30px 30px; font-family: 'Montserrat', sans-serif;">Register yourself</span>

    <form class="form-horizontal" style="margin-top:30px;" name="frm" method="post" action="company_register.php" enctype="multipart/form-data">
          <div class="form-group" style="margin-top:10px;">
                <label class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Company Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_name" placeholder="Full Name" required="required"/>
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_username" placeholder="username" required="required"/>
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="company_password" placeholder="password" required="required"/>
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Organization</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_organization" placeholder="Organziation" required="required"/>
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Email address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_email" placeholder="E-mail" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Contact</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="company_contact" placeholder="Contact No." required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Website</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Company website" name="company_website"/>
                </div>
          </div>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-default">Submit</button>&nbsp
                  <a href="company_login.php" class="btn btn-success">Already have an account</a>
                </div>
          </div>
    </form>
    <br/>
</div><br/>
<?php
    include("footer.php");
?>