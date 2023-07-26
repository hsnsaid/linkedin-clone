<?php
include 'db.php';
class Job{
    public function __construct(private ?int $id, private ?string $title, private ?string $description ,private ?string $Job_type, private ?string $Job_location , private ?string $Company_name ,private ?string $time_of_it, private ?string $Workplace_type,private $conn){}
    public function getId() :int{
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getTitle() :string{
        return $this->title;
    }
    public function setTitle($title){
        $this->title=$title;
    }    
    public function getDescription() :string{
        return $this->description;
    }
    public function setDescription($description){
        $this->description=$description;
    }
    public function getJob_type() :string{
        return $this->Job_type;
    }
    public function setJob_type($Job_type){
        $this->Job_type=$Job_type;
    }    
    public function getJob_location() :string{
        return $this->Job_location;
    }
    public function setJob_location($Job_location){
        $this->Job_location=$Job_location;
    }    
    public function getCompany_name() :string{
        return $this->Company_name;
    }
    public function setCompany_name($Company_name){
        $this->Company_name=$Company_name;
    }    
    public function getTime_of_it() :string{
        return $this->time_of_it;
    }
    public function setTime_of_it($time_of_it){
        $this->time_of_it=$time_of_it;
    }    
    public function getWorkplace_type() :string{
        return $this->Workplace_type;
    }
    public function setWorkplace_type($Workplace_type){
        $this->Workplace_type=$Workplace_type;
    }
    public function showJob(){
        $sql="SELECT title,Company_name,Job_location,Workplace_type FROM jobs WHERE title='$this->title' ORDER BY id DESC";
        $result=$this->conn->query($sql);
        $response=$result->fetch_all(MYSQLI_ASSOC);
        return $response;
    }
    public function showJobDetails(){
        $sql="SELECT * FROM jobs WHERE id='$this->id' ORDER BY id DESC";
        $result=$this->conn->query($sql);
        $response=$result->fetch_all(MYSQLI_ASSOC);
        return $response;
    } 
    public function addJob(){
        $add=$this->conn->prepare("INSERT INTO jobs (title,  Job_type, Job_location, Company_name, Workplace_type, time_of_it) VALUES(?, ?, ?, ?, ?, ?)");
        $add->bind_param("ssssss", $this->title, $this->Job_type, $this->Job_location, $this->Company_name, $this->Workplace_type, $this->time_of_it,);
        $add->execute();
        $insertedId = $this->conn->insert_id;
        $this->setId($insertedId);    
    }
    public function updateDescription(){
        $update = $this->conn->prepare("UPDATE jobs SET description = ? WHERE id = ?");
        $update->bind_param("si", $this->description, $this->id);
        $update->execute();
    }
    public function deletePost(){
        $delete="DELETE from posts WHERE id='$this->user_id'";
        $result=$this->conn->query($delete);
    }
}