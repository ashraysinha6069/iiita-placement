<?php

    include ("header.php");
    session_start();
    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

?>
<a href="logout.php">logout</a>
<?php

    include ("footer.php");

?>