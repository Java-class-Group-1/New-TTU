<?php
// lecture_form.php

include('../include/db_con.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Handle form submission and insert data into the database (Lecture Table)
        $room_name = $_POST['roomname'];
        $room_size = $_POST['roomsize'];
        $location = $_POST['location'];
        
            // Insert data into the database
            $insertQuery = "INSERT INTO room(room_name, room_size, location) 
            VALUES (:room_name, :room_size, :location)";
            $insertStmt = $conn->prepare($insertQuery);
            $insertStmt->bindParam(':room_name', $room_name);
            $insertStmt->bindParam(':room_size', $room_size);
            $insertStmt->bindParam(':location', $location);
            $insertStmt->execute();

            echo "Success";
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
cd repository

