<?php 
    require('config/db.php');
    session_start();
    
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $job = mysqli_real_escape_string($conn, $_POST['job']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $summary = mysqli_real_escape_string($conn, $_POST['summary']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $linkedin = mysqli_real_escape_string($conn, $_POST['linkedin']);
    $github = mysqli_real_escape_string($conn, $_POST['github']);
    $facebook = mysqli_real_escape_string($conn, $_POST['facebook']);

    $user_id = $_SESSION['id'];
    $resume_id = $_SESSION['resume_id'];

    $image_name = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];  
    $folder = "uploads/images/";
    move_uploaded_file($temp_name, $folder.$image_name);

    $maxsize = 5242880; // 5MB
    $video_name = $_FILES['video']['name'];
    $target_dir = "uploads/videos/";
    $target_file = $target_dir . $_FILES["video"]["name"];
    echo $video_name;

    // Select file type
    $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
    // Valid file extensions
    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

    // Check extension
    if(!empty($video_name)){
      if(in_array($videoFileType,$extensions_arr)){
         move_uploaded_file($_FILES['video']['tmp_name'],$target_file);
            // Insert record
            $sql = "INSERT INTO profile_temp (user_id, resume_id, name, job, email, phone, location, summary, website, linkedin, github, facebook, profile_image, video)
                    VALUES ($user_id, $resume_id, '$name', '$job', '$email', '$phone', '$location', '$summary', '$website', '$linkedin', '$github', '$facebook', '$image_name', '$video_name')";
            $result = mysqli_query($conn, $sql);
             if($result){
                 echo "Profile information submitted successfully";
             }
          
   
          // Check file size
       //    if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
       //      echo "File too large. File must be less than 5MB.";
       //    }else{
            // Upload
            // if(move_uploaded_file($_FILES['video']['tmp_name'],$target_file)){
            //   // Insert record
            //   $sql = "INSERT INTO profile_temp (user_id, resume_id, name, job, email, phone, location, summary, website, linkedin, github, facebook, profile_image, video)
            //           VALUES ($user_id, $resume_id, '$name', '$job', '$email', '$phone', '$location', '$summary', '$website', '$linkedin', '$github', '$facebook', '$image_name', $video_name)";
            //    $result = mysqli_query($conn, $sql);
   
            //    if($result){
            //        echo "Profile information submitted successfully";
            //    }
            // }
       //    }
   
       }else{
          echo "<script>alert('Invalid file extension.')</script>";
       }
    } else{
      $sql = "INSERT INTO profile_temp (user_id, resume_id, name, job, email, phone, location, summary, website, linkedin, github, facebook, profile_image, video)
      VALUES ($user_id, $resume_id, '$name', '$job', '$email', '$phone', '$location', '$summary', '$website', '$linkedin', '$github', '$facebook', '$image_name', '$video_name')";
      $result = mysqli_query($conn, $sql);
      if($result){
         echo "Profile information submitted successfully";
      }
    }
    
?>