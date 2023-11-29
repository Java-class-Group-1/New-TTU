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
function fetchcoursesData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, coursename FROM courses");
        $stmt->execute();
        $coursesList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $coursesList;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function fetchinvigilatorData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, lec_name FROM lectures");
        $stmt->execute();
        $invigilator = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $invigilator;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


function fetchprogramData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, prog_name FROM program");
        $stmt->execute();
        $programList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $programList;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function fetchCourselevelData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, course_level FROM course_level");
        $stmt->execute();
        $courselevelList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $courselevelList;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
// You can add more functions for other database operations as needed.
function fetchRoomData() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, room_name,location,room_size FROM room");
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
<<<<<<< HEAD


 
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
=======
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8

?>
