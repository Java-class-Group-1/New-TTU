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


 
function getTotalStudents() {
    global $conn;
    try {

        $stmt = $conn->query("SELECT COUNT(*) AS total_students FROM students");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_students'];
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
 
function getTotalScience() {
    global $conn;
    try {

        $stmt = $conn->query("SELECT COUNT(*) AS total_students FROM students where faculty_id = 5");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
        return $result['total_students'];
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
 
function getTotalArt() {
    global $conn;
    try {

        $stmt = $conn->query("SELECT COUNT(*) AS total_students FROM students where faculty_id = 4");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
        return $result['total_students'];
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
 
function getTotalEng() {
    global $conn;
    try {

        $stmt = $conn->query("SELECT COUNT(*) AS total_students FROM students where faculty_id = 1");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
        return $result['total_students'];
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
 
function getTotalBuilt() {
    global $conn;
    try {

        $stmt = $conn->query("SELECT COUNT(*) AS total_students FROM students where faculty_id = 2");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
        return $result['total_students'];
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
 
function getTotalBus() {
    global $conn;
    try {

        $stmt = $conn->query("SELECT COUNT(*) AS total_students FROM students where faculty_id = 3");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

    
        return $result['total_students'];
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function getNotices() {
    global $conn;
    try {
        $stmt = $conn->prepare("SELECT title, date, notice, department 
                                FROM notices 
                                ORDER BY notice_id DESC 
                                LIMIT 3");
        $stmt->execute();

        $notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $notices;
    } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
    }
    }


// Example usage:
// $notices = getNotices();
// foreach ($notices as $notice) {
//     echo "Title: " . $notice['title'] . "<br>";
//     echo "Date: " . $notice['date'] . "<br>";
//     echo "Notice: " . $notice['notice'] . "<br>";
//     echo "Department: " . $notice['department'] . "<br>";
//     echo "<br>";
// }

?>
