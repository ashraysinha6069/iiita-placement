<?php
    
    session_start();
 //if logged in send to login page
    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	} 

    //if user does not exists in database, send to form page
    $email = $_SESSION['email'];
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $check = mysqli_query($connection , $select_query);
    if (mysqli_num_rows($check)!=1){
        header("Location: profile.php");        
    }

    if(isset($_REQUEST['submit'])){
        $target = "uploads/";
        $target=$target.$_SESSION['file'];
        $delete_query = "DELETE FROM students WHERE email='$email'";
        mysqli_query($connection,$delete_query);
        unlink($target);
        header("Location: profile.php");
    }
    else{
        header("Location: login.php");
    }
?>