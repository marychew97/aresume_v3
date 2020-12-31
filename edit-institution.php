<?php 
    require('config/db.php');
    session_start();

    $institution = mysqli_real_escape_string($conn, $_POST['institution']);
    $studyarea = mysqli_real_escape_string($conn, $_POST['studyarea']);
    $edulevel = mysqli_real_escape_string($conn, $_POST['edulevel']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $startdate = mysqli_real_escape_string($conn, $_POST['startdate']);
    $enddate = mysqli_real_escape_string($conn, $_POST['enddate']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['gpa']);

    $user_id = $_POST['user_id'];
    $resume_id = $_POST['resume_id'];

    $transcript = $_FILES['transcript']['name'];  
    $transcript_temp_name  = $_FILES['transcript']['tmp_name'];  
    $transcript_folder = "uploads/documents/";
    move_uploaded_file($transcript_temp_name, $transcript_folder.$transcript);

    $certificate = $_FILES['certificate']['name'];  
    $certificate_temp_name  = $_FILES['certificate']['tmp_name'];  
    $certificate_folder = "uploads/documents/";
    move_uploaded_file($certificate_temp_name, $certificate_folder.$certificate);

    $sql = "UPDATE institution_temp
            SET institution='$institution', studyarea='$studyarea', edulevel='$edulevel', country='$country', city='$city', startdate='$startdate', enddate='$enddate', cgpa='$cgpa', transcript='$transcript', certificate='$certificate'
            WHERE user_id=$user_id AND resume_id=$resume_id";
    $result = mysqli_query($conn, $sql);
    
?>