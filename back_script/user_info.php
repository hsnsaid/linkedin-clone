<?php
include 'db.php';
include 'user_class.php';
session_start();
if($_SESSION['active']!=true){
    session_destroy();
    header('location: ../index.html');
}
else{
    $user=new User( $_SESSION['id'], null, null, null, null, null, null, null);
    $response=$user->showUser($pdo);
    echo json_encode($response);
}