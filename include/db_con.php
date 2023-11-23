<?php
// db_connection.php

$host = 'localhost';
$db = 'ttu_project';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
