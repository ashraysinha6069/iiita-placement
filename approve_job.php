<?php
    if(isset($_POST['id'])){
        $data = array();
        $year = array();
        $year = $_POST['year'];
        $id = $_POST['id'];
        
        $connection=mysqli_connect("localhost","root","","iiita-placement");
        $select_query = "UPDATE jobs SET job_is_approved='1' WHERE job_id='$id';";
        $check = mysqli_query($connection , $select_query);
        $insert_query = "INSERT INTO batch SET
                            batch_id='',
                            job_id='$id',
                            ";
        foreach($year as $selected){
            $insert_query .= ''.$selected.'= "1",';
        }
        
    //got the insert query for insertion of job in batch
        $new_insert_query = rtrim($insert_query,", ");
        $insert_check = mysqli_query($connection , $new_insert_query);
        
        $data['detail']="success";
        
        echo json_encode($data);
    }
?>