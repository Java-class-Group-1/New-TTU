<!DOCTYPE html>
<html>
<head>
    <title>Add Student Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        .submitting {
            background-color: #5cb85c !important;
        }
    </style>
</head>
<body>
    <button class="btn btn-primary" id="addStudentBtn">Add Student</button>
    <div class="modal" id="studentModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form to add student data -->
                    <form id="addStudentForm">
                        <div class="mb-3">
                            <label for="studentName" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="studentName" name="studentName">
                        </div>
                        <div class="mb-3">
                            <label for="studentAge" class="form-label">Age:</label>
                            <input type="number" class="form-control" id="studentAge" name="studentAge">
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Your table content goes here -->
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample rows -->
            <tr>
                <td>John Doe</td>
                <td>25</td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>23</td>
            </tr>
            <!-- ... -->
        </tbody>
    </table>

    <!-- Bootstrap JavaScript and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#addStudentBtn").click(function() {
                $("#studentModal").modal("show");
            });

            $("#addStudentForm").submit(function(event) {
                event.preventDefault();

                var formData = {
                    studentName: $("#studentName").val(),
                    studentAge: $("#studentAge").val()
                };

                $("#submitButton").html("Adding...").addClass("submitting");

                $.ajax({
                    type: "POST",
                    url: "getdata.php", // Replace with your PHP file URL
                    data: formData,
                    success: function(response) {
                        $("#submitButton").html("Submit").removeClass("submitting");
                        setTimeout(function() {
                            $("#studentModal").modal("hide");
                        }, 4000); // Hide modal after 4 seconds
                        alert("Student data added successfully!");
                    },
                    error: function(error) {
                        console.error("Error:", error);
                        $("#submitButton").html("Submit").removeClass("submitting");
                    }
                });

                setTimeout(function() {
                    $("#submitButton").html("Submit").removeClass("submitting");
                }, 4000); // Revert button state after 4 seconds
            });
        });
    </script>
</body>
</html>
