<?php
include('../include/db_con.php');


    if (isset($_GET['id'])) {
        $RoomID = $_GET['id'];

        try {
            // Delete the corresponding row
            $stmt = $conn->prepare("DELETE FROM room WHERE id = :room");
            $stmt->bindParam(':room', $RoomID);
            $stmt->execute();

            echo "RoomID with ID $RoomID has been deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid room ID";
    }

?>
