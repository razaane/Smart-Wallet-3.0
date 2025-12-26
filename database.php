<?php
class Database {
    private const HOST = "localhost";
    private const DB_NAME = "smart_wallet_v2";
    private const USER = "root";
    private const PASSWORD = "";
    private PDO $connect ; 
    public function __construct(){
        $pdo = "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME;
        try{
            $this->connect = new PDO($pdo, self::USER, self::PASSWORD);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully!";

        }catch(PDOException $e){
            echo "Connexion Failed!" .$e->getMessage();
        }
    }
    public function getConnection(): PDO {
        return $this->connect;
    }
}

