<?php
    include ("header.php");
    include ("student_panel.php");
    session_start();

 //if not logged in send to login page
    if(!isset($_SESSION['access_token'])) {
		header('Location: login.php');
		exit();
	}
    $connection = mysqli_connect("localhost","root","","iiita-placement");

        $student_id = $_SESSION['student_id'];
        $student_roll_no = $_SESSION['student_roll_no'];
        
    if (strpos($_SESSION['student_email'], '2018')) {
        $request =  'year_2018';
    }
    if (strpos($_SESSION['student_email'], '2017')) {
        $request =  'year_2017';
    }
    if (strpos($_SESSION['student_email'], '2016')) {
        $request =  'year_2016';
    }
    if (strpos($_SESSION['student_email'], '2015')) {
        $request =  'year_2015';
    }
    if (strpos($_SESSION['student_email'], '2014')) {
        $request =  'year_2014';
    }
    $batch_query = "SELECT * FROM batch WHERE $request='1'";
    $check_batch = mysqli_query($connection , $batch_query);
?>

<!-- main content starts-->

<div class="container content mid-header">
    <hr/>
    <div class="row" style="padding-top:3%; padding-left:3%; padding-right:3%; padding-bottom:3%;">
        <?php
            while($row = mysqli_fetch_array($check_batch)){
                $job_id = $row['job_id'];
                $select_job = "SELECT * FROM jobs WHERE job_id='$job_id';";
                $check_job = mysqli_query($connection , $select_job);
                $data_job = mysqli_fetch_array($check_job);
        //iterate over all the fields
        #foreach($row_found as $key_found => $val_found){

                $company_name =$data_job['job_company'];
                $company_id =$data_job['job_company_id'];
                $job_location = $data_job['job_location'];
                $job_type = $data_job['job_type'];
                $job_duration = $data_job['job_duration'];
                $job_details = $data_job['job_details'];
                $job_ctc = $data_job['job_ctc'];
                
                $select_relation = "SELECT * FROM relations WHERE job_id='$job_id' AND student_id='$student_id';";
                $check_relation = mysqli_query($connection , $select_relation);
        //generate output
                // company card template starts 
                echo '
                    

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xm-12 grid-thumbnail">
                        <div style="height:30%; margin:auto; text-align:center;">
                            <img src="assets/images/briefcase.png" class="company-logo">
                        </div>
                        <div class="company-name">
                            '.$company_name.'
                        </div>
                        <div class="company-details">
                            <div class="row company-details-row" >
                                <div class="col-4" style="text-align:right;">Location</div>
                                <div class="col-1">:</div>
                                <div class="col-6" style="text-align:left;">'.$job_location.'</div>
                            </div>
                            <div class="row company-details-row" >
                                <div class="col-4" style="text-align:right;">Type</div>
                                <div class="col-1">:</div>
                                <div class="col-6" style="text-align:left;">'.$job_type.'</div>
                            </div>
                            <div class="row company-details-row" >
                                <div class="col-4" style="text-align:right;">CTC</div>
                                <div class="col-1">:</div>
                                <div class="col-6" style="text-align:left; ">'.$job_ctc.'</div>
                            </div>
                            <div class="row company-details-row" >
                                <div class="col-12">
                                    <button class="btn btn-primary enlarge" data-toggle="modal" data-target="#open-modal-'.$job_id.'">Click here to enlarge</button>                        
                                </div>
                            </div>                
                        </div>
                    </div>
                ';
                // company card template ends
                
                //modal template starts
                echo '
                    <div class="modal fade" id="open-modal-'.$job_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <div class="col-4">Location</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6" style="text-align:center; ">'.$job_location.'</div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-4">Job Type</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6" style="text-align:center; ">'.$job_type.'</div>
                                    </div>';
                                    if($job_type == 'Internship'){
                                    echo '<div class="row" >
                                            <div class="col-4">Duration</div>
                                            <div class="col-1">:</div>
                                            <div class="col-6" style="text-align:center; ">'.$job_duration.'</div>
                                        </div>';
                                    }
                                    echo '
                                    <div class="row" >
                                            <div class="col-4">Details</div>
                                            <div class="col-1">:</div>
                                            <div class="col-6" style="text-align:center; ">'.$job_details.'</div>
                                        </div>
                                    <div class="row company-details-row" >
                                        <div class="col-4">CTC</div>
                                        <div class="col-1">:</div>
                                        <div class="col-6" style="text-align:center; ">'.$job_ctc.'</div>
                                    </div>                
                                </div>
                            </div>';
                            if(mysqli_num_rows($check_relation) !== 1){
                            echo '
                            <div style="text-align:center; padding-bottom:5px;">
                                <button type="button" class="btn btn-success" onclick="add_relation(\''.$student_roll_no.'\','.$student_id.','.$job_id.','.$company_id.')">Accept</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Decline</button>
                            </div>';
                            }
                            else{
                            echo '
                            <div style="text-align:center; font-size:20px; padding-bottom:5px;">
                                    Applied Already
                            </div>';
                            }
                                echo '
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

<script>
    function add_relation(roll,student_id,job_id,company_id){
        $.ajax({
            url: 'includes/accept_job.php',
            type: 'POST',
            dataType: 'JSON',
            data: {student_id: student_id,
                  roll: roll,
                  job_id: job_id,
                  company_id: company_id},
            success: function(data){
                location.reload(); 
            },
        });
    }
</script>

<?php
    include ("footer.php");
?>