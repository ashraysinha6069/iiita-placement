<?php
    
    while($student_data = mysqli_fetch_array($check2)){
        
        $student_id = $student_data['student_id'];
        
        $select_query2 = "SELECT * FROM students WHERE student_id='$student_id'";
        $check3 = mysqli_query($connection,$select_query2);
        $student_info = mysqli_fetch_array($check3);
        $student_name = $student_info['student_name'];
        $student_roll_no = $student_info['student_roll_no'];
        $student_email = $student_info['student_email'];
        $student_contact = $student_info['student_contact'];
        $student_dob = $student_info['date-of-birth'];
        $student_resume = $student_info['file'];
        
        echo ' 
        
    <!-- -----------------to echo each row of table-------------------  -->  
    
             <tr data-toggle="modal" data-target="#open-modal">
                <td></td>
                <td>'.$student_name.'</td>
                <td>'.$student_roll_no.'</td>
                <td>'.$student_email.'</td>
                <td>'.$student_contact.'</td>
                <td>'.$student_dob.'</td>
                <td><a class="btn resume_button" href="uploads/'.$student_resume.'" target="_blank">download</a></td>
              </tr>
        ';
    }

?>