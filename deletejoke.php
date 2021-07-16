<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=jokes;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'DELETE FROM `joke` WHERE `id`=:id';
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();
    header('location: jokes.php');
} catch (PDOException $e) {
    $title = 'error';

    $output = 'Database error ' . $e->getMessage() . ' in ' . $e->getLine() . ' ' . $e->getFile();
}

include_once __DIR__ . './views/layout.html.php';