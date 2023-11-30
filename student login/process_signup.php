<?php
session_start();

// Function to connect to the database (replace with your database connection logic)
function connectToDatabase() {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "ttu_project";

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $indexNumberEmail = $_POST['indexNumberEmail'];
    $password = $_POST['password'];
    $confirmedPassword = $_POST['confirmedPassword'];
    $selectedFaculty = $_POST['faculty'];
    $selectedDepartment = $_POST['department'];

    // Check if passwords match
    if ($password !== $confirmedPassword) {
        // Passwords do not match, handle error
        die("Error: Passwords do not match.");
    }

    $conn = connectToDatabase();

    // Use prepared statements to prevent SQL injection
    $facultyQuery = $conn->prepare("SELECT id FROM faculty WHERE faculty_name = ?");
    echo "Selected Faculty: " . $selectedFaculty . "<br>";
    
    if (!$facultyQuery) {
        die("Error preparing faculty query: " . $conn->error);
    }

    $facultyQuery->bind_param("s", $selectedFaculty);
    $facultyQuery->execute();

    if ($facultyQuery->error) {
        die("Error executing faculty query: " . $facultyQuery->error);
    }

    $facultyResult = $facultyQuery->get_result();

    if ($facultyResult->num_rows === 0) {
        die("Error: Faculty not found.");
    }

    $facultyRow = $facultyResult->fetch_assoc();
    $facultyId = $facultyRow['id'];
    $facultyQuery->close();

    echo "Faculty Query Result: ";
    var_dump($facultyResult);

    $departmentQuery = $conn->prepare("SELECT id FROM department WHERE depart_name = ?");
    $departmentQuery->bind_param("s", $selectedDepartment);
    $departmentQuery->execute();
    $departmentResult = $departmentQuery->get_result();
    
    if ($departmentResult->num_rows === 0) {
        die("Error: Department not found.");
    }

    $departmentRow = $departmentResult->fetch_assoc();
    $departmentId = $departmentRow['id'];
    $departmentQuery->close();

    // Use prepared statement for INSERT query
    $insertQuery = $conn->prepare("INSERT INTO students (index_number_email, password, faculty_id, department_id) 
                                   VALUES (?, ?, ?, ?)");
    if (!$insertQuery) {
        die("Error preparing insert query: " . $conn->error);
    }

    $insertQuery->bind_param("ssii", $indexNumberEmail, $password, $facultyId, $departmentId);

    if (!$insertQuery->execute()) {
        die("Error executing insert query: " . $insertQuery->error);
    }

   $insertQuery->close();
    $conn->close();
}
?>
