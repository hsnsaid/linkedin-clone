<?php
include 'db.php';
include 'job_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $job_title=$_POST['Job_title'];
    $company=$_POST['Company'];
    $workplace=$_POST['Workplace_type'];
    $location=$_POST['Job_location'];
    $job_type=$_POST['Job_type'];
    $date = date('d-m-y');
    $job=new job(null, $job_title, null, $job_type, $location, $company, $date, $workplace , $conn);
    $job->addJob();
    echo json_encode($job->getId());
}
?>