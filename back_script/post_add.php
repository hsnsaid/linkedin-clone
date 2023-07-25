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
    $date = date('d-m-y h:i:s');
    $post=new post(null, $descripation, $date, $_SESSION['id'], $conn);
    $post->addPost();
}
?>