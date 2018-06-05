<?php

    include("header.php");
    include("admin_panel.php");
    session_start();

    //if user not logged in
    if(!isset($_SESSION['admin_token'])){
        header("location: admin_login.php");
    }

    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query_listed = "SELECT * FROM students WHERE student_status='1';";
    $check_listed = mysqli_query($connection , $select_query_listed);

    if(isset($_REQUEST['submit'])){
        
    }
?>
<div class="container"><hr/></div>
<!-- middle content -->
<div class="container">
  <div class="row">

      <div class="col-sm-8" > <!-- start of jobs div -->
          <div class="mdb-company thumbnail">
                <div class="middle">Jobs</div>
                <div class="container"><hr/></div>  
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group-option" >
                                    <div class="mid-header">Show</div>
                                    <select class="form-control mdb-select" id="filterselect">
                                        <option selected value="2">All</option>
                                        <option value="1">Approved</option>
                                        <option value="0">Unapproved</option>
                                    </select>
                        </div>
                    </div>
                </div><br/>
                <div id="table_container">
                    
                            <?php
                              
                                $connetion = mysqli_connect("localhost","root","","iiita-placement");
                                $select_query = "SELECT * FROM jobs;";
                                $check = mysqli_query($connection , $select_query);
                                echo '<table class="table table-striped">
                                      <tr style="font-size:16px;">
                                          <th>Job ID<i class="fas fa-sort"></i></th>
                                          <th>Company<i class="fas fa-sort"></i></th>
                                          <th>Job type<i class="fas fa-sort"></i></th>
                                          <th>CTC<i class="fas fa-sort"></i></th>
                                          <th>job location <i class="fas fa-sort"></i></th>
                                          <th>job status <i class="fas fa-sort"></i></th>
                                      </tr>';
                                while($row = mysqli_fetch_assoc($check)){
                                    
                                    $job_id = $row['job_id'];
                                    $job_company = $row['job_company'];
                                    $job_type = $row['job_type'];
                                    $job_ctc = $row['job_ctc'];
                                    $job_location = $row['job_location'];
                                    $job_details = $row['job_details'];
                                    $job_duration = $row['job_duration'];
                                    if($row['job_is_approved'] == '0'){
                                        $job_is_approved = 'To be approved';
                                    }
                                    else{
                                        $job_is_approved = 'Approved';
                                    }
                                    $job_status = $row['job_is_approved'];
                                    echo '<tr id="open_approve" class="table_row" data-toggle="modal" data-target="#open_approve_modal'.$job_id.'">
                                                <td>'.$job_id.'</td>
                                                <td>'.$job_company.'</td>
                                                <td>'.$job_type.'</td>
                                                <td>'.$job_ctc.'</td>
                                                <td>'.$job_location.'</td>
                                                <td>'.$job_is_approved.'</td>
                                            </tr>';
                                    
                                    echo '
                <!-- ---------modal class statrs---------- --> 

                                <div class="modal fade" id="open_approve_modal'.$job_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content dialog-box">
                                         <div class="modal-body" style="text-align:center;">
                                         <div class="container">
                                                <div class="row">
                                                    <div class="col-5" id="col-5" style="text-align:center;">Company</div>
                                                    <div class="col-2" id="col-2" style="text-align:center;">:</div>
                                                    <div class="col-5" id="col-5">'.$job_company.'</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" id="col-5" style="text-align:center;">Job type</div>
                                                    <div class="col-2" id="col-2" style="text-align:center;">:</div>
                                                    <div class="col-5" id="col-5">'.$job_type.'</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" id="col-5" style="text-align:center;">Job Duration</div>
                                                    <div class="col-2" id="col-2" style="text-align:center;">:</div>
                                                    <div class="col-5" id="col-5">'.$job_duration.'</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" id="col-5" style="text-align:center;">CTC</div>
                                                    <div class="col-2" id="col-2" style="text-align:center;">:</div>
                                                    <div class="col-5" id="col-5">'.$job_ctc.'</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" id="col-5" style="text-align:center;">Job Location</div>
                                                    <div class="col-2" id="col-2" style="text-align:center;">:</div>
                                                    <div class="col-5" id="col-5">'.$job_location.'</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5" id="col-5" style="text-align:center;">Job Details</div>
                                                    <div class="col-2" id="col-2" style="text-align:center;">:</div>
                                                    <div class="col-5" id="col-5">'.$job_details.'</div>
                                                </div>
                                         </div>    
                                         </div>';
                                        if($job_status == '0'){
                                            
                                            echo '<div  class="year_checkbox"><hr/> 
                                                     Select students to send job request<br/><br/>
                                                          <input type="checkbox" name="years" value="year_2018"> 1st Year &nbsp &nbsp
                                                          <input type="checkbox" name="years" value="year_2017"> 2nd Year <br/>
                                                          <input type="checkbox" name="years" value="year_2016"> 3rd Year &nbsp &nbsp
                                                          <input type="checkbox" name="years" value="year_2015"> 4th Year <br/>
                                                          <input type="checkbox" name="years" value="year_2014"> 5th Year <br/>
                                                          <button type="submit" name="submit" value="'.$job_id.'" class="btn btn-success" onclick="approval('.$job_id.')">Approve</button>  
                                                </div>';
                                        };
                                         
                                 echo '</div>
                                </div>
                                </div>  
            <!-- ------------modal class ends--------------- -->

                                    ';
                                    
                                };
                                echo '</table>';
                                mysqli_close($connection);
                              ?> 
                </div>
            </div>
          
      </div><!-- end of jobs div -->


      <div class="col-sm-4" > <!-- start of blacklisting div -->
          <div class="mdb-company thumbnail">
              <div class="middle" style="font-size:20px; text-align:left;">Blacklisted students</div>
              <a href="blacklist.php" class="btn btn-primary" target="_blank">Add/Remove</a>
              <div id="blacklisted">
                    <input id="blacklisted_search" type="text" placeholder="search"/>
                    <ul id="blacklisted_list">
                        <?php
                            while($data=mysqli_fetch_array($check_listed)){
                                //student data
                                echo '<li id="blacklisted_data">'.$data['student_roll_no'].'</li>';
                            }
                        ?>
                    </ul>
                </div>   
          </div>
      </div> 

  </div>
</div>

<script>
    
    $(document).ready(function(){
       $("#blacklisted_head").click(function(){
            $("#blacklisted_input").css("display" , "inline");
            $("#blacklisted_button").css("display" , "inline");
            $("#blacklisted_input").focus();
            $("#blacklisted_head").css("display" , "none");
       });
    });
    
    $(document).ready(function(){
       $("#blacklisted_search").focus(function(){
          $("#blacklisted_list").css("display" , "block"); 
       }); 
    });
    
    $(document).ready(function(){
        $("#blacklisted_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#blacklisted_list li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    
    $(document).ready(function(){
        $("#filterselect").on('change' , function(){
           
            var value = $(this).val();
            $.ajax({
               url: 'includes/fetch_jobs.php',
               type: 'POST',
               data: 'request='+value,
               beforeSend: function(){
                   $("#table_container").html('working on it...');
               },
               success: function(data){
                   $("#table_container").html(data);
               },
               
            });
        }); 
    });
    
    function approval(id){
        var year = [];
        $.each($("input[name='years']:checked"), function(){
           year.push($(this).val()); 
        });
        $.ajax({
           url: 'includes/approve_job.php',
           type: 'POST',
           dataType: 'JSON',
           data:{id: id,
                 year: year},
           success: function(data){
               location.reload();
           },
        });
    }

</script>
<?php

    include("footer.php");

?>