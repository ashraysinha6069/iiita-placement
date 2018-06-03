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

      <div class="col-sm-8" > <!-- start of companies div -->
          <div class="mdb-company thumbnail">
            <div class="mdb-heading">Jobs</font></div>
                <div class="row">
                      <div class="col-lg-4">
                          <div class="form-group-option" >
                                <div class="mdb-show-label">Show</div>
                                <select class="form-control mdb-select" id="filterselect">
                                  <option selected value="Unapproved">New</option>
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>
                                  <option value="Unpublished">Unpublished</option>
                                  <option value="Published" >Published</option>
                                  <option value="ALL" >All</option>
                                </select>
                          </div>
                      </div>
                </div>
            </div>
      </div><!-- end of col-sm-8 means end of companies div -->


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
                            
                            //modal template starts
                            echo '
                                <div class="modal fade" id="blacklisted_modal_'.$data['student_id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content dialog-box">
                                         <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="company-name" style="font-size:20px; text-align:center;">
                                            Are you sure you want to remove<br/>
                                                '.$data['student_roll_no'].'    
                                            </div><hr/>
                                            <div style="text-align:center;">
                                                <button id="accept_'.$data['student_id'].'" type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            ';

                            //modal template stops
                            
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
    
</script>
<?php

    include("footer.php");

?>