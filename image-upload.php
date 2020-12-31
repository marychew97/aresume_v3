<?php 
    include "config/db.php";
    session_start();

    if(isset($_POST)){
        $name       = $_FILES['file']['name'];  
        $temp_name  = $_FILES['file']['tmp_name'];  
        $user_id = $_SESSION['id'];
        if(isset($name)){
            if(!empty($name)){      
              $folder = "uploads/images/";
              move_uploaded_file($temp_name, $folder.$name);

              $sql = "INSERT INTO images (image, user_id)
                      VALUE ('$name', $user_id)";

              $result = mysqli_query($conn, $sql);

              $sql2 = "SELECT * FROM images WHERE user_id = $user_id";
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