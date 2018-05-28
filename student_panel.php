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
