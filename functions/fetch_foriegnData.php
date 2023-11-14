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

?>
