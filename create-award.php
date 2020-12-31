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

    $user_id = $_SESSION['id'];
    $resume_id = $_SESSION['resume_id'];

    $sql = "INSERT INTO award_temp (user_id, resume_id, award, awarder, date, award_desc, certificate)
            VALUES ($user_id, $resume_id, '$award', '$awarder', '$date', '$award_desc', '$certificate')";
    $result = mysqli_query($conn, $sql);
    
?>