<!DOCTYPE html>
<html>
    <head>
        <title>IIITA-placement cell</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">    
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/site.js"></script>
        <link href="css/main.css" rel="stylesheet" type="text/css"> 
        <link href="https://fonts.googleapis.com/css?family=Catamaran:900|Playfair+Display|Montserrat|Montserrat+Alternates|Fjalla+One" rel="stylesheet">
    </head>
    <body>
        <br>
            <div class="container content">
                <div class="row">
                    <div class="col-xs-12 col-md-12 heading" >DEPARTMENT OF TRAINING & PLACEMENT</div>
                </div>
                <div class="row mid-header">
                    <div class="col-md-3 col-xm-3" style="text-align: center;">
                        <img class="iiita-logo" src="assets/images/IIIT_logo_transparent.gif">
                    </div>
                    <div class="col-md-9 col-xm-12 iiita"><a href="https://iiita.ac.in" style="color:black; text-decoration:none;">
                        INDIAN INSTITUTE OF INFORMATION TECHNOLOGY, ALLAHABAD</a>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container content">
                <div class="row mid-header">
                    <div class="col-xs-3 col-md-2 links-a"><a href="profile.php" class="link-a">Profile</a></div>
                    <div class="col-xs-3 col-md-2 links-a"><a href="companies.php" class="link-a">Companies</a></div>
                    <div class="col-xs-6 col-md-8 links-b">
                    <?php
                        error_reporting(0);
                        session_start();
                        if(isset($_SESSION['access_token'])){
                            echo "<a href='logout.php' class='link-b'>Logout</a>";
                        }
                    ?>
                    </div>
                </div>
            </div>

