<?php
    if(isset($_POST['request'])){
        
        $request = $_POST['request'];
        if($request == '2'){
            $select_query = "SELECT * FROM jobs;";
        }
        else{
            $select_query = "SELECT * FROM jobs WHERE job_is_approved='$request';";
        }
        $connection = mysqli_connect("localhost","root","","iiita-placement");
        $check = mysqli_query($connection , $select_query);
        echo '<table class="table table-striped">
              <tr style="font-size:16px;" >
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
            
            echo '<tr class="table_row"  id="open_approve" class="table_row" data-toggle="modal" data-target="#open_approve_modal'.$job_id.'">
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
            
                                        if($job_status === '0'){
                                            
                                            echo '<div  class="year_checkbox"><hr/> 
                                                     Select students to send job request<br/><br/>
                                                          <input type="checkbox" name="years" value="btech_3rd"> B.Tech 3rd Year &nbsp &nbsp
                                                          <input type="checkbox" name="years" value="btech_4th"> B.Tech 4th Year <br/>
                                                          <input type="checkbox" name="years" value="dual_3rd"> Dual Degree 3rd Year &nbsp &nbsp
                                                          <input type="checkbox" name="years" value="dual_4th"> Dual Degree 4th Year <br/>
                                                          <input type="checkbox" name="years" value="dual_5th"> Dual Degree 5th Year <br/>
                                                          <button type="submit" name="submit" value="'.$job_id.'" class="btn btn-success" onclick="approval('.$job_id.')">Approve</button>  
                                                </div>';  
                                        };
                                    echo '
                                    </div>
                                </div>
                                </div>  
            <!-- ------------modal class ends--------------- -->

                                    ';
        };
        echo '</table>';
        mysqli_close($connection);    
    }
    
?>