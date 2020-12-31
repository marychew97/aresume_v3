<?php 
    require('config/db.php');
    session_start();

    $activity = mysqli_real_escape_string($conn, $_POST['activity']);
    $activity_country = mysqli_real_escape_string($conn, $_POST['activity_country']);
    $activity_city = mysqli_real_escape_string($conn, $_POST['activity_city']);
    $activity_startdate = mysqli_real_escape_string($conn, $_POST['activity_startdate']);
    $activity_enddate = mysqli_real_escape_string($conn, $_POST['activity_enddate']);
    $desc = mysqli_real_escape_string($conn, $_POST['activity_desc']);

    $image_count = count($_FILES['photos']['name']);
    $image = $_FILES['photos']['name'];
    $temp_name  = $_FILES['photos']['tmp_name'];
    $images = implode(',', $image);

    $user_id = $_SESSION['id'];
    $resume_id = $_SESSION['resume_id'];

    if(isset($image)){
        if(!empty($image)){   
        
          $folder = "uploads/images/";

          for($i=0; $i<$image_count; $i++){
            move_uploaded_file($temp_name[$i], $folder.$image[$i]);
          }
          
          $sql = "INSERT INTO activities_temp (user_id, resume_id, activity_country, activity_name, activity_city, activity_startdate, activity_enddate, activity_desc, photos)
                  VALUES ($user_id, $resume_id, '$activity_country', '$activity', '$activity_city', '$activity_startdate', '$activity_enddate', '$desc', '$images')";
          $result = mysqli_query($conn, $sql);
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }

    
    
?>