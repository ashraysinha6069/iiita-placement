<?php

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $connection = mysqli_connect("localhost","root","","iiita-placement");
        $select_query = "UPDATE students SET
                            student_status='1' 
                            WHERE student_id='$id';";
        mysqli_query($connection,$select_query);
        $data['detail']="success";
        
        echo json_encode($data);
    }
    else{
        header("Location: ../admin_login.php");
    }
?>