<?php
include 'db.php';
include 'post_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $request=file_get_contents("php://input");
    $id= json_decode($request, TRUE);
    $post=new post($id, null, null, null ,null, null, null,null);
    $post->deletePost($pdo);
}
?>