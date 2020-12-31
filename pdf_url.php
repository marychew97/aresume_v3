<?php 
    require('config/db.php');
    require('fpdf181/fpdf_merge.php');

    // $user_id = $_GET['id'];
    // $resume_id = $_GET['resume_id'];

    // $merge = new FPDF_Merge();
    // $merge->add('uploads/documents/fishackathon.pdf');
    // $merge->add('uploads/documents/nasa-space-cert.pdf');
    // $merge->output();

    // $sql = "SELECT * FROM institution_temp WHERE user_id = $user_id AND resume_id = $resume_id";
    // $result = mysqli_query($conn, $sql);
    // while($row = mysqli_fetch_assoc($result)){
    //     $merge = new FPDF_Merge();
    //     $merge->add('uploads/documents/'.$row['transcript']);
    //     $merge->add('uploads/documents/'.$row['certificate']);
    //     $merge->output();
    // }

    // Store the file name into variable 
    $file = "uploads/documents/".$_GET['file']; 
    $filename = "uploads/documents/".$_GET['file']; 
    
    // Header content type 
    header('Content-type: application/pdf'); 
    
    header('Content-Disposition: inline; filename="' . $filename . '"'); 
    
    header('Content-Transfer-Encoding: binary'); 
    
    header('Accept-Ranges: bytes'); 
    
    // Read the file 
    @readfile($file); 
?>