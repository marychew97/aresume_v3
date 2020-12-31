<?php 
    require('config/db.php');
    session_start();

    $award = mysqli_real_escape_string($conn, $_POST['award']);
    $awarder = mysqli_real_escape_string($conn, $_POST['awarder']);
    $date = mysqli_real_escape_string($conn, $_POST['award_date']);
    $award_desc = mysqli_real_escape_string($conn, $_POST['award_desc']);

    $certificate = $_FILES['award_cert']['name'];  
    $certificate_temp_name  = $_FILES['award_cert']['tmp_name'];  
    $certificate_folder = "uploads/documents/";
    move_uploaded_file($certificate_temp_name, $certificate_folder.$certificate);

    $user_id = $_POST['user_id'];
    $resume_id = $_POST['resume_id'];

    $sql = "UPDATE award_temp
            SET award='$award', awarder='$awarder', date='$date', award_desc='$award_desc', certificate='$certificate'
            WHERE user_id=$user_id AND resume_id=$resume_id";
    $result = mysqli_query($conn, $sql);
    
?>