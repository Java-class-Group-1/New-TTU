<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.js"></script>
<style>
        /* Style for the table */
        table {
            border-collapse: collapse;
            border: 2px solid black; /* Add a border to the table */
            width: 100%;
        }

        th {
            background-color: blue; /* Change header color to light green */
          color: #fff;
        }

        th, td {
            border: 1px solid black; /* Add borders to table cells */
            padding: 8px; /* Add padding for better spacing */
            text-align: left; /* Align text within cells */
        }
    </style>

</head>
<body>
<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
    
         <div class="container-fluid">
     
              <div class="card">
                <div class="card-body">

                <button id="showProgramFormButton" class="btn btn-primary">Add New Courses</button>

<div class="modal fade" id="programModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-danger text-center text-bold">Add New Courses</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="successMessage"></div>
                <form id="programForm">
                    <div class="mb-3">
                        <label for="prog_name" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="prog_name" name="prog_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="Department_id" class="form-label">Department</label>
                        <select class="form-select" id="Department_id" name="Department_id" required>
        <option value="" selected disabled>Select Department</option>
        <?php
        include('../functions/fetch_foriegnData.php'); // Assuming fetch_data.php contains the necessary code to fetch faculty data

        $departmentList = fetchDepartmentData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($departmentList as $department) {
            echo "<option value='{$department['id']}'>{$department['depart_name']}</option>";
        }
        ?>
    </select>
                    </div>
                    <div class="mb-3">
                        <label for="Faculty_id" class="form-label">Faculty</label>
                        <select class="form-select" id="Faculty_id" name="Faculty_id" required>
        <option value="" selected disabled>Select Faculty</option>
        <?php
 
        $facultyList = fetchFacultyData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($facultyList as $faculty) {
            echo "<option value='{$faculty['id']}'>{$faculty['faculty_name']}</option>";
        }
        ?>
    </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              
                </form>
            </div>
        </div>
    </div>
</div>

              

    <div class="container mt-5">
    <h2 class="text-danger text-center text-bold">Courses Details </h2>

        <div id="dataTableContainer"></div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.js"></script>

    <script>
        $(document).ready(function() {
            fetchAndDisplayData();

            $("#showProgramFormButton").click(function() {
                $("#programModal").modal("show");
            });

            $("#programForm").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "../process/courses_back.php",
                    data: $("#programForm").serialize(),
                    success: function(response) {
                        if (response) {
                            $("#successMessage").html("<div class='alert alert-success text-center'>Data submitted successfully</div>");
                            $("#programForm")[0].reset();
                            fetchAndDisplayData();
                        } else {
                            $("#successMessage").html("<div class='alert alert-danger'>Error: Data not sent</div>");
                            $("#programForm")[0].reset();
                        }
                    }
                });
            });

            function fetchAndDisplayData() {
                $.ajax({
                    type: "GET",
                    url: "../functions/fetch_data.php?action=fetchcoursesTable",
                    success: function(data) {
                        $("#dataTableContainer").html(data);

                        // Initialize DataTables with pagination
                        $('#dataTable').DataTable({
                            dom: 'Bfrtip',
                            buttons: ['copy', 'csv', 'print'],
                            paging: true, // Enable pagination
                            pageLength: 10 // Set the number of rows per page
                        });
                    }
                });
            }

            // Delete button click event
$('#dataTableContainer').on('click', '.deleteButton', function() {
    var programId = $(this).data('id');

    if (confirm("Are you sure you want to delete this Course?")) {
        $.ajax({
            type: 'GET',
            url: "../process/CoursesDelete.php?action=fetchcoursesDelete",
            data: { id: programId },
            success: function(response) {
                alert(response);
                fetchAndDisplayData();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    } else {
        // Action canceled
        console.log("Deletion canceled");
    }
});
            // Delete button click event
$('#dataTableContainer').on('click', '.editButton', function() {
    var programId = $(this).data('id');

    if (confirm("Are you sure you want to Edit this Course?")) {
        $.ajax({
            type: 'GET',
            url: "../process/CoursesDeletess.php?action=fetchcoursesEdit",
            data: { id: programId },
            success: function(response) {
                alert(response);
                fetchAndDisplayData();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    } else {
        // Action canceled
        console.log("Deletion canceled");
    }
});

        });
    </script>

<?php 
include("../include/footer.inc.php");
?>