<?php
include 'db.php';
class Post{
    public function __construct(private ?int $id,private ?string $descripation,private ?string $date,private int $user_id){}
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
    public function showPost($pdo){
        $result=$pdo->prepare("SELECT last_name,descripation,post_date FROM posts join users WHERE users.id =posts.user_id AND user_id=:user_id ORDER BY posts.id DESC");
        $result->bindParam(":user_id",$this->user_id);
        $result->execute();
        $response=$result->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    } 
    public function addPost($pdo){
        $add=$pdo->prepare("INSERT INTO posts (descripation, user_id, post_date) VALUES(:descripation, :user_id, :post_date)");
        $add->bindValue(":descripation",$this->descripation);
        $add->bindValue(":user_id",$this->user_id);
        $add->bindValue(":post_date",$this->date);
        $add->execute();
    }
    public function deletePost($pdo){
        $delete="DELETE from posts WHERE user_id='$this->user_id' AND descripation='$this->descripation' AND post_date='$this->date'";
        $delete=$pdo->prepare("DELETE from posts WHERE descripation=:descripation AND user_id:user_id AND post_date=:post_date)");
        $delete->bindParam(":descripation",$this->descripation);
        $delete->bindParam(":user_id",$this->user_id);
        $delete->bindParam(":post_date",$this->date);
        $delete->execute();
    }
}
?>