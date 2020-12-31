<?php 
    require('config/db.php');
    session_start();

    $template = $_POST['template'];
    $id = $_SESSION['id'];
    $sql = "INSERT INTO template_temp (template, user_id)
            VALUES ('$template', $id)";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['resume_id'] = mysqli_insert_id($conn);
        echo "<script>window.location.href='create.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>