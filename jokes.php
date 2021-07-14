<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=jokes;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT `joketext` FROM `joke`';
    $result = $pdo->query($query);

    $title = 'Jokes list';
    $output = '';

    while ($row = $result->fetch()) {
        $jokes[] = $row['joketext'];
    }

    ob_start();

    include_once __DIR__ . './views/jokes.html.php';

    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'No connection! ' . $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine();
}

include_once __DIR__ . './views/layout.html.php';