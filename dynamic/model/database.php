<?php
    $dsn = 'mysql:host=localhost;dbname=photo_db';
    $username = 'photo';
    $password = 'ndokuda';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
?>
