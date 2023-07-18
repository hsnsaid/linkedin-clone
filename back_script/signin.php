<?php
include "db.php";
include "user_class.php";
$email=$_POST['email'];
$password=$_POST['password'];
$user=new User(null,null,$email,$password,null,null,null,$conn);
    if($user->checkUser()!=null){
        session_start();
        $_SESSION['active'] = true;
        $_SESSION['id']=$user->checkUser();
        $response = ["status" => false,"location" => "template/home.html"];
        echo json_encode($response);    
    }
    else{
        $array =['faild'=>TRUE];
        header("Content-Type: application/json");
        echo json_encode($array);    
    }
$conn->close()
?>