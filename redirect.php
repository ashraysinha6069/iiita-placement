<?php

    require_once "config.php";

    // in case session is running we get the session token
    if (isset($_SESSION['access_token'])) {
        $gClient->setAccessToken($_SESSION['access_token']);
    } 
    // else get the code
    else if (isset($_GET['code'])) {
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;
    }
    else {
        header('Location: http://localhost/iiita-placement/login.php');
        exit(); 
    }

    $oAuth = new Google_Service_Oauth2($gClient);
    
    $user = $oAuth->userinfo_v2_me->get();
    $_SESSION['email']=$user['email'];
    $_SESSION['name']=$user['name'];
   
	if (strpos($user->email, 'iiita.ac.in')) {
        header( "Location: profile.php" );   
    } else {
        header( "Location: login.php" );
        unset($_SESSION['access_token']);
        unset($authUrl);
        session_destroy();
    }    
echo "redirect page";

?>