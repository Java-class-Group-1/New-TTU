<?php
session_start();
include('../include/db_con.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have session or some way to identify the user, retrieve the current user's username or ID
    $username = $_SESSION['username']; // Replace this with the current user's identifier

    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];

    // Fetch the current password from the database
    $stmt = $conn->prepare("SELECT password FROM administrator WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $hashedCurrentPassword = $row['password'];

        // Check if the current password matches the one stored in the database (without rehashing)
        if ($currentPassword === $hashedCurrentPassword) {
            // Update the password in the database with the new hashed password sent from the client
            $updateStmt = $conn->prepare("UPDATE administrator SET password = :password WHERE username = :username");
            $updateStmt->bindParam(':password', $newPassword);
            $updateStmt->bindParam(':username', $username);
            $updateStmt->execute();

            echo "success";
        } else {
            echo "Incorrect current password"; // Send error message back to the AJAX request
        }
    } else {
        echo "User not found"; // Send error message back to the AJAX request
    }

    $conn = null; // Close the database connection
}
?>
