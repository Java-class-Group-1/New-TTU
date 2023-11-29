<?php
include('../include/db_con.php');

try {

// Fetch data for the DataTable
$stmt = $conn->prepare("
SELECT day, date, course_id, course_level_id, program_id, department_id, faculty_id, session,
time_start, time_end, hall, invigilator_id, acdyr, sem
FROM exams
WHERE department_id = :department_id
");
$stmt->bindParam(':department_id', $_POST['department']); // Assuming 'department' is posted from the form
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result = [];
foreach ($data as $row) {
    $result[] = [
        'day' => $row['day'],
        'date' => $row['date'],
        'course_id' => $row['course_id'],
        'course_level_id' => $row['course_level_id'],
        'program_id' => $row['program_id'],
        'department_id' => $row['department_id'],
        'faculty_id' => $row['faculty_id'],
        'session' => $row['session'],
        'time_start' => $row['time_start'],
        'time_end' => $row['time_end'],
        'hall' => $row['hall'],
        'invigilator_id' => $row['invigilator_id'],
        'acdyr' => $row['acdyr'],
        'sem' => $row['sem']
    ];
}


echo json_encode(['data' => $result]);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>