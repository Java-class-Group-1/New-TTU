<?php
// lecture_form.php

include('../include/db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle form submission and insert data into the database (Lecture Table)
        $courselevel = $_POST['courselevel'];
        $Course_year = $_POST['Course_year'];
        
            // Insert data into the database
            $insertQuery = "INSERT INTO course_level (course_level, year) 
            VALUES (:courselevel, :Course_year)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':courselevel', $courselevel);
            $insertStmt->bindParam(':Course_year', $Course_year);
            $insertStmt->execute();

            echo "Success";
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
cd repository

