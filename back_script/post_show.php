<?php
include 'db.php';
include 'post_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $post=new post(null, null, $_SESSION['user_id'], null, $conn);
    $response=$post->showPost();
    echo json_encode($response);
}