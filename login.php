<?php
    
    require_once "config.php";
    include ("header.php");
    if(isset($_SESSION['access_token'])) {
        header('Location: profile.php');
        exit();
    }
    $loginurl = $gClient->createAuthUrl();
?>
<div class="container">
<hr/>
</div>
<div class="container content">
    <div class="row mid-header">
        <div class="col-md-12 col-xm-12 middle">
            SIGN UP WITH YOUR IIITA ACCOUNT
        </div>
        <div class="col-md-12 col-xm-6 middle">
            <a href="<?php echo $loginurl ?>"><img src="https://developers.google.com/+/images/branding/sign-in-buttons/Red-signin_Google_base_44dp.png" style="height:60%; "></a>            
        </div>

    </div>
</div>


<?php
    include ("footer.php");
?>
