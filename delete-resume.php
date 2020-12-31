<?php 
    require('config/db.php');
    session_start();

    $resume_id = $_POST['resume_id'];
    $id = $_SESSION['id'];
    
    $sql = "DELETE FROM template_temp WHERE resume_id = $resume_id AND user_id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>window.location.href='dashboard.php'</script>";
    }
?>