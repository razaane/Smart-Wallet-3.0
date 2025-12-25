<?php
session_start();
include 'connexion.php';


class Users {
    private $pdo;
    

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function register($username,$fullname, $email, $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (username,fullname, email, password) VALUES (?, ?, ?)");
        try{
            return $stmt->execute([$username,$fullname, $email, $hash]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function login($email,$password){
        $stmt=$this->pdo->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (isset($user) && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nom'] = $user['fullname'];
            header('Location: dashbord.php');
            exit;

        }else{
            echo "email ou password est incorrect ! ";
        }
     }

     public function logout(){
        session_destroy();
        session_unset();
        header('Location: index.php');
        exit;
     }
}
?>