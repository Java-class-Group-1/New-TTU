<?php
include('../include/db_con.php');


    if (isset($_GET['id'])) {
        $courseId = $_GET['id'];

        try {
            // Delete the corresponding row
            $stmt = $conn->prepare("DELETE FROM course_level WHERE id = :course");
            $stmt->bindParam(':course', $courseId);
            $stmt->execute();

            echo "courseId with ID $courseId has been deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid course ID";
    }

?>
