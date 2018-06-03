<?php
    require_once 'config.php';
    unset($_SESSION['admin_token']);
    $gClient->revokeToken();
    session_destroy();
    header('Location: admin_login.php');
?>