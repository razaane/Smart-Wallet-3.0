<?php 
//create()
//getAll()
//getById() 
//update()
//getByCategory()
//delete()
class Income {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create(float $montant,string $la_date,string $descreption,int $user_id,int $categorie_id):bool {
$stmt = $this->pdo->prepare("INSERT INTO incomes (montant,la_date,descreption,user_id,categorie_id) VALUES (?, ?, ?, ? ,?)");
        return $stmt->execute([$montant,$la_date,$descreption,$user_id,$categorie_id]);
    }

    public function getAll($user_id){
        $stmt =$this->pdo->prepare("SELECT * FROM incomes WHERE user_id =?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id){
        $stmt =$this->pdo->prepare("SELECT * FROM incomes WHERE id =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update($id,$montant,$la_date,$descreption,$categorie_id){
        $stmt =$this->pdo->prepare("UPDATE incomes SET montant=? , la_date=? ,descreption=?,categorie_id=? WHERE id=?");
        return $stmt->execute([$montant,$la_date,$descreption,$categorie_id,$id]);
    }

    public function getByCategory($categorie_id){
        $stmt=$this->pdo->prepare("SELECT * FROM incomes WHERE categorie_id =?");
        $stmt->execute([$categorie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($id,$montant,$la_date,$descreption,$categorie_id){
        $stmt=$this->pdo->prepare("DELETE FROM incomes WHERE id=?");
        return $stmt->execute([$id]);
    }


}