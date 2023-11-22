<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Replace these values with your database connection details
        $dsn = 'mysql:host=localhost;dbname=ttu_project;charset=utf8';
        $username = 'root';
        $password = '';
        // Create a PDO instance
        $pdo = new PDO($dsn, $username, $password);

        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get username and hashed password from the POST data
        $adminemail = $_POST['adminemail'];
        $username = $_POST['username'];
        $hashedPassword = $_POST['password'];
        $phone = $_POST['phone'];

        // Check if the username already exists in the database
        $checkUsernameStmt = $pdo->prepare("SELECT * FROM administrator WHERE username = :username");
        $checkUsernameStmt->bindParam(':username', $username);
        $checkUsernameStmt->execute();

        if ($checkUsernameStmt->rowCount() > 0) {
            // Username already exists, handle accordingly (e.g., show an error message)
            echo 'Username already exists';
            exit();
        }

        // Insert the new user into the database
        $insertUserStmt = $pdo->prepare("INSERT INTO administrator (admin_email, username, password, phone) VALUES (:adminemail,:username, :password,:phone)");
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
    header("Location: signup.php");
    exit();
}
?>
