<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "project5";
    $message = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed". $e->getMessage();
    }
