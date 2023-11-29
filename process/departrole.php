
<?php
include('../include/db_con.php');

try {

    $sql = "SELECT department, COUNT(*) AS total_students FROM students GROUP BY department";
    $stmt = $conn->query($sql);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($data);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
