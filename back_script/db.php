<?php
$conn = new mysqli("localhost", "root", "", "Linkedin_clone");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>