<?php 
    require('config/db.php');
    session_start();

    if(isset($_POST)){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if($row['password'] === $password && $row['email'] === $email){
            echo "Signed in successfully! Redirecting to your dashboard...";
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
        }   elseif(empty($email) && empty($password)){
            echo "Please enter your email and password";
        }   elseif(empty($email) && !empty($password)){
            echo "Please enter your username";
        }   elseif(empty($password) && !empty($email)){
            echo "Please enter your password";
        }   elseif($row['email'] !== $email || $row['password'] === $password){
            echo "Email or password does not exist";
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