<?php
include 'db.php';
class Job{
    public function __construct(private ?int $id, private ?string $title, private ?string $description ,private ?string $Job_type, private ?string $Job_location , private ?string $Company_name ,private ?string $time_of_it, private ?string $Workplace_type){}
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
    public function showJob($pdo){
        $result=$pdo->prepare("SELECT title,Company_name,Job_location,Workplace_type, time_of_it, description FROM jobs WHERE title LIKE :title ORDER BY id DESC");
        $searchTitle = '%' . $this->title . '%';
        $result->bindValue(":title", $searchTitle);
        $result->execute();
        $response=$result->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }
    public function showJobDetails($pdo){
        $result=$pdo->prepare("SELECT * FROM jobs WHERE id=:id ORDER BY id DESC");
        $result->bindValue(":id", $this->id);
        $result->execute();
        $response=$result->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    } 
    public function addJob($pdo){
        $add = $pdo->prepare("INSERT INTO jobs (title,  Job_type, Job_location, Company_name, Workplace_type, time_of_it) VALUES (:title, :Job_type, :Job_location, :Company_name, :Workplace_type, :time_of_it)");
        $add->bindValue(":title", $this->title);
        $add->bindValue(":Job_type", $this->Job_type);
        $add->bindValue(":Job_location", $this->Job_location);
        $add->bindValue(":Company_name", $this->Company_name);
        $add->bindValue(":Workplace_type", $this->Workplace_type);
        $add->bindValue(":time_of_it", $this->time_of_it);
        $add->execute();
        $insertedId = $pdo->lastInsertId();
        $this->setId($insertedId);    
    }
    public function updateDescription($pdo){
        $update = $pdo->prepare("UPDATE jobs SET description = :description WHERE id = :id");
        $update->bindValue(":description", $this->description);
        $update->bindValue(":id",$this->id);
        $update->execute();
    }
    public function deletePost($pdo){
        $delete = $pdo->prepare("DELETE from posts WHERE id= :id");
        $delete->bindValue(":id",$this->id);
        $delete->execute();
    }
}