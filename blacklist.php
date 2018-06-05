<?php

    include("header.php");
    include("admin_panel.php");
    session_start();

    //if user not logged in
    if(!isset($_SESSION['admin_token'])){
        header("location: admin_login.php");
    }

    $connection = mysqli_connect("localhost","root","","iiita-placement");
    $select_query = "SELECT * FROM students;";
    $check = mysqli_query($connection , $select_query);

    
?>
<div class="container"><hr/></div>
<div class="container content mid-header">
    <br/>
        <span style="font-size:25px; margin:20px 20px;" style="font-family: 'Montserrat', sans-serif;">Students </span>
        <div class="mdb-company thumbnail" style="font-family: 'Montserrat', sans-serif;" >     
              <div class="row">
                  <table class="table table-striped">
                      <thead>
                          <tr style="font-size:16px;">
                              <th>name<i class="fas fa-sort"></i></th>
                              <th>Roll no.<i class="fas fa-sort"></i></th>
                              <th>e-mail<i class="fas fa-sort"></i></th>
                              <th>status<i class="fas fa-sort"></i></th>
                              <th>Blacklist</th>
                          </tr>
                      </thead>
                      <tbody>
                          <!-- Render all jobs posted by given company -->
                          <?php
                                while($data = mysqli_fetch_array($check)){
                                    
                                    $student_id = $data['student_id'];
                                    $student_name = $data['student_name'];
                                    $student_email = $data['student_email'];
                                    $student_roll_no = $data['student_roll_no'];
                                    if($data['student_status'] == '1'){
                                        $class = "minus";  
                                    }
                                    else{
                                        $class = "plus";
                                    }
                                    $student_status = $data['student_status'];
                                    
                                    echo '
                                    <tr class="table_row">
                                        <td>'.$student_name.'</td>
                                        <td>'.$student_roll_no.'</td>
                                        <td>'.$student_email.'</td>
                                        <td>'.$student_status.'</td>
                                        <td><button class="btn btn-primary" onclick="togglestudent('.$student_id.',\''.$student_name.'\',\''.$student_status.'\')"><i class="fas fa-'.$class.'"></i></button></td>
                                    </tr>
                                    ';
                                }
                          ?>
                          
                      </tbody>
                  </table>
              </div>
        </div>
</div><br/>

<script type="text/javascript">
        function togglestudent(id,name,status){
            
        if(status === '1'){
            var towhere = "includes/remove_from_blacklist.php";
        }
        else{
            var towhere = "includes/add_to_blacklist.php";
        }
            $.ajax({
               type: "POST",
               url: towhere,
               data: {id: id},
               dataType: "JSON",
               success: function(data)
                {
                    alert(data.detail);
                    location.reload();
                }
            });
        };
</script>

<?php
    include("footer.php");
?>
