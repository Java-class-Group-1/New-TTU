<?php
include('../include/db_con.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        // Check if a file is uploaded and handle it
        if(isset($_FILES['studentImage']) && $_FILES['studentImage']['error'] === UPLOAD_ERR_OK) {
            $fileName = $_FILES['studentImage']['name'];
            $targetDir = "../mypic/"; // Update the target directory as needed
            $targetFilePath = $targetDir . $fileName;
            
            // Move the uploaded file to the target directory
            move_uploaded_file($_FILES['studentImage']['tmp_name'], $targetFilePath);
        } else {
            $targetFilePath = ''; // If no file is uploaded, set an empty string or handle it differently based on your requirements
        }

        // Prepare SQL statement to insert form data into the database
        $stmt = $conn->prepare("INSERT INTO malpractice_reports (student_index, student_name, student_department_id, course_code, supervisor_name, supervisor_department_id, supervisor_role, room_id, date_time, malpractice_type, student_image, item_seen, description) VALUES (:student_index, :student_name, :student_department_id, :courseCode, :supervisor_name, :supervisor_department_id, :supervisor_role, :room_id, :date_time, :malpractice_type, :student_image, :item_seen, :description)");

        // Bind parameters to the prepared statement
        $stmt->bindParam(':student_index', $_POST['studentIndex']);
        $stmt->bindParam(':student_name', $_POST['studentName']);
        $stmt->bindParam(':student_department_id', $_POST['Department_id']);
        $stmt->bindParam(':courseCode', $_POST['courseCode']);
        $stmt->bindParam(':supervisor_name', $_POST['supervisorName']);
        $stmt->bindParam(':supervisor_department_id', $_POST['supervisorDepartment']);
        $stmt->bindParam(':supervisor_role', $_POST['supervisorRole']);
        $stmt->bindParam(':room_id', $_POST['room']);
        $stmt->bindParam(':date_time', $_POST['dateTime']);
        $stmt->bindParam(':malpractice_type', $_POST['malpracticeType']);
        $stmt->bindParam(':student_image', $targetFilePath); // Use $targetFilePath for the database entry
        $stmt->bindParam(':item_seen', $_POST['itemSeen']);
        $stmt->bindParam(':description', $_POST['description']);

        // Execute the prepared statement
        $stmt->execute();

        echo "Form submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null; // Close connection
}
?>
