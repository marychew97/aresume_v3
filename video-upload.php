<?php 
    include "config/db.php";
    session_start();

    if(isset($_POST)){
        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];  
        $maxsize = 5242880; // 5MB
        $user_id = $_SESSION['id'];
        
        if(isset($name)){
            if(!empty($name)){      
              
              $folder = "uploads/videos/";
              move_uploaded_file($temp_name, $folder.$name);

              echo $name;

              $sql = "INSERT INTO videos (video, user_id)
                      VALUE ('$name', $user_id)";

              $result = mysqli_query($conn, $sql);

              $sql2 = "SELECT * FROM videos WHERE user_id = $user_id";
              $result2 = mysqli_query($conn, $sql2);
              $json_array = array();
              while($row = mysqli_fetch_assoc($result2)){
                    $json_array = $row;
                  }

              // $rowcount = mysqli_num_rows($result2);
              // if($rowcount > 0){
              //   while($row = mysqli_fetch_assoc($result2)){
              //     echo $row;
              //   }
              // }
              echo json_encode($json_array); 

              // $row = mysqli_fetch_assoc($result2);
              
              // if($result2){
              //   echo $row;
              // }
            }       
        }  else {
            echo 'You should select a file to upload !!';
        }
    }

?>