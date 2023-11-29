<?php
include('../include/db_con.php');

try {

// Fetch data for the DataTable
// $stmt = $conn->prepare("
// SELECT ro.room_name AS Room_names, r.hall as Exams_hall, ro.room_size AS Actual_Size, r.students AS Total_Student,ro.room_size - r.students AS Room_left, ro.location As Locations,rl.acdyr AS Year,rl.sem AS Semester
// FROM room ro
// INNER JOIN exams r ON ro.room_name = r.hall
// INNER JOIN rollover rl ON rl.acdyr = r.acdyr AND rl.sem = r.sem 
// where ro.location = :location;
// ");

$stmt = $conn -> prepare("
SELECT Room_names, Exams_hall, (Actual_Size) AS Total_Size, SUM(Total_Student) AS Total_Students,
       ((Actual_Size) - SUM(Total_Student)) AS Room_left,
       Locations, Year, Semester
FROM (
    SELECT ro.room_name AS Room_names, r.hall AS Exams_hall, 
           ro.room_size AS Actual_Size, r.students AS Total_Student,
           ro.location AS Locations, rl.acdyr AS Year, rl.sem AS Semester
    FROM room ro
    INNER JOIN exams r ON ro.room_name = r.hall
    INNER JOIN rollover rl ON rl.acdyr = r.acdyr AND rl.sem = r.sem
    WHERE ro.location = :location
) AS subquery
GROUP BY Room_names, Exams_hall, Locations, Year, Semester;

");
$stmt->bindParam(':location', $_POST['location']); // Assuming 'department' is posted from the form
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