<?php
    $dsn = 'mysql:host=localhost;dbname=ritchief_guitar1';
    $username = 'ritchief_336';
    $password = '5bC$m8UgffqEC60hWEua';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>