<?php
session_start();
require "database.php";
require "classes/expenses.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $db = new Database();
    $pdo = $db->getConnection();

    $expense = new Expence($pdo);
    $expense->delete($_POST['id']);
}

header("Location: affichage_exp.php");
exit;
