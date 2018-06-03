<?php

    include("header.php");
    
    $error='';
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    if (isset($_REQUEST['login'])){
		
		$admin_username=$_REQUEST['admin_username'];
		$admin_password=$_REQUEST['admin_password'];
		
		if (empty($admin_username)){
			$error .= 'please enter Username<br/>';
		}
		if (empty($admin_password)){
			$error .= 'please enter Password<br/>';
		}
		if (!empty($admin_username) and !empty($admin_password)){
            
				if($admin_username === "admin" && $admin_password === "admin123"){
                    session_start();
                    $_SESSION['admin_token'] = $admin_username;
                    header("Location: admin_profile.php");
                }
                else{
                    $error .= "Invalid credentials";
                }
		}
	
	}

?>
<div class="container company_login_page">
        <span style="font-size:40px; margin:20px 20px; font-family: 'Montserrat', sans-serif;">ADMIN <span style="color:#23495d;">LOG IN</span></span><br/>
        <span style="font-size:20px; margin:30px 30px;  font-family: 'Montserrat', sans-serif; color:#dc3545;"><?php echo $error;?></span>
    <form style="margin-top:10px;" name="frm" method="post" action="admin_login.php" enctype="multipart/form-data">
          <div class="form-group" style="margin-top:10px; text-align:center;">
                <div class="col-sm-10" style="margin:auto;">
                    <input type="text" class="form-control" name="admin_username" placeholder="Username" required="required" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px; text-align:center;">
                <div class="col-sm-10" style="margin:auto;">
                    <input type="password" class="form-control" name="admin_password" placeholder="Password" required="required" />
                </div>
          </div>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" style="margin:auto;">
                  <button type="submit" name="login" class="btn btn-success">Login</button>
                </div>
          </div>
    </form>    
</div>    
<?php
    include("footer.php");
?>