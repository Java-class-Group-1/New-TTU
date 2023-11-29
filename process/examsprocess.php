<?php
include( '../include/db_con.php' );

if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    $day = $_POST[ 'day' ];
    $date = $_POST[ 'date' ];
    $course_id = $_POST[ 'coursename' ];
    $course_level_id = $_POST[ 'courselevel' ];
    $program_id = $_POST[ 'program' ];
    $department_id = $_POST[ 'Department_id' ];
    $faculty_id = $_POST[ 'Faculty_id' ];
    $session = $_POST[ 'session' ];
    $time_start = $_POST[ 'timest' ];
    $time_end = $_POST[ 'timeend' ];
    $students = $_POST[ 'students' ];
    $hall = $_POST[ 'hall' ];
    $invigilator_id = $_POST[ 'invigilator' ];

    // Validation and Sanitization
    $day = filter_var( $day, FILTER_SANITIZE_STRING );
    $date = filter_var( $date, FILTER_SANITIZE_STRING );
    $course_id = filter_var( $course_id, FILTER_VALIDATE_INT );
    $course_level_id = filter_var( $course_level_id, FILTER_VALIDATE_INT );
    $program_id = filter_var( $program_id, FILTER_VALIDATE_INT );
    $department_id = filter_var( $department_id, FILTER_VALIDATE_INT );
    $faculty_id = filter_var( $faculty_id, FILTER_VALIDATE_INT );
    $session = filter_var( $session, FILTER_SANITIZE_STRING );
    $time_start = filter_var( $time_start, FILTER_SANITIZE_STRING );
    $time_end = filter_var( $time_end, FILTER_SANITIZE_STRING );
    $students = filter_var( $students, FILTER_VALIDATE_INT );
    $hall = filter_var( $hall, FILTER_SANITIZE_STRING );
    $invigilator_id = filter_var( $invigilator_id, FILTER_VALIDATE_INT );

    if (
        $day && $date && $course_id !== false &&
        $course_level_id !== false && $program_id !== false &&
        $department_id !== false && $faculty_id !== false &&
        $session && $time_start && $time_end &&
        $students !== false && $hall && $invigilator_id !== false
    ) {

        // Retrieve acdyr and sem from the academic table
        $academicQuery = 'SELECT acdyr, sem FROM rollover LIMIT 1';
        // Adjust your query as needed      to retrieve the specific acdyr and sem
        $academicStmt = $conn->query( $academicQuery );
        $academicData = $academicStmt->fetch( PDO::FETCH_ASSOC );

        if ( $academicData ) {
            $acdyr = $academicData[ 'acdyr' ];
            $sem = $academicData[ 'sem' ];

            // Check if the combination of acdyr, sem, course, program, course_level, and department exists in the exams table
            $checkQuery = 'SELECT COUNT(*) AS count FROM exams WHERE acdyr = ? AND sem = ? AND course_id = ? AND program_id = ? AND course_level_id = ? AND department_id = ?';

            $checkStmt = $conn->prepare( $checkQuery );
            $checkStmt->execute( [ $acdyr, $sem, $course_id, $program_id, $course_level_id, $department_id ] );
            $result = $checkStmt->fetch( PDO::FETCH_ASSOC );

            if ( $result[ 'count' ] > 0 ) {

                header( 'Content-Type: application/json' );
                echo json_encode( [ 'status' => 'Error' ] );

            } else {

                // Fetching hall size from the room table
                $roomQuery = 'SELECT room_size FROM room WHERE room_name = ?';
                $roomStmt = $conn->prepare( $roomQuery );
                $roomStmt->execute( [ $hall ] );
                // Replace $hall_id with the actual hall ID
                $hallSize = $roomStmt->fetchColumn();

                // Check if the number of students exceeds the hall size
                if ( $students >= $hallSize ) {
                    header( 'Content-Type: application/json' );
                    echo json_encode( [ 'status' => 'Errors', 'message' => 'Number of students exceeds room size' ] );
                } else {
                    // Proceed with inserting data into exams table
                    $insertQuery = "INSERT INTO exams (day, date, course_id, course_level_id, program_id, department_id, faculty_id, session, time_start, time_end, students, hall, invigilator_id, acdyr, sem)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $insertStmt = $conn->prepare( $insertQuery );

                    if (
                        $insertStmt->execute( [
                            $day, $date, $course_id, $course_level_id,
                            $program_id, $department_id, $faculty_id,
                            $session, $time_start, $time_end, $students,
                            $hall, $invigilator_id, $acdyr, $sem
                        ] )
                    ) {

                        header( 'Content-Type: application/json' );
                        echo json_encode( [ 'status' => 'Successfully, Exams set' ] );
                    } else {

                        header( 'Content-Type: application/json' );
                        echo json_encode( [ 'status' => 'Error: Failed to insert Exams data.' ] );
                    }
                }
            }
        } else {

            header( 'Content-Type: application/json' );
            echo json_encode( [ 'status' => 'Error: No academic data found.' ] );

        }
    }
}

