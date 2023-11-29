<?php
if (isset($_POST['classSelect'])) {
    $selectedClass = strtoupper($_POST['classSelect']);
     

    // Database credentials
    $host = "localhost";
    $dbname = "inbit_school_fees";
    $username = "root";
    $password = "";

    try {
        // Create a PDO connection
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT acdyr, term FROM tblcurracdyr";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $acdyr = $row['acdyr'];
            $term = $row['term'];
        }

        // Query to fetch student data and calculate balances
//         $query = "
//         SELECT
//     cp.studentID,
//     CONCAT(cp.Fname, ' ', cp.midName, ' ', cp.SurName) AS full_name,
//     cp.class,
//     cp.acdyr AS acdyr,
//     cp.term AS term,
//     fs.fees AS total_fees,
//     SUM(IFNULL(fr.feesPaid, 0)) AS total_payment_made,
//     (fs.fees - SUM(IFNULL(fr.feesPaid, 0))) AS balance
// FROM
//     class_page AS cp
// LEFT JOIN
//     fee_settings AS fs ON cp.class = fs.class_name
// LEFT JOIN
//     feesrecord AS fr ON cp.StudentID = fr.StudentID
// LEFT JOIN
//     classid AS ct ON cp.StudentID = ct.StudentID
// WHERE cp.term = fs.term AND fs.term = fr.term AND
//     cp.class = :selectedClass AND 
//     (cp.acdyr = :acdyr AND fs.term = :term)
// GROUP BY
//     full_name, cp.class, acdyr, term, total_fees

//         ";


//     SELECT
//         cp.studentID,
//         CONCAT(cp.Fname, ' ', cp.midName, ' ', cp.SurName) AS full_name,
//         cp.class,
//         cp.acdyr AS acdyr,
//         cp.term AS term,
//         fs.fees AS total_fees,
//         SUM(IFNULL(fr.feesPaid, 0)) AS total_payment_made,
//         (fs.fees - SUM(IFNULL(fr.feesPaid, 0))) AS balance
//     FROM
//         class_page AS cp
//     LEFT JOIN
//         fee_settings AS fs ON cp.class = fs.class_name
//     LEFT JOIN
//         feesrecord AS fr ON cp.StudentID = fr.StudentID
//     WHERE
//         cp.term = fs.term AND fs.term = fr.term AND
//         cp.class = :selectedClass AND 
//         (cp.acdyr = :acdyr AND fs.term = :term)
//     GROUP BY
//         cp.studentID, full_name, cp.class, acdyr, term, total_fees;
// ";

$query = "
    SELECT
        cp.studentID,
        CONCAT(cp.Fname, ' ', cp.midName, ' ', cp.SurName) AS full_name,
        cp.class,
        cp.acdyr AS acdyr,
        cp.term AS term,
        fs.fees AS total_fees,
        COALESCE(SUM(IFNULL(fr.feesPaid, 0)), 0) AS total_payment_made,
        (fs.fees - COALESCE(SUM(IFNULL(fr.feesPaid, 0)), 0)) AS balance
    FROM
        class_page AS cp
    LEFT JOIN
        fee_settings AS fs ON cp.class = fs.class_name
    LEFT JOIN
        feesrecord AS fr ON cp.StudentID = fr.StudentID AND cp.term = fr.term
    WHERE
        cp.class = :selectedClass AND 
        (cp.acdyr = :acdyr AND fs.term = :term)
    GROUP BY
        cp.studentID, full_name, cp.class, acdyr, term, total_fees;
";

// Execute the query with your database connection and parameters
// Make sure to bind the parameters (:selectedClass, :acdyr, :term) before executing the query
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':selectedClass', $selectedClass, PDO::PARAM_STR);
        $stmt->bindParam(':acdyr', $acdyr, PDO::PARAM_STR);
        $stmt->bindParam(':term', $term, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) > 0) {
            echo json_encode($data);
        } else {
            echo json_encode(array('error' => 'No data found for the selected criteria'));
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "No class selected";
}
?>
