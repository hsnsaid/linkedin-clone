<?php
include "db.php";
include "user_class.php";
$email=$_POST['email'];
$password=$_POST['password'];
$user=new User(null,null,null,$email,$password,null,null,null);
    if($user->checkUser($pdo)==true){
        session_start();
        $_SESSION['active'] = true;
        $_SESSION['id']=$user->getId($pdo);
        $response = ["status" => false,"location" => "home.html"];
        echo json_encode($response);    
    }
    else{
        $array =['status'=>TRUE];
        header("Content-Type: application/json");
        echo json_encode($array);    
    }
?>