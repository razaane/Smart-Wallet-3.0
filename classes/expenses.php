<?php
//create()
//getAll()
//getById() 
//update()
//getByCategory()
//delete()
class Expence{
    private $pdo;

    public function __construct($pdo){
        $this->pdo =$pdo;
    }
    public function create($montant,$la_date,$descreption,$user_id,$categorie_id){
        $stmt=$this->pdo->prepare("INSERT INTO expenses (montant,la_date,descreption,user_id,categorie_id) VALUES(? , ? , ? , ? , ?)");
        return $stmt->execute([$montant,$la_date,$descreption,$user_id,$categorie_id]);
    }
    public function getAll($user_id){
        $stmt=$this->pdo->prepare("SELECT * FROM expenses WHERE id=?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id){
        $stmt =$this->pdo->prepare("SELECT * FROM expenses WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
        public function update($id,$montant,$la_date,$descreption,$categorie_id){
        $stmt =$this->pdo->prepare("UPDATE expenses SET montant=? , la_date=? ,descreption=?,categorie_id=? WHERE id=?");
        return $stmt->execute([$montant,$la_date,$descreption,$categorie_id,$id]);
    }
    public function getByCategory($categorie_id){
        $stmt=$this->pdo->prepare("SELECT * FROM expenses WHERE categorie_id =?");
        $stmt->execute([$categorie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id){
        $stmt=$this->pdo->prepare("DELETE FROM expenses WHERE id=?");
        return $stmt->execute([$id]);
    }
}