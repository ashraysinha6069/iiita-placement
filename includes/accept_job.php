<?php
    if(isset($_POST['student_id'])){
        $data = array();
        $student_id = $_POST['student_id'];
        $job_id = $_POST['job_id'];
        $company_id = $_POST['company_id'];
        $roll = $_POST['roll'];
        $connection= mysqli_connect("localhost","root","","iiita-placement");
        $insert_query = "INSERT INTO relations SET
                            id='',
                            student_roll_no='$roll',
                            student_id='$student_id',
                            company_id='$company_id',
                            job_id='$job_id';";
        $check = mysqli_query($connection , $insert_query);
        $data['detail']=$company_id;
        echo json_encode($data);
    }
?>