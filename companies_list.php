<?php

    include("header.php");
    include("admin_panel.php");
    session_start();

//if company not logged in, send to the login page
    if(!isset($_SESSION['admin_token'])){
        header("location: admin_login.php");
    }

//gather all data from companies table
    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query = "SELECT * FROM companies;";
    $check = mysqli_query($connection , $select_query);
?>
<div class="container"><hr/></div>
<div class="container content mid-header">
    <br/>
        <span style="font-size:25px; margin:20px 20px;" style="font-family: 'Montserrat', sans-serif;">Companies</span>
        <div class="mdb-company thumbnail" style="font-family: 'Montserrat', sans-serif;" >     
              <div class="row">
                  <table class="table table-striped">
                      <thead>
                          <tr style="font-size:16px;">
                              <th>Id<i class="fas fa-sort"></i></th>
                              <th>Name<i class="fas fa-sort"></i></th>
                              <th>Organization<i class="fas fa-sort"></i></th>
                              <th>E-mail<i class="fas fa-sort"></i></th>
                              <th>Contact</th>
                              <th>Website</th>
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Render all jobs posted by given company -->
                          <?php
                                while($data = mysqli_fetch_array($check)){
                                    
                                    $company_id = $data['company_id'];
                                    $company_name = $data['company_name'];
                                    $company_email = $data['company_email'];
                                    $company_organization = $data['company_organization'];
                                    $company_contact = $data['company_contact'];
                                    $company_website = $data['company_website'];
                                    echo '
                                    <tr class="table_row">
                                        <td>'.$company_id.'</td>
                                        <td>'.$company_name.'</td>
                                        <td>'.$company_organization.'</td>
                                        <td>'.$company_email.'</td>
                                        <td>'.$company_contact.'</td>
                                        <td>'.$company_website.'</td>
                                    </tr>
                                    ';
                                }
                          ?>
                          
                      </tbody>
                  </table>
              </div>
        </div>
</div><br/>
<?php

    include("footer.php");

?>