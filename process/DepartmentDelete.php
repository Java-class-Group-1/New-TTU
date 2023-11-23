<?php
include('../include/db_con.php');


    if (isset($_GET['id'])) {
        $department = $_GET['id'];

        try {
            // Delete the corresponding row
            $stmt = $conn->prepare("DELETE FROM department WHERE id = :department");
            $stmt->bindParam(':department', $department);
            $stmt->execute();

            echo "department with ID $department has been deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid faculty ID";
    }

?>
