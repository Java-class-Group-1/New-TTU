<?php
// process_login.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have validated the login credentials here

    $selectedDepartment = $_POST['department'];

    // Add more conditions based on your departments
    if ($selectedDepartment === 'Department 1A') {
        // Redirect to the studentDashboard for Department 1A
        header("Location: studentDashboard.php");
        exit;
    } elseif ($selectedDepartment === 'Department 1B') {
        // Redirect to the studentDashboard for Department 1B
        header("Location: studentDashboard.php");
        exit;
    } elseif ($selectedDepartment === 'Department 2A') {
        // Redirect to the studentDashboard for Department 2A
        header("Location: studentDashboard.php");
        exit;
    }
    // Add more conditions as needed for other departments
    else {
        // Redirect to a default page if the department is not handled
        header("Location: default_studentDashboard.php");
        exit;
    }
}
function connectToDatabase() {
    $host = "local host";
    $username = "root";
    $password = "";
    $database = "university_table";

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to authenticate user
function authenticateUser($indexNumberEmail, $password, $department) {
    $conn = connectToDatabase();

    // TODO: Implement proper SQL query to retrieve user information based on indexNumberEmail and department
    $sql = "SELECT * FROM users WHERE indexNumberEmail = '$indexNumberEmail' AND department = '$department'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct
            return $user;
        }
    }

    // Authentication failed
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $indexNumberEmail = $_POST['indexNumberEmail'];
    $password = $_POST['password'];
    $selectedDepartment = $_POST['department'];

    // Authenticate the user
    $authenticatedUser = authenticateUser($indexNumberEmail, $password, $selectedDepartment);

    if ($authenticatedUser) {
        // Start a session (replace with your session start logic)
        session_start();

        // Store user information in the session
        $_SESSION['user'] = $authenticatedUser;

        // Redirect to the dashboard
        header("Location: studentDashboard.php");
        exit;
    } else {
        // Authentication failed, redirect to login page with an error message
        header("Location: login.php?error=1");
        exit;
    }
}
?>
