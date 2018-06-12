        <?php
            $check1 = mysqli_query($connection,$select_query);
        //render all posts made be company
            while($data = mysqli_fetch_array($check1)){
                                    
                 $job_id = $data['job_id'];
                 $job_company_id = $data['job_company_id'];
                
            //render all students who accepted request
                $select_query = "SELECT * FROM relations WHERE company_id='$id' AND job_id='$job_id'";
                $check2 = mysqli_query($connection,$select_query);

                
                 echo '
        <!-- -----------------modal class statrs--------------------- --> 
                        
                        <div class="modal fade" id="open-modal-'.$job_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                             <div class="modal-content dialog-box">
                                 <div class="modal-header">
                                    <h5 class="modal-title">Students who applied</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="mdb-student thumbnail">     
                                          <div class="row">
                                              <table id= "myTable" class="students-data-table-'.$job_id.' table-striped">
                                                  <thead>
                                                      <tr style="font-size:13px;">
                                                          <th>S No.<i class="fas fa-sort"></i></th>
                                                          <th>Name<i class="fas fa-sort"></i></th>
                                                          <th>Roll No.<i class="fas fa-sort"></i></th>
                                                          <th>E-mail<i class="fas fa-sort"></i></th>
                                                          <th>Contact<i class="fas fa-sort"></i></th>
                                                          <th>Date of birth<i class="fas fa-sort"></i></th>
                                                          <th>See resume<i class="fas fa-sort"></i></th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                        ';?>
                                                        <?php include("company_modal_students.php");?>    
                                                        <?php echo '
                                                  </tbody>
                                              </table>
                                          </div>
                                    </div>
                                </div>
                                <div style="text-align:center; padding-bottom:3%;">';   
                                //print button to download all data
                                    echo '<form action="company_download.php" method="post">
                                            <input type="hidden" value='.$job_id.' name="jobid">
                                            <input type="hidden" value='.$id.' name="companyid">
                                            <button name="submit" type="submit" class="btn btn-success">Download Data as Excel</button>
                                          </form>';
                                echo '</div>
                            </div>
                        </div>
                        </div>  
    <!-- --------------------modal class ends-------------------------- -->';
                        
    //<!-- -------------------script to download table as excel----------------------- -->
                        //<script>
                        //    $(".table_download_'.$job_id.'").click(function(){
                        //        $(".students-data-table-'.$job_id.'").table2excel({
                        //            name: "students_data",
                        //            filename: "students"
                        //        });
                        //    });
                        //</script>

                 
             }
        ?>

<!--<script>
    function list_download(jobid,companyid){
        $.ajax({
               type: "POST",
               url: "company_download.php",
               data: {jobid: jobid,
                      companyid: companyid},
               dataType: "JSON",
               success: function(data)
                {
                    alert(data.detail);
                }
            });
    }
</script>-->
