<?php
try{
  $dns="mysql:host=localhost;user=root;dbname=Linkedin_clone";
  $pdo=new PDO($dns);
}
catch(PDOException $e){
  throw new Exception($e->Message());
}
?>