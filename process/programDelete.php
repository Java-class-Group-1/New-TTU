<?php
include('../include/db_con.php');


    if (isset($_GET['id'])) {
        $programID = $_GET['id'];

        try {
            // Delete the corresponding row
            $stmt = $conn->prepare("DELETE FROM program WHERE id = :programID");
            $stmt->bindParam(':programID', $programID);
            $stmt->execute();

            echo "Program with ID $programID has been deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid Program ID";
    }

?>
