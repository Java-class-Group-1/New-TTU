<?php
// lecture_form.php

include('../include/db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle form submission and insert data into the database (Lecture Table)
        $depart_name = $_POST['depart_name'];
        $Faculty_id = $_POST['Faculty_id'];

        // Check if the record already exists
        $existingRecordQuery = "SELECT id FROM department WHERE depart_name = :depart_name ";
        $existingStmt = $conn->prepare($existingRecordQuery);
        $existingStmt->bindParam(':depart_name', $depart_name);
        $existingStmt->execute();
        $existingRecord = $existingStmt->fetch(PDO::FETCH_ASSOC);

        if ($existingRecord) {
            // Record already exists, throw an error
            echo "Error: Department with the course is already in the system";
        } else {
            // Insert data into the database
            $insertQuery = "INSERT INTO department (depart_name,faculty_id) 
                            VALUES (:depart_name, :Faculty_id)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':depart_name', $depart_name);
            $insertStmt->bindParam(':Faculty_id', $Faculty_id);
            $insertStmt->execute();

            echo "Data inserted successfully";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
