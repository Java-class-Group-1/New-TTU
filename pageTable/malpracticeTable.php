<?php
// Include your database connection file
include('../include/db_con.php');

// include("../include/header.inc.php");
// include("../include/sidebar.inc.php");

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
// Function to fetch data
<<<<<<< HEAD
function fetchmalData() {
=======
public function fetchmalData() {
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
    global $conn; // Use the connection inside the function

    try {
        $stmt = $conn->query("SELECT * FROM malpractice_reports");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch data from the function
$malpracticeData = fetchmalData();
?>
    <style>
        /* Set the table width to 50% */
        table,tr,td {
            width: 50%;
        }
    </style>

</head>

<body>
<div class="page-wrapper">
        
        <div class="container-fluid">
        <div class="card">
            <div class="card-body">
        <h2 class="mt-4 mb-3 text-center text-info">Malpractice Reports</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <?php
                    // Generate table headers dynamically from the fetched data's keys (columns)
                    if (isset($malpracticeData) && count($malpracticeData) > 0) {
                        foreach ($malpracticeData[0] as $key => $value) {
                            echo "<th scope='col'>$key</th>";
                        }
                    } else {
                        echo "<th>No data available</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display fetched data in table rows
                if (isset($malpracticeData) && count($malpracticeData) > 0) {
                    foreach ($malpracticeData as $row) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='" . count($malpracticeData[0]) . "'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php 
// include("../include/footer.inc.php");
 

?>
