<?php
include('../include/db_con.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
    
        // Get username and hashed password from the POST data
        $adminemail = $_POST['adminemail'];
        $username = $_POST['username'];
        $hashedPassword = $_POST['password'];
        $phone = $_POST['phone'];

        // Check if the username already exists in the database
        $checkUsernameStmt = $conn->prepare("SELECT * FROM administrator WHERE username = :username AND admin_email = :adminemail");
        $checkUsernameStmt->bindParam(':username', $username);
        $checkUsernameStmt->bindParam(':adminemail', $adminemail);
        $checkUsernameStmt->execute();

        if ($checkUsernameStmt->rowCount() > 0) {
            // Username already exists, handle accordingly (e.g., show an error message)
            echo 'Username And Admin Email already exists';
            exit();
        }

        // Insert the new user into the database
        $insertUserStmt = $conn->prepare("INSERT INTO administrator (admin_email, username, password, phone) VALUES (:adminemail,:username, :password,:phone)");
        $insertUserStmt->bindParam(':adminemail', $adminemail);
        $insertUserStmt->bindParam(':username', $username);
        $insertUserStmt->bindParam(':password', $hashedPassword);
        $insertUserStmt->bindParam(':phone', $phone);
        $insertUserStmt->execute();

        // Registration successful
        echo 'success';
        exit();
    } catch (PDOException $e) {
        // Handle database connection errors
        echo 'Database error: ' . $e->getMessage();
        exit();
    }
} else {
    // If the request is not a POST request, redirect to the signup page
    header("Location: ../pageTable/dashboard.php");
    exit();
}
?>
