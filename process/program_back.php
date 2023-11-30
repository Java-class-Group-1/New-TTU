<?php
// lecture_form.php

include('../include/db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle form submission and insert data into the database (Lecture Table)
        $prog_name = $_POST['prog_name'];
        $Department_id = $_POST['Department_id'];
        $Faculty_id = $_POST['Faculty_id'];

    // Check if the record already exists
    $existingRecordQuery = "SELECT id FROM program WHERE prog_name = :prog_name AND Faculty_id = :Faculty_id AND Department_id = :Department_id ";
    $existingStmt = $conn->prepare($existingRecordQuery);
    $existingStmt->bindParam(':prog_name', $prog_name);
    $existingStmt->bindParam(':Faculty_id', $Faculty_id);
    $existingStmt->bindParam(':Department_id', $Department_id);
    $existingStmt->execute();
    $existingRecord = $existingStmt->fetch(PDO::FETCH_ASSOC);

    if ($existingRecord) {
        // Record already exists, throw an error
        echo "Error: Program with the same name is in the same Department and faculty is already in the system";
    } else {
            // Insert data into the database
            $insertQuery = "INSERT INTO program (prog_name, Department_id,Faculty_id) 
            VALUES (:prog_name, :Department_id, :Faculty_id)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':prog_name', $prog_name);
            $insertStmt->bindParam(':Department_id', $Department_id);
            $insertStmt->bindParam(':Faculty_id', $Faculty_id);
            $insertStmt->execute();

            echo "Success";
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

