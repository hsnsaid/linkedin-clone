<?php
include 'db.php';
class User{
    public function __construct(private ?int $id,private ?string $first_name,private ?string $last_name,private string $email,private string $password,private ?string $country,private ?string $city, private ?string $job_title,private $conn){}
    public function getId() :int{
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }

    public function getFirst_name() :string{
        return $this->first_name;
    }
    public function setFirst_name($first_name){
        $this->first_name=$first_name;
    }
    public function getLast_name() :string{
        return $this->last_name;
    }
    public function setLast_name($last_name){
        $this->last_name=$last_name;
    }
    public function getEmail() :string{
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function getPassword() :string{
        return $this->password;
    }

    public function setPassword($password){
        $this->password=$password;
    }

    public function getCountry($country) :string{
        return $this->country;
    }  
    public function setCountry($country){
        $this->country=$country;
    }
    public function getCity() :string{
        return $this->city;
    }

    public function setCity($city){
        $this->city=$city;
    }
    public function getJob_title() :string{
        return $this->job_title;
    }
    public function setJob_title($job_title){
        $this->job_title=$job_title;
    }
    public function createUser(): bool {
        $sql = "SELECT id FROM users WHERE email='$this->email'";
        $result = $this->conn->query($sql);    
        if (mysqli_num_rows($result) > 0) {
            return false;
        }    
        $sign_up = $this->conn->prepare("INSERT INTO users (first_name, last_name, email, password, country, city, job_title) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sign_up->bind_param("sssssss", $this->first_name, $this->last_name, $this->email, $this->password, $this->country, $this->city, $this->job_title);
            if ($sign_up->execute()) {
            $insertedId = $this->conn->insert_id;
            $this->setId($insertedId);    
            return true;
        } else {
            return false;
        }
    }
    public function checkUser() : bool{
        $sql="SELECT id FROM users WHERE email='$this->email' AND password='$this->password'";
        $result = $this->conn->query($sql);
        if(mysqli_num_rows($result)==0){
            return false; 
        }
        $this->setId($result->fetch_array(MYSQLI_BOTH)['id']); 
        return true;
    }
}
?>