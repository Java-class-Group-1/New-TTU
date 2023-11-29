<?php
include("../include/db_connect.php"); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $day = $_POST['day'];
    $date = $_POST['date'];
    $course_id = $_POST['coursename'];
    $course_level_id = $_POST['courselevel'];
    $program_id = $_POST['program'];
    $department_id = $_POST['Department_id'];
    $faculty_id = $_POST['Faculty_id'];
    $session = $_POST['session'];
    $time_start = $_POST['timest'];
    $time_end = $_POST['timeend'];
    $students = $_POST['students'];
    $hall = $_POST['hall'];
    $invigilator_id = $_POST['invigilator'];

    // Prepare SQL statement
    $sql = "INSERT INTO exams (day, date, course_id, course_level_id, program_id, department_id, faculty_id, session, time_start, time_end, students, hall, invigilator_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    // Bind parameters and execute
    $stmt->execute([$day, $date, $course_id, $course_level_id, $program_id, $department_id, $faculty_id, $session, $time_start, $time_end, $students, $hall, $invigilator_id]);

    if ($stmt) {
        echo "Success";
    } else {
        echo "Error";
    }
}
?>
