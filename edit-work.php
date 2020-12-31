<?php 
    require('config/db.php');
    session_start();

    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $work_country = mysqli_real_escape_string($conn, $_POST['work_country']);
    $work_city = mysqli_real_escape_string($conn, $_POST['work_city']);
    $work_startdate = mysqli_real_escape_string($conn, $_POST['work_startdate']);
    $work_enddate = mysqli_real_escape_string($conn, $_POST['work_enddate']); 

    $user_id = $_POST['user_id'];
    $resume_id = $_POST['resume_id'];

    $sql = "UPDATE work_temp 
            SET company='$company', position='$position', work_country='$work_country', work_city='$work_city', work_startdate='$work_startdate', work_enddate='$work_enddate'
            WHERE user_id=$user_id AND resume_id=$resume_id";
    $result = mysqli_query($conn, $sql);
?>