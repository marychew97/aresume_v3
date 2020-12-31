<?php 
    require('config/db.php');

    if(isset($_POST)){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        $sql = "INSERT INTO user (username, email, password)
                VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "Please sign in before redirecting to dashboard";
        }

        // $sql2 = "SELECT * FROM user WHERE email = $email";
        // $result2 = mysqli_query($conn, $sql2);
        // $json_array = array();
        
        // while($row = mysqli_fetch_assoc($result2)){
        //     $json_array = $row;
        // }

        // echo json_encode($json_array);
    }
?>