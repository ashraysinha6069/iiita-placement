<?php
    include ("header.php");
    session_start();

 //if not logged in send to login page
    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}

?>
<style type="text/css">div{border: 0.5px solid yellow;}</style>
<hr/>
<div class="container content mid-header">
    <div class="row" style="padding-top:3%; padding-left:3%; padding-right:3%; padding-bottom:3%;">
        <div class="col-lg-4 col-md-6 col-sm-6 col-xm-12 grid-thumbnail">
            <div style="height:30%; margin:auto; text-align:center;">
                <img src="assets/images/amazon.png" class="company-logo">
            </div>
            <div class="company-name">
                Amazon
            </div>
            <div class="company-details">
                <div class="row company-details-row" >
                    <div class="col-4">job details</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:left; ">lorem ipsum sola tidor se sa cxc sds ds getssd</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-4">CTC</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:center; ">15 LPA</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-12">
                        <button class="btn btn-primary enlarge" data-toggle="modal" data-target="#open-modal-1">Click here to enlarge</button>                        
                    </div>
                </div>                
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xm-12 grid-thumbnail">
            <div style="height:30%; margin:auto; text-align:center;">
                <img src="assets/images/adobe.svg" class="company-logo">
            </div>
            <div class="company-name">
                Adobe
            </div>
            <div class="company-details">
                <div class="row company-details-row" >
                    <div class="col-4">job details</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:left; ">lorem ipsum sola tidor se sa cxc sds ds getssd</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-4">CTC</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:center; ">15 LPA</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-12">
                        <button class="btn btn-primary enlarge" data-toggle="modal" data-target="#open-modal-2">Click here to enlarge</button>                        
                    </div>
                </div>                
            </div>
        </div>        
    </div>
</div>
        
<!-- Modal -->
<div class="modal fade" id="open-modal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content dialog-box">
         <div class="modal-header">
            <h5 class="modal-title">Job details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="company-name">
                Amazon
            </div>
            <div class="company-details">
                <div class="row" >
                    <div class="col-4">Job details</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:left; ">lorem ipsum sola tidor se sa cxc sds ds getssd as sas  as sasa sasasas sasa sasasas sas</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-4">CTC</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:center; ">15 LPA</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-12">
                        <button class="btn btn-primary enlarge" data-toggle="modal" data-target="#open-modal">Click here to enlarge</button>                        
                    </div>
                </div>                
            </div>
        </div>
        <div style="text-align:center;">
            <button type="button" class="btn btn-success">Accept</button>
            <button type="button" class="btn btn-danger">Decline</button>
        </div>
    </div>
</div>
</div>
<br/>
                        
<!-- modal ends-->
<!-- Modal -->
<div class="modal fade" id="open-modal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content dialog-box">
         <div class="modal-header">
            <h5 class="modal-title">Job details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="company-name">
                Adobe
            </div>
            <div class="company-details">
                <div class="row" >
                    <div class="col-4">Job details</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:left; ">lorem ipsum sola tidor se sa cxc sds ds getssd as sas  as sasa sasasas sasa sasasas sas</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-4">CTC</div>
                    <div class="col-1">:</div>
                    <div class="col-6" style="text-align:center; ">15 LPA</div>
                </div>
                <div class="row company-details-row" >
                    <div class="col-12">
                        <button class="btn btn-primary enlarge" data-toggle="modal" data-target="#open-modal">Click here to enlarge</button>                        
                    </div>
                </div>                
            </div>
        </div>
        <div style="text-align:center;">
            <button type="button" class="btn btn-success">Accept</button>
            <button type="button" class="btn btn-danger">Decline</button>
        </div>
    </div>
</div>
</div>
<br/>
                        
<!-- modal ends-->

<?php
    include ("footer.php");
?>