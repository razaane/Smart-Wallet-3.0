<?php
// require_once "connexion.php";
include 'database.php';


class Category {
    private PDO $db ;

    public function __construct(PDO $pdo){
        $this->db=$pdo;
    }

    public function getAll(string $category_type): ? array{
        $stmt = $this->db->prepare("SELECT id,name_type FROM categories WHERE category_type = ? ");
        $stmt->execute([$category_type]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
}
