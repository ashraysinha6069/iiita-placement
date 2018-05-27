<?php
    session_start();

//google api credentials

    require_once "libraries/GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("574465626280-llabrld1qk4u531v339vt8jr6chv4ej3.apps.googleusercontent.com");
    $gClient->setClientSecret("qb6jmRHANRfXyOXqKApgFyST");
    $gClient->setApplicationName("iiita-placement");
    $gClient->setRedirectUri("http://localhost/iiita-placement/redirect.php");
    $gClient->setScopes(array("https://www.googleapis.com/auth/plus.login", "https://www.googleapis.com/auth/userinfo.email", 'https://www.googleapis.com/auth/userinfo.profile'));



?>
