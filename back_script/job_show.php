<?php
include 'db.php';
include 'job_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $search=$_SESSION["search"];
    $job=new job(null, $search, null, null, null, null, null, null, $conn);
    $response=$job->showJob();
    echo json_encode($response);
}
?>