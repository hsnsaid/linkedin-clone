<?php
include 'db.php';
include 'job_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $description=$_POST['description'];
    $job=new Job($_SESSION['job_id'], null, $description, null, null, null, null, null);
    $job->updateDescription($pdo);
}
?>