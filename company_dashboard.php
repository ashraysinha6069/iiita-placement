<?php

    include("header.php");
    include("company_panel.php");
    session_start();

//if company not logged in, send to the login page
    if(!isset($_SESSION['company_username'])){
        header("Location: company_login.php");
    }


?>

<div class="container"><hr/></div>
<div class="container content mid-header">
    <br/>
        <span style="font-size:25px; margin:20px 20px;" style="font-family: 'Montserrat', sans-serif;">Job Requests Made </span>
        <div class="mdb-company thumbnail" style="font-family: 'Montserrat', sans-serif;" >     
              <div class="row">
                  <table class="job_table table table-striped tablesorter">
                      <thead>
                          <tr style="font-size:16px;">
                              <th>Job request id<i class="fas fa-sort"></i></th>
                              <th>Job type<i class="fas fa-sort"></i></th>
                              <th>Job type<i class="fas fa-sort"></i></th>
                              <th>job location <i class="fas fa-sort"></i></th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr class="table_row" data-toggle="modal" data-target="#open-modal">
                              <td>hello</td>
                              <td>1</td>
                              <td>Full-Time</td>
                              <td>kualalampur</td>
                          </tr>
                          <tr class="table_row" data-toggle="modal" data-target="#open-modal">
                              <td>hello</td>
                              <td>2</td>
                              <td>Full-Time</td>
                              <td>amsterdam</td>
                          </tr>
                          <tr class="table_row" data-toggle="modal" data-target="#open-modal">
                              <td>hello</td>
                              <td>3</td>
                              <td>Intel-Time</td>
                              <td>badlapur</td>
                          </tr>
                      </tbody>
                  </table>
              </div>
        </div>
    
<!-- modal class statrs -->
<div class="modal" id="open-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
     <div class="modal-content dialog-box">
         <div class="modal-header">
            <h5 class="modal-title">Students who applied</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="mdb-student thumbnail" style="font-family: 'Montserrat', sans-serif;" >     
                  <div class="row">
                      <table id= "myTable" class="table table-striped tablesorter">
                          <thead>
                              <tr style="font-size:13px;">
                                  <th>S No.<i class="fas fa-sort"></i></th>
                                  <th>Job request id<i class="fas fa-sort"></i></th>
                                  <th>Job type<i class="fas fa-sort"></i></th>
                                  <th>Job type<i class="fas fa-sort"></i></th>
                                  <th>job location <i class="fas fa-sort"></i></th>
                                  <th>Job request id<i class="fas fa-sort"></i></th>
                                  <th>Job type<i class="fas fa-sort"></i></th>
                                  <th>Job type<i class="fas fa-sort"></i></th>
                                  <th>job location <i class="fas fa-sort"></i></th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr data-toggle="modal" data-target="#open-modal">
                                  <td></td>
                                  <td>hello</td>
                                  <td>2</td>
                                  <td>Full-Time</td>
                                  <td>amsterdam</td>
                                  <td>hello</td>
                                  <td>2</td>
                                  <td>Full-Time</td>
                                  <td>amsterdam</td>
                                </tr>
                              <tr data-toggle="modal" data-target="#open-modal">
                                  <td></td>
                                  <td>hello</td>
                                  <td>3</td>
                                  <td>Intel-Time</td>
                                  <td>badlapur</td>
                                  <td>hello</td>
                                  <td>3</td>
                                  <td>Intel-Time</td>
                                  <td>badlapur</td>
                                </tr>
                                <tr data-toggle="modal" data-target="#open-modal">
                                  <td></td>
                                  <td>hello</td>
                                  <td>3</td>
                                  <td>Intel-Time</td>
                                  <td>badlapur</td>
                                  <td>hello</td>
                                  <td>3</td>
                                  <td>Intel-Time</td>
                                  <td>badlapur</td>
                                </tr>
                                <tr data-toggle="modal" data-target="#open-modal">
                                  <td></td>
                                  <td>hello</td>
                                  <td>3</td>
                                  <td>Intel-Time</td>
                                  <td>badlapur</td>
                                  <td>hello</td>
                                  <td>3</td>
                                  <td>Intel-Time</td>
                                  <td>badlapur</td>
                                </tr>
                          </tbody>
                      </table>
                  </div>
            </div>
        </div>
        <div style="text-align:center;"><form action="download.php" method="POST">
            <button type="submit" class="btn btn-success">Download Data as Excel</button></form>
            <button type="button" class="btn btn-danger">Download Datc</button>
        </div>
    </div>
</div>
</div>    
<!-- modal class ends -->
</div>

<?php

    include("footer.php");

?>