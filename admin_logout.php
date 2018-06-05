<?php
    unset($_SESSION['admin_token']);
    session_destroy();
    header('Location: admin_login.php');
?>