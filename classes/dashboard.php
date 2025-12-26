<?php
// require "database.php";
class Dashboard{
    private PDO $pdo ;

    public function __construct(PDO $pdo){
        $this->pdo =$pdo;  
    }
    public function totalIncomes():float{
        $stmt=$this->pdo->prepare("SELECT SUM(montant) AS totalIncomes FROM incomes");
        $stmt->execute([]);
        return $stmt->fetchColumn();
    }
    public function totalExpences():float{
        $stmt=$this->pdo->prepare("SELECT SUM(montant) AS totalExpenses FROM expenses");
        $stmt->execute([]);
        return $stmt->fetchColumn();
    }
    public function Balance() :float {
        return $this->totalIncomes() - $this->totalExpences();

    }
}