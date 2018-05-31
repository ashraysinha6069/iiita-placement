<?php

    include("header.php");
    include("company_panel.php");
    session_start();

//if company not logged in, send to the login page
    if(!isset($_SESSION['company_username'])){
        header("Location: company_login.php");
    }

    $id = $_SESSION['company_id'];
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query = "SELECT * FROM jobs WHERE job_company_id='$id'";
    $check = mysqli_query($connection,$select_query);

?>

<div class="container"><hr/></div>
<div class="container content mid-header">
    <br/>
        <span style="font-size:25px; margin:20px 20px;" style="font-family: 'Montserrat', sans-serif;">Job Requests Made </span>
        <div class="mdb-company thumbnail" style="font-family: 'Montserrat', sans-serif;" >     
              <div class="row">
                  <table class="table table-striped">
                      <thead>
                          <tr style="font-size:16px;">
                              <th>Job ID<i class="fas fa-sort"></i></th>
                              <th>Job type<i class="fas fa-sort"></i></th>
                              <th>CTC<i class="fas fa-sort"></i></th>
                              <th>job location <i class="fas fa-sort"></i></th>
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Render all jobs posted by given company -->
                          <?php
                                while($data = mysqli_fetch_array($check)){
                                    
                                    $job_id = $data['job_id'];
                                    $job_company_id = $data['job_company_id'];
                                    $job_location = $data['job_location'];
                                    $job_type = $data['job_type'];
                                    $job_ctc = $data['job_ctc'];
                                    
                                    echo '
                                    <tr class="table_row" data-toggle="modal" data-target="#open-modal-'.$job_id.'">
                                        <td>'.$job_id.'</td>
                                        <td>'.$job_type.'</td>
                                        <td>'.$job_ctc.'</td>
                                        <td>'.$job_location.'</td>
                                    </tr>
                                    ';
                                }
                          ?>
                          
                      </tbody>
                  </table>
              </div>
        </div>
    <?php include("company_modal.php")?>
</div><br/>

<?php
    include("footer.php");
?>