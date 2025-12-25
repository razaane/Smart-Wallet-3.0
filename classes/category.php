<?php
// require_once "connexion.php";
include 'database.php';


class Category {
    private int $id ;
    private string $name ;

    private PDO $db ;

    public function __construct(int $id,string $name){
        $std = new Database();
        $this->db=$std->getConnection();
        $this->id =$id;
        $this->name =$name;
    }
    public function getId():int{
        return $this->id;
    }
    public function getName():string{
        return $this->name;
    }

    public function getAll():array{
        $stmt = $this->db->prepare("SELECT * FROM categories");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach($rows as $row){
            $categories[] = new Category($row['id'],$row['name_type']);
        }
        return $categories;
    }
}
