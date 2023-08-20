<?php
include "db.php";
include "user_class.php";
$first_name= $_POST['first_name'];
$last_name= $_POST['last_name'];
$email= $_POST['email']; 
$password= $_POST['password'];
$country= $_POST['country'];
$city= $_POST['city'];
$job_title= $_POST['job_title'];
$user=new User(null,$first_name,$last_name,$email,$password,$country,$city,$job_title);
if($user->createUser($pdo)==true){
    session_start();
    $_SESSION['active'] = true;
    $_SESSION['id']=$user->getId();
    $response = ["status" => false,"location" => "home.html"];
    header("Content-Type: application/json");
    echo json_encode($response);    
}
else{
    $array =['status'=>TRUE];
    header("Content-Type: application/json");
    echo json_encode($array);    
}
?>