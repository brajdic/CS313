<?php
    $dsn = 'mysql:dbname=Ashton;port=215;host=172.245.60.70';
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
