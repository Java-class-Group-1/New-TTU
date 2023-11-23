<?php
// fetch_forign-Data.php

include('../include/db_con.php');

    // Assuming your table name is 'student_notices'
    $query = "SELECT * FROM notice";
    $stmt = $conn->query($query);
    $notices = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output notices data as JSON (for AJAX response)
    echo json_encode($notices);
$output = '';

foreach ($notices as $notice) {
    $output .= '<tr>';
    $output .= '<td class="notice-id">' . $notice['ID'] . '</td>';
    $output .= '<td>' . $notice['Name'] . '</td>';
    $output .= '<td>' . $notice['Email'] . '</td>';
    $output .= '<td>' . substr($notice['comment'], 0, 20) . '......</td>';
    $output .= '<td>' . $notice['Date'] . '</td>';
    $output .= '<td>' . $notice['Department'] . '</td>';
    $output .= '<td>' . $notice['Faculty'] . '</td>';
    $output .= '<td><button class="btn btn-primary view-btn">View</button></td>';
    $output .= '</tr>';
}

echo $output;
?>
