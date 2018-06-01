<?php 

    include ("header.php");
    session_start();
//if company logged in, send to the dashboard page
    if(isset($_SESSION['company_username'])){
        header("Location: company_dashboard.php");
    }

    $error='';
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    if (isset($_REQUEST['login'])){
		
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		
		if (empty($username)){
			$error .= 'please enter Username<br/>';
		}
		if (empty($password)){
			$error .= 'please enter Password<br/>';
		}
		if (!empty($username) and !empty($password)){
				$select_query = "SELECT * FROM companies WHERE company_username='%s' and company_password='%s';";
                $out_query = sprintf($select_query, mysqli_real_escape_string($connection, $username), mysqli_real_escape_string($connection, $password));
				$check = mysqli_query($connection , $out_query);
				if (mysqli_num_rows($check)==0){
					$error .= 'Invalid username/password';
				}
				else{
						$data= mysqli_fetch_array($check);
                        session_start();
                        $_SESSION['company_username']=$data['company_username'];
                        $_SESSION['company_name']=$data['company_name'];
                        $_SESSION['company_email']=$data['company_email'];
                        $_SESSION['company_id']=$data['company_id'];
                        $_SESSION['company_organization']=$data['company_organization'];
                        $_SESSION['company_contact']=$data['company_contact'];
                        $_SESSION['company_website']=$data['company_website'];
                        $_SESSION['company_added_on']=$data['company_added_on'];
                        $_SESSION['company_is_approved']=$data['company_is_approved'];
						header("Location: company_dashboard.php");
				}
		}
	
	}

?>
    <div class="container company_login_page">
        <span style="font-size:40px; margin:20px 20px; font-family: 'Montserrat', sans-serif;">LOG <span style="color:#23495d;">IN</span></span><br/>
        <span style="font-size:20px; margin:30px 30px; font-family: 'Montserrat', sans-serif; color:#dc3545;"><?php echo $error;?></span>
    <form style="margin-top:10px;" name="frm" method="post" action="company_login.php" enctype="multipart/form-data">
          <div class="form-group" style="margin-top:10px; text-align:center;">
                <div class="col-sm-10" style="margin:auto;">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px; text-align:center;">
                <div class="col-sm-10" style="margin:auto;">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required" />
                </div>
          </div>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" style="margin:auto;">
                  <button type="submit" name="login" class="btn btn-success">Login</button>
                </div>
          </div>
    </form>
    <div class="col-sm-offset-2 col-sm-10" style="margin:auto; font-family: 'Montserrat', sans-serif; color:white;">
                  <a class="btn btn-danger" href="company_register.php" >Register Here</a>
    </div>    
    </div>    
<?php
    include("footer.php");
?>