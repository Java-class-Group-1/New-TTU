<?php
// fetch_forign-Data.php

include('../include/db_con.php');

function fetchAndDisplayFacultyTable() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, lec_name, phone, course_taught,Department_id, Faculty_id, date FROM Lectures");
        $stmt->execute();
        $facultyList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table id='example' class='display' style='width:100%'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Lecture Name</th>
                        <th>Phone</th>
                        <th>Course Taught</th>
                        <th>Department</th>
                        <th>Faculty</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($facultyList as $faculty) {
            
              // Fetch faculty name using faculty_id
              $facultyId = $faculty['Faculty_id'];
              $facultyStmt = $conn->prepare("SELECT faculty_name FROM faculty WHERE id = :Faculty_id");
              $facultyStmt->bindParam(':Faculty_id', $facultyId);
              $facultyStmt->execute();
              $facultyData = $facultyStmt->fetch(PDO::FETCH_ASSOC);
              $facultyName = $facultyData['faculty_name'];

              // Fetch faculty name using faculty_id
              $DepID = $faculty['Department_id'];
              $facultyStmt = $conn->prepare("SELECT depart_name FROM department WHERE id = :Department_id");
              $facultyStmt->bindParam(':Department_id', $DepID);
              $facultyStmt->execute();
              $facultyData = $facultyStmt->fetch(PDO::FETCH_ASSOC);
              $DepName = $facultyData['depart_name'];

            echo "<tr>
            <td>{$faculty['id']}</td>
            <td>{$faculty['lec_name']}</td>
            <td>{$faculty['phone']}</td>
            <td>{$faculty['course_taught']}</td>
            <td>{$DepName}</td>
            <td>{$facultyName}</td>
            <td>{$faculty['date']}</td>
            <td>
            <button class='btn btn-danger deleteButton' data-id='{$faculty['id']}'>Delete</button>
        </td>
     
            </tr>";
        }
        
        echo "</tbody></table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function fetchDeaprtmentTables() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, depart_name, Faculty_id, date FROM department");
        $stmt->execute();
        $facultyList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table id='example' class='display' style='width:100%'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
       
                        <th>Faculty</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($facultyList as $faculty) {

            
              // Fetch faculty name using faculty_id
              $facultyId = $faculty['Faculty_id'];
              $facultyStmt = $conn->prepare("SELECT faculty_name FROM faculty WHERE id = :Faculty_id");
              $facultyStmt->bindParam(':Faculty_id', $facultyId);
              $facultyStmt->execute();
              $facultyData = $facultyStmt->fetch(PDO::FETCH_ASSOC);
              $facultyName = $facultyData['faculty_name'];

            
            echo "<tr>
            <td>{$faculty['id']}</td>
            <td>{$faculty['depart_name']}</td>
            <td>{$facultyName}</td>
            <td>{$faculty['date']}</td>
            <td>
            <button class='btn btn-danger deleteButton' data-id='{$faculty['id']}'>Delete</button>
        </td>
     
            </tr>";
        }
        // <a href='./../process/lectureDelete?{$faculty['id']}'>
        // <button class='btn btn-danger deleteButton' data-id='{$faculty['id']}'>Delete</button></a></td>
    
        echo "</tbody></table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function fetchmainFacultyTables() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, faculty_name, number_of_departments, date FROM faculty");
        $stmt->execute();
        $facultyList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table id='example' class='display' style='width:100%'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Faculty Name</th>       
                        <th>Number_of_departments</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($facultyList as $faculty) {
            echo "<tr>
            <td>{$faculty['id']}</td>
            <td>{$faculty['faculty_name']}</td>
            <td>{$faculty['number_of_departments']}</td>
            <td>{$faculty['date']}</td>
            <td>
            <button class='btn btn-danger deleteButton' data-id='{$faculty['id']}'>Delete</button>
        </td>
     
            </tr>";
        }
        // <a href='./../process/lectureDelete?{$faculty['id']}'>
        // <button class='btn btn-danger deleteButton' data-id='{$faculty['id']}'>Delete</button></a></td>
    
        echo "</tbody></table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
function fetchprogramTables() {
    global $conn;

    try {
        $stmt = $conn->prepare("SELECT id, prog_name,department_id,	faculty_id,date FROM program");
        $stmt->execute();
        $facultyList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<table id='example' class='display' style='width:100%'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Program Name</th>       
                        <th>Departments</th>
                        <th>Faculty</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($facultyList as $faculty) {

              // Fetch faculty name using faculty_id
              $facultyId = $faculty['faculty_id'];
              $facultyStmt = $conn->prepare("SELECT faculty_name FROM faculty WHERE id = :facultyId");
              $facultyStmt->bindParam(':facultyId', $facultyId);
              $facultyStmt->execute();
              $facultyData = $facultyStmt->fetch(PDO::FETCH_ASSOC);
              $facultyName = $facultyData['faculty_name'];

              // Fetch faculty name using faculty_id
              $DepID = $faculty['department_id'];
              $facultyStmt = $conn->prepare("SELECT depart_name FROM department WHERE id = :department_id");
              $facultyStmt->bindParam(':department_id', $DepID);
              $facultyStmt->execute();
              $facultyData = $facultyStmt->fetch(PDO::FETCH_ASSOC);
              $DepName = $facultyData['depart_name'];

            echo "<tr>
            <td>{$faculty['id']}</td>
            <td>{$faculty['prog_name']}</td>
            <td>{$DepName}</td>
            <td>{$facultyName}</td>
            <td>{$faculty['date']}</td>
            <td>
            <button class='btn btn-danger deleteButton' data-id='{$faculty['id']}'>Delete</button>
        </td>
     
            </tr>";
        }
        // <a href='./../process/lectureDelete?{$faculty['id']}'>
        // <button class='btn btn-danger deleteButton' data-id='{$faculty['id']}'>Delete</button></a></td>
    
        echo "</tbody></table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Call the function if needed
if (isset($_GET['action']) && $_GET['action'] === 'fetchFacultyTable') {
    fetchAndDisplayFacultyTable();
}
// Call the function if needed
if (isset($_GET['action']) && $_GET['action'] === 'fetchDeaprtmentTable') {
    fetchDeaprtmentTables();
}
if (isset($_GET['action']) && $_GET['action'] === 'fetchmainFacultyTable') {
    fetchmainFacultyTables();
}
if (isset($_GET['action']) && $_GET['action'] === 'fetchprogramTable') {
    fetchprogramTables();
}



// Add more functions for other database operations as needed.
?>
