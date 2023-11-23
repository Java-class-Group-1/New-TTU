<?php
include('../include/db_con.php');


    if (isset($_GET['id'])) {
        $facultyId = $_GET['id'];

        try {
            // Delete the corresponding row
            $stmt = $conn->prepare("DELETE FROM faculty WHERE id = :facultyId");
            $stmt->bindParam(':facultyId', $facultyId);
            $stmt->execute();

            echo "Faculty with ID $facultyId has been deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid faculty ID";
    }

?>
