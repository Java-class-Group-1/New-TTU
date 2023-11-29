<?php
include('../include/db_con.php');

try {

// Fetch data for the DataTable
$stmt = $conn->prepare("
SELECT CONCAT(e.day, ', ', e.date) AS day_date,
       CONCAT(cl.course_level, ' in ', p.prog_name) AS course_program,
       c.coursename AS course,
       d.depart_name AS department,
       f.faculty_name AS faculty,
       CONCAT(TIME_FORMAT(e.time_start, '%h:%i %p'), ' to ', TIME_FORMAT(e.time_end, '%h:%i %p')) AS time_range,
       e.session,
       e.hall,
       i.lec_name AS invigilator,
       e.acdyr,
       e.sem
FROM exams e
LEFT JOIN courses c ON e.course_id = c.id
LEFT JOIN course_level cl ON e.course_level_id = cl.id
LEFT JOIN program p ON e.program_id = p.id
LEFT JOIN department d ON e.department_id = d.id
LEFT JOIN faculty f ON e.faculty_id = f.id
LEFT JOIN lectures i ON e.invigilator_id = i.id
WHERE e.department_id = :department_id
");
$stmt->bindParam(':department_id', $_POST['department']); // Assuming 'department' is posted from the form
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $result = [];
// foreach ($data as $row) {
//     $result[] = [
//         'day' => $row['day'],
//         'date' => $row['date'],
//         'course_id' => $row['course_id'],
//         'course_level_id' => $row['course_level_id'],
//         'program_id' => $row['program_id'],
//         'department_id' => $row['department_id'],
//         'faculty_id' => $row['faculty_id'],
//         'session' => $row['session'],
//         'time_start' => $row['time_start'],
//         'time_end' => $row['time_end'],
//         'hall' => $row['hall'],
//         'invigilator_id' => $row['invigilator_id'],
//         'acdyr' => $row['acdyr'],
//         'sem' => $row['sem']
//     ];
// }

if (count($data) > 0) {
    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'No data found for the selected criteria'));
}

// echo json_encode(['data' => $result]);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>