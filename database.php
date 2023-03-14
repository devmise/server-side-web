<?php
    $dsn = 'mysql:host=localhost;dbname=D00240060';
    $username = 'D00240060';
    $password = 'lCsbBKq8';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>