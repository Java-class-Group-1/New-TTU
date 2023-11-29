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
 
) AS subquery
GROUP BY Room_names, Exams_hall, Locations, Year, Semester;

");
// Assuming 'department' is posted from the form
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // Set the content type to JSON
 header('Content-Type: application/json');

 // Output the JSON data
 echo json_encode($data);

} catch(PDOException $e) {
    // In case of error, display an error message
    echo "Error: " . $e->getMessage();
}

?>