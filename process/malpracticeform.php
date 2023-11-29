<?php
include('../include/db_con.php');

try{
 // Prepare and execute the SQL query
 $stmt = $conn->prepare("SELECT
 
 `student_index`,
`student_name`,
`student_department_id` AS Department,
`course_code` AS Course,
`supervisor_name`,

`supervisor_role`,
`room_id` AS Hall,
`date_time` AS Data_Time,
`malpractice_type`,
`item_seen` AS Item,
`description`
 
 
  FROM malpractice_reports"); // Replace 'your_table' with your actual table name
 
 $stmt->execute();

 // Fetch data as associative array
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // Set the content type to JSON
 header('Content-Type: application/json');

 // Output the JSON data
 echo json_encode($data);

} catch(PDOException $e) {
    // In case of error, display an error message
    echo "Error: " . $e->getMessage();
}




// try {

// // Fetch data for the DataTable
// $stmt = $conn->prepare("
// SELECT
    
//     `student_index`,
//     `student_name`,
//     `student_department_id` AS Department,
//     `course_code` AS Course,
//     `supervisor_name`,
    
//     `supervisor_role`,
//     `room_id` AS Hall,
//     `date_time` AS Data_Time,
//     `malpractice_type`,
   
//     `item_seen` AS Item,
//     `description`
// FROM
//     `malpractice_reports`;

// ");
// $stmt->bindParam(':department_id', $_POST['department']); // Assuming 'department' is posted from the form
// $stmt->execute();
// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// if (count($data) > 0) {
//     echo json_encode($data);
// } else {
//     echo json_encode(array('error' => 'No data found for the selected criteria'));
// }

// echo json_encode(['data' => $result]);

// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>