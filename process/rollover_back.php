<?php
session_start();
include('../include/db_con.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $acdyr = $_POST['acdyr'];
    $sem = strtolower($_POST['sem']);
    // Update the password in the database with the new hashed password sent from the client
    $updateStmt = $conn->prepare("UPDATE rollover SET acdyr = :acdyr, sem = :sem");
    $updateStmt->bindParam(':acdyr', $acdyr);
    $updateStmt->bindParam(':sem', $sem);
    $updateStmt->execute();
    // echo print_r($acdyr);

            echo "success";
        } else {
            echo "Incorrect current password"; // Send error message back to the AJAX request
        }
    

?>
