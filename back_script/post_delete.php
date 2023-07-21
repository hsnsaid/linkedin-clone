<?php
include 'db.php';
include 'post_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $descripation=$_POST['descripation'];
    $date=$_POST['date'];
    $post=new post(null, $descripation, $_SESSION['user_id'], $date, $conn);
    $post->deletePost();
}
?>