<?php
include 'db.php';
include 'post_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $post=new post(null, null, null,$_SESSION['id']);
    $response=$post->showPost($pdo);
    echo json_encode($response);
}