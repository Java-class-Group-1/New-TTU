<?php
// lecture_form.php

include('../include/db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle form submission and insert data into the database (Lecture Table)
        $prog_name = $_POST['prog_name'];
        $Department_id = $_POST['Department_id'];
        $Faculty_id = $_POST['Faculty_id'];

    
            // Insert data into the database
            $insertQuery = "INSERT INTO program (prog_name, Department_id,Faculty_id) 
            VALUES (:prog_name, :Department_id, :Faculty_id)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':prog_name', $prog_name);
            $insertStmt->bindParam(':Department_id', $Department_id);
            $insertStmt->bindParam(':Faculty_id', $Faculty_id);
            $insertStmt->execute();

            echo "Success";
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
cd repository

