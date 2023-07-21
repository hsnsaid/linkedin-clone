<?php
include 'db.php';
class Post{
    public function __construct(private ?int $id,private string $descripation,private ?date $date,private int $user_id,private $conn){}
    public function getId() :int{
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getDescripation() :string{
        return $this->descripation;
    }
    public function setDescripation($descripation){
        $this->descripation=$descripation;
    }
    public function getUser_id() :int{
        return $this->user_id;
    }
    public function setUser_id($user_id){
        $this->user_id=$user_id;
    }
    public function getDate() :int{
        return $this->id;
    }
    public function setDate($id){
        $this->id=$id;
    }
    public function showPost(){
        $sql="SELECT descripation,post_date FROM posts WHERE user_id='$this->user_id' ORDER BY post_date ASC";
        $result=$this->conn->query($sql);
        $response=$result->fetch_array(MYSQL_ASSOC);
        return $response;
    } 
    public function addPost(){
        $add=$this->conn->prepare("INSERT INTO posts (descripation, user_id, post_date) VALUES(?, ?, ?)");
        $add->bind_param("sis",$this->user_id, $this->descripation, $this->date);
    }
    public function deletePost(){
        $delete="DELETE from posts WHERE user_id='$this->user_id' AND descripation='$this->descripation' AND post_date='$this->date'";
        $result=$this->conn->query($delete);
    }
}
?>