<?php
// fetch_forign-Data.php

include('../include/db_con.php');

// Get the ID sent via POST request
$noticeId = $_POST['id'];

try {
    // Assuming your table name is 'student_notices' and the column names are 'Name', 'Comment', and 'Department'
    $query = "SELECT Name, Comment, Department FROM notice WHERE ID = :id ORDER BY ID DESC LIMIT 5";

 // Change 'ID' to your actual primary key column name
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $noticeId);
    $stmt->execute();
    $noticeDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display notice details in a modal
    if ($noticeDetails) {
        $output = '<p><strong>Name:</strong> ' . $noticeDetails['Name'] . '</p>';
        $output .= '<p><strong>Comment:</strong> ' . $noticeDetails['Comment'] . '</p>';
        $output .= '<p><strong>Department:</strong> ' . $noticeDetails['Department'] . '</p>';

        echo $output;
    } else {
        echo 'No data found for this ID';
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
