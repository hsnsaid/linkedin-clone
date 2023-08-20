<?php
include 'db.php';
class User{
    public function __construct(private ?int $id,private ?string $first_name,private ?string $last_name,private ?string $email,private ?string $password,private ?string $country,private ?string $city, private ?string $job_title){}
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
    public function createUser($pdo): bool {
        $result=$pdo->prepare("SELECT id FROM users WHERE email=:email");
        $result->bindParam(":email",$this->email);
        $result->execute();
        if ($result->rowCount() >0) {
            return false;
        }    
        $sign_up = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, country, city, job_title) VALUES (:first_name, :last_name, :email, :password, :country, :city, :job_title)");
        $sign_up->bindParam(":first_name", $this->first_name);
        $sign_up->bindParam(":last_name", $this->last_name);
        $sign_up->bindParam(":email", $this->email);
        $sign_up->bindParam(":password", $this->password);
        $sign_up->bindParam(":country", $this->country);
        $sign_up->bindParam(":city", $this->city);
        $sign_up->bindParam(":job_title", $this->job_title);
        if ($sign_up->execute()) {
            $insertedId = $pdo->lastInsertId();
            $this->setId($insertedId);    
            return true;
        } else {
            return false;
        }
    }
    public function checkUser($pdo) : bool{
        $result=$pdo->prepare("SELECT id FROM users WHERE email=:email AND password=:password");
        $result->bindParam(":email",$this->email);
        $result->bindParam(":password",$this->password);
        $result->execute();
        if ($result->rowCount() == 0) {
            return false;
        }    
        $this->setId($result->fetch(PDO::FETCH_BOTH)['id']); 
        return true;
    }
    public function showUser($pdo){
        $result=$pdo->prepare("SELECT * FROM users WHERE id=:id");
        $result->bindParam(":id",$this->id);
        $result->execute();
        $response=$result->fetch(PDO::FETCH_BOTH);
        return $response;
    }
}
?>