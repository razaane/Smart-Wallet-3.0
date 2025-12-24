<?php
class Database {
    private const HOST = "localhost";
    private const DB_NAME = "Smart_Wallet_V2";
    private const USER = "root";
    private const PASSWORD = "";
    private PDO $connect ; 
    public function __construt(){
        $pdo = "mysql:host =" . self::HOST . ";dbname" . self::DB_NAME;
        try{
            $this->connect = new PDO($pdo, self::USER, self::PASSWORD);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully!";

        }catch(PDOExeption $e){
            echo "Connexion Failed!" .$e->getMessage();
        }
    }
    public function getConnection(): PDO {
        return $this->connect;
    }
}

