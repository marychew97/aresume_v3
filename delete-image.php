<?php 
    require('config/db.php');

    $id = $_POST['id'];
    
    $sql = "DELETE FROM images WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // if($result){
    //     echo "<script>window.location.href='create.php'</script>";
    // }
?>