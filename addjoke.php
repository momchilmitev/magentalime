<?php
if (isset($_POST['joketext'])) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=jokes;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'INSERT INTO `joke` SET `joketext` = :joketext, `jokedate` = CURDATE()';
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':joketext', $_POST['joketext']);
        $stmt->execute();
        header('location: jokes.php');
    } catch (PDOException $e) {
        $title = 'error';

        $output = 'Database error ' . $e->getMessage() . ' in ' . $e->getLine() . ' ' . $e->getFile();
    }
} else {
    $title = 'Add a new joke';

    ob_start();

    include_once __DIR__ . './views/addjoke.html.php';

    $output = ob_get_clean();
}

include_once __DIR__ . './views/layout.html.php';