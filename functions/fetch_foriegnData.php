<?php
// fetch_forign-Data.php

include('../include/db_con.php');

function fetchFacultyData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, faculty_name FROM Faculty");
        $stmt->execute();
        $facultyList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $facultyList;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// You can add more functions for other database operations as needed.
function fetchDepartmentData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, depart_name FROM department");
        $stmt->execute();
        $departmentList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $departmentList;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
// You can add more functions for other database operations as needed.
function fetchRoomData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, room_name,location FROM room");
        $stmt->execute();
        $room = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $room;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function fetchmalData() {
    global $conn;

    try {
        $stmt = $conn->query("SELECT * FROM malpractice_reports");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

?>
