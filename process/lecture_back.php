<?php
// lecture_form.php

include('../include/db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle form submission and insert data into the database (Lecture Table)
        $lec_name = $_POST['lec_name'];
        $phone = $_POST['phone'];
        $course_taught = $_POST['course_taught'];
        $Department_id = $_POST['Department_id'];
        $Faculty_id = $_POST['Faculty_id'];
        $date = $_POST['date'];

        // Check if the record already exists
        $existingRecordQuery = "SELECT id FROM Lectures WHERE lec_name = :lec_name AND course_taught = :course_taught AND Department_id = :Department_id ";
        $existingStmt = $conn->prepare($existingRecordQuery);
        $existingStmt->bindParam(':lec_name', $lec_name);
        $existingStmt->bindParam(':course_taught', $course_taught);
        $existingStmt->bindParam(':Department_id', $Department_id);
        $existingStmt->execute();

        $existingRecord = $existingStmt->fetch(PDO::FETCH_ASSOC);

        if ($existingRecord) {
            // Record already exists, throw an error
            echo "Error: Lecture with the course in the same Department is already in the system";
        } else {
            // Insert data into the database
            $insertQuery = "INSERT INTO Lectures (lec_name, phone, course_taught, Department_id,Faculty_id, date) 
            VALUES (:lec_name, :phone, :course_taught,:Department_id, :Faculty_id, :date)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':lec_name', $lec_name);
            $insertStmt->bindParam(':phone', $phone);
            $insertStmt->bindParam(':course_taught', $course_taught);
            $insertStmt->bindParam(':Department_id', $Department_id);
            $insertStmt->bindParam(':Faculty_id', $Faculty_id);
            $insertStmt->bindParam(':date', $date);
            $insertStmt->execute();

            echo "Data inserted successfully";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
