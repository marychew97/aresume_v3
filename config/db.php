<?php 
    // $server = '54.236.164.229';
    // $host = 'root';
    // $password = 'lamp-aws';
    // $database = 'aresume';
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'aresumefyptest';

    $conn = mysqli_connect($server, $username, $password, $database);

    if(!$conn){
        die("Connection failed " . mysqli_connect_error());
    }
?>