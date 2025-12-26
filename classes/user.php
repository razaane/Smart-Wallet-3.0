<?php
session_start();


class Users {
    private PDO $pdo;

    private int $id;
    private string $username;
    private string $fullname;
    private string $email;
    private string $password;
    

    

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function register($username,$fullname, $email, $password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (username,fullname, email, password) VALUES (?, ?, ?, ?)");
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
            $_SESSION['user_name'] = $user['fullname'];
            header('Location: index.php');
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