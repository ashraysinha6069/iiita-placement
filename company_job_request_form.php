<?php
    include ("header.php");
    include ("company_panel.php");

//check if button pressed
    if(isset($_REQUEST['submit'])){
        $job_location = $_REQUEST['job_location'];
        $job_type = $_REQUEST['job_type'];
        $job_duration = $_REQUEST['job_duration'];
        $job_ctc = $_REQUEST['job_ctc'];
        $job_details = $_REQUEST['job_details'];
        
        $connection = mysqli_connect("localhost","root","","iiita-placement");
        $insert_query  = "INSERT INTO jobs SET
                                job_id='',
                                job_company='',
                                job_company_id='',
                                job_location='$job_location',
                                job_type='$job_type',
                                job_duration='$job_duration',
                                job_ctc='$job_ctc',
                                job_details='$job_details'";
        
        mysqli_query($connection , $insert_query);
    }
?>
<div class="container"><hr/></div>
<div class="container content mid-header">
    <span style="font-size:25px; margin:20px 20px;" style="font-family: 'Montserrat', sans-serif;">Make Job Request </span>
    <form class="form-horizontal" style="margin-top:10px;" name="frm" method="post" action="company_profile.php" enctype="multipart/form-data">
          <div class="form-group" style="margin-top:10px;">
                <label for="job_location" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Job Location</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="job_location" name="job_location" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="job_type" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Type of Job</label>
                <div class="col-sm-10">
                    <select class="form-control" id="job_type" name="job_type" onchange="yesnoCheck(this);">
                      <option value="Full-Time">Full-Time</option>
                      <option value="Internship">Internship</option>
                    </select> 
                </div>
          </div>
          <div class="form-group" style="margin-top:10px; display:none; transition:display 1s" id="duration_div">
                <label for="job_duration" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Duration of Job</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="job_duration" name="job_duration"/>
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="job_ctc" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">CTC (in LPA)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="job_ctc" name="job_ctc" />
                </div>
          </div>
          <div class="form-group" style="margin-top:10px;">
                <label for="job_details" class="col-sm-4 control-label" style="font-family: 'Montserrat', sans-serif;">Job Details</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="job_details" name="job_details"></textarea>
                </div>
          </div>
<script>
    function yesnoCheck(that) {
        if (that.value == "Internship") {
            document.getElementById("duration_div").style.display = "block";
        } else {
            document.getElementById("duration_div").style.display = "none";
        }
    }
</script>
          <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </div>
          </div>
    </form>
</div>

<?php
        include("footer.php");
?>