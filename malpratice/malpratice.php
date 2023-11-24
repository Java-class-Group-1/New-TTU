<?php
// Assuming you have a database connection
$conn = new mysqli("localhost", "root", "", "ttu_project");

// Fetch rooms from the 'room' table
$roomQuery = "SELECT * FROM room";
$roomResult = $conn->query($roomQuery);

// Fetch department from the 'department' table
$departmentQuery = "SELECT * FROM department";
$departmentResult = $conn->query($departmentQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exams Malpractice Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            background-color: #0632ad;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }
        .malpractice-form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px; /* Adjust the maximum width as needed */
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="malpractice-form">
            <form method="POST" id="malpracticeForm" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="studentIndex" class="form-label">Student Index Number:</label>
                    <input type="text" class="form-control" id="studentIndex" name="studentIndex" placeholder="Student Index" required>
                </div>
                <div class="mb-3">
                    <label for="studentName" class="form-label">Student Name:</label>
                    <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student name" required>
                </div>
                <div class="mb-3">
                    <label for="studentDepartment" class="form-label">Student Department:</label>
                    <select class="form-select" id="studentDepartment" name="studentDepartment" required>
                        <option value="" selected disabled>Select Student Department</option>
                        <?php while ($departments = $departmentResult->fetch_assoc()) : ?>
                            <option value="<?php echo $departments['id']; ?>"><?php echo $departments['depart_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="courseCode" class="form-label">Course Code:</label>
                    <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="Course code" required>
                </div>
                <div class="mb-3">
                    <label for="supervisorName" class="form-label">Supervisor Name:</label>
                    <input type="text" class="form-control" id="supervisorName" name="supervisorName" placeholder="Supervisor's Name" required>
                </div>
                <div class="mb-3">
                    <label for="supervisorDepartment" class="form-label">Supervisor Department:</label>
                      <select class="form-select" id="supervisorDepartment" name="supervisorDepartment" placeholder="Supervisor's department" required>
                         <option value="" selected disabled>Select Supervisor Department</option>
                         <?php while ($departments = $departmentResult->fetch_assoc()) : ?>
                            <option value="<?php echo $departments['id']; ?>"><?php echo $departments['depart_name']; ?></option>
                         <?php endwhile; ?>
                     </select>
                </div>
                <div class="mb-3">
                    <label for="supervisorRole" class="form-label">Supervisor Role/Position:</label>
                    <input type="text" class="form-control" id="supervisorRole" name="supervisorRole" placeholder="Supervisor's role" required>
                </div>
                <div class="mb-3">
                    <label for="room" class="form-label">Room where Incident Happened:</label>
                    <select class="form-select" id="room" name="room" required>
                        <option value="" selected disabled>Select Room</option>
                        <?php while ($room = $roomResult->fetch_assoc()) : ?>
                            <option value="<?php echo $room['room_name']; ?>"><?php echo $room['room_name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dateTime" class="form-label">Date and Time of Incident:</label>
                    <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" placeholder="date and time of incident" required>
                </div>
                <div class="mb-3">
                    <label for="malpracticeType" class="form-label">Malpractice Type:</label>
                    <select class="form-select" id="malpracticeType" name="malpracticeType" required>
                        <option value="" selected disabled>Select Malpractice Type</option>
                        <option value="Copying">Copying</option>
                        <option value="Using Unauthorized Materials">Using Unauthorized Materials</option>
                        <option value="Impersonation">Impersonation</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="studentImage" class="form-label">Upload Student's Image:</label>
                    <input type="file" class="form-control" id="studentImage" name="studentImage" accept="image/*"  required>
                </div>
                <div class="mb-3">
                    <label for="itemSeen" class="form-label">Item Seen:</label>
                    <textarea class="form-control" id="itemSeen" name="itemSeen" placeholder="item seen" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Brief Description:</label>
                    <textarea class="form-control" id="description" name="description" placeholder="brief description of  incicent" required></textarea>
                </div>
                <button type="button" class="btn btn-danger btn-block" onclick="submitForm()">Submit Malpractice Report</button>
            </form>
        </div>
    </div>

    <!-- Your footer and other HTML content here -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function submitForm() {
            var form = document.getElementById('malpracticeForm');
            form.submit();
        }

        <?php
        if (isset($_SESSION['malpractice_success']) && $_SESSION['malpractice_success']) {
            echo 'alert("Malpractice report submitted successfully.");';
            unset($_SESSION['malpractice_success']); // Clear the success message
        }
        ?>
    </script>
</body>
</html>
