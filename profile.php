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
?>
<a href="logout.php">logout</a>
<?php

    include ("footer.php");

?>