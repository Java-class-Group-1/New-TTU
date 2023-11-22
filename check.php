<?php
session_start();

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
        $username = $_POST['username'];
        $hashedPassword = $_POST['password'];

        // Use prepared statements to prevent SQL injection
        $stmt = $pdo->prepare("SELECT * FROM administrator WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Login successful
            $_SESSION['username'] = $username;
            echo 'success'; // send 'success' to the AJAX request
            exit();
        } else {
            // Login failed
            $_SESSION['login_error'] = "Invalid username or password";
            echo 'failure'; // send 'failure' to the AJAX request
            exit();
        }
    } catch (PDOException $e) {
        // Handle database connection errors
        $_SESSION['login_error'] = "Database error: " . $e->getMessage();
        echo 'error'; // send 'error' to the AJAX request
        exit();
    }
} else {
    // If the request is not a POST request, redirect to the login page
    header("Location: index.php");
    exit();
}
?>
