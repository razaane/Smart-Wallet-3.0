<?php
include 'user.php';
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}

$deconnection=new Users($pdo);
$deconnection->logout();
?>