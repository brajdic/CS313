<?php
    $dsn = 'pgsql:host=172.245.60.70;dbname=Ashton';
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
