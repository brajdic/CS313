<?php
    $dsn = 'pgsql:host=localhost;dbname=Ashton';
    $username = 'root';
    $password = 'pizza';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo($error_message);
        exit();
    }
?>
