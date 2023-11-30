<?php
session_start();
include('../include/db_con.php');

    try {
        // Retrieve acdyr and sem from the academic table
        $academicQuery = 'SELECT acdyr, sem FROM rollover LIMIT 1';
        // Adjust your query as needed      to retrieve the specific acdyr and sem
        $academicStmt = $conn->query( $academicQuery );
        $academicData = $academicStmt->fetch( PDO::FETCH_ASSOC );

        if ( $academicData ) {
            $acdyr = $academicData[ 'acdyr' ];
            $sem = $academicData[ 'sem' ];

        // Update the password in the database with the new hashed password sent from the client
        $updateStmt = $conn->prepare("UPDATE exams SET seen= 'S' where acdyr = :acdyr and sem = :sem");
        $updateStmt->bindParam(':acdyr', $acdyr);
        $updateStmt->bindParam(':sem', $sem);
        $updateStmt->execute();
        // echo print_r($acdyr);    
                echo "Data Updated successfully";
        }else {
            echo "No New Academic year or Sem Found";
        }
    } catch (\Throwable $th) {
        echo $th->error_log;
    }
        

?>
