<?php
    include ("header.php");
    session_start();

 //if not logged in send to login page
    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query = "SELECT * FROM companies ORDER BY company_id DESC";
    $check = mysqli_query($connection,$select_query);

?>

<!-- main content starts-->

<div class="container content mid-header">
    <div class="row" style="padding-top:3%; padding-left:3%; padding-right:3%; padding-bottom:3%;">
        <?php
            while($data = mysqli_fetch_array($check)){
        //iterate over all the fields
        #foreach($row_found as $key_found => $val_found){

                $company_id  = $data['company_id'];
                $company_name =$data['company_name'];
                $companylogo =$data['company_logo'];
                $job_details = $data['job_details'];
                $ctc = $data['ctc'];
        //generate output
                // company card template starts 
                echo '
                    

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xm-12 grid-thumbnail">
                        <div style="height:30%; margin:auto; text-align:center;">
                            <img src="assets/images/'.$companylogo.'" class="company-logo">
                        </div>
                        <div class="company-name">
                            '.$company_name.'
                        </div>
                        <div class="company-details">
                            <div class="row company-details-row" >
                                <div class="col-4" style="text-align:right;">job details</div>
                                <div class="col-1">:</div>
                                <div class="col-6" style="text-align:left;">'.$job_details.'</div>
                            </div>
                            <div class="row company-details-row" >
                                <div class="col-4" style="text-align:right;">CTC</div>
                                <div class="col-1">:</div>
                                <div class="col-6" style="text-align:center; ">'.$ctc.'</div>
                            </div>
                            <div class="row company-details-row" >
                                <div class="col-12">
                                    <button class="btn btn-primary enlarge" data-toggle="modal" data-target="#open-modal-'.$company_name.'">Click here to enlarge</button>                        
                                </div>
                            </div>                
                        </div>
                    </div>
                ';
                // company card template ends
                
                //modal template starts
                echo '
                    <div class="modal fade" id="open-modal-'.$company_name.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    '.$company_name.'
                                </div>
                                <div class="company-details">
                                    <div class="row" >
                                        <div class="col-4">Job details</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6" style="text-align:left; ">'.$job_details.'</div>
                                    </div>
                                    <div class="row company-details-row" >
                                        <div class="col-4">CTC</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6" style="text-align:center; ">'.$ctc.'</div>
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
                ';
                    
                //modal template stops
            }
        ?>
    </div>
</div>



<br/>


<?php
    include ("footer.php");
?>