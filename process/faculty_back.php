<?php
// lecture_form.php

include('../include/db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle form submission and insert data into the database (Lecture Table)
        $faculty_name = $_POST['faculty_name'];
        $dep_num = $_POST['dep_num'];

        // Check if the record already exists
        $existingRecordQuery = "SELECT id FROM faculty WHERE faculty_name = :faculty_name ";
        $existingStmt = $conn->prepare($existingRecordQuery);
        $existingStmt->bindParam(':faculty_name', $faculty_name);
        $existingStmt->execute();
        $existingRecord = $existingStmt->fetch(PDO::FETCH_ASSOC);

        if ($existingRecord) {
            // Record already exists, throw an error
            echo "Error: faculty name  is already in the system";
        } else {
            // Insert data into the database
            $insertQuery = "INSERT INTO faculty (faculty_name,number_of_departments) 
                            VALUES (:faculty_name, :dep_num)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':faculty_name', $faculty_name);
            $insertStmt->bindParam(':dep_num', $dep_num);
            $insertStmt->execute();

            echo "Data inserted successfully";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
