<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
 
<head>
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

      <button id="showFormButton" class="btn btn-primary">Add Lecture</button>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-danger text-center text-bold">Add Lecture</h4>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
            <div id="successMessage"></div>
            <form id="lectureForm">
            <div class="mb-3">
                <label for="lec_name" class="form-label">Lecture Name</label>
                    <input type="text" class="form-control" id="lec_name" name="lec_name" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div> 
                <div class="mb-3">
                    <label for="course_taught" class="form-label">Course Taught</label>
                    <!-- <input type="text" class="form-control" id="" name="" required> -->
                    <select class="form-select" id="course_taught" name="course_taught" required>
        <option value="" selected disabled>Select Course</option>
        <?php
        include('../functions/fetch_foriegnData.php'); // Assuming fetch_data.php contains the necessary code to fetch faculty data

        $departmentList = fetchcoursesData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($departmentList as $department) {
            echo "<option value='{$department['coursename']}'>{$department['coursename']}</option>";
        }
        ?>
    </select>
            
                </div>
                <div class="mb-3">
                    <label for="Department_id" class="form-label">Department</label>
                    <select class="form-select" id="Department_id" name="Department_id" required>
        <option value="" selected disabled>Select Department</option>
        <?php
        
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
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               
              </div>
        </div>
    </div>
</div>

            
    <div class="container mt-5">
    <h2 class="text-danger text-center text-bold">Lectures Details</h2>

        <div id="dataTableContainer"></div>
    </div>
    </div>
    </div>

  <!-- JavaScript imports -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.js"></script>

    <script>
  $(document).ready(function() {
    // Fetch and display data function

      // Show modal when the button is clicked
      $("#showFormButton").click(function() {
        $("#myModal").modal("show");
    });

    // Submit form via AJAX when submitted
    $("#lectureForm").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../process/lecture_back.php",
            data: $("#lectureForm").serialize(),
            success: function(response) {
                if (response.trim() === "Data inserted successfully") {
                    // Display success message
                    $("#successMessage").html("<div class='alert alert-success text-center'>Data submitted successfully</div>");
    
                    // Reset the form
                    $("#lectureForm")[0].reset();
    
                    // Redraw the DataTable
                    $('#lectureForm').DataTable().ajax.reload();
                } else {
                    // Display error message
                    $("#successMessage").html("<div class='alert alert-danger'>Error: Lecture with the course in the same Department is already in the system</div>");
                    $("#lectureForm")[0].reset();
                }
                 
    
            }
        });
    });

    function fetchAndDisplayData() {
                $.ajax({
                    type: "GET",
                    url: "../functions/fetch_data.php?action=fetchFacultyTable",
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
    

    // Submit form data via AJAX
    // $("#lectureForm").submit(function(event) {
    //   event.preventDefault();
    //   $.ajax({
    //     type: "POST",
    //     url: "../process/lecture_back.php",
    //     data: $("#lectureForm").serialize(),
    //     success: function(response) {
    //       if (response.trim() === "Data inserted successfully") {
    //         $("#successMessage").html("<div class='alert alert-success text-center'>Data submitted successfully</div>");
    //         $("#lectureForm")[0].reset();
    //         fetchAndDisplayData(); // Reload table data
    //       } else {
    //         $("#successMessage").html("<div class='alert alert-danger'>Error: Data not sent</div>");
    //       }
    //     }
    //   });
    // });

    // Initial DataTable setup on page load
    fetchAndDisplayData();


        // Delete button click event
    $('#dataTableContainer').on('click', '.deleteButton', function() {
    var facultyId = $(this).data('id');

    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            type: 'GET',
            url: "../process/lecterDelete.php",
            data: { id: facultyId },
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

        // Edit button click event
    $('#dataTableContainer').on('click', '.editButton', function() {
    var facultyId = $(this).data('id');

    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            type: 'GET',
            url: "../process/lecterDeletess.php",
            data: { id: facultyId },
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
