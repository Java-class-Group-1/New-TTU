<?php
// fetch_department_data.php

include('fetch_foriegnData.php');

if ($_GET['action'] === 'fetchDepartmentTable') {
    try {
        // Fetch department data from the database
        $stmt = $conn->prepare("SELECT id, depart_name, faculty_name, date FROM Department");
        $stmt->execute();
        $departmentList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display department data in DataTable
        echo "<table id='departmentTable' class='display' style='width:100%'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Faculty</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>";

        foreach ($departmentList as $department) {
            echo "<tr>
                    <td>{$department['id']}</td>
                    <td>{$department['depart_name']}</td>
                    <td>{$department['faculty_name']}</td>
                    <td>{$department['date']}</td>
                </tr>";
        }

        echo "</tbody></table>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
