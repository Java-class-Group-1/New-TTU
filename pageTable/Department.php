<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.js"></script>
</head>
<body>
<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Tables</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Department</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Library
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
         <div class="container-fluid">
     
              <div class="card">
                <div class="card-body">
                  <!-- <div class="container mt-5"> -->
                              <!-- Add Department Button -->
                    <button class="btn btn-primary" id="addDepartmentBtn" data-bs-toggle="modal" data-bs-target="#addDepartmentModal"><i class="mdi mdi-account-key"></i>Add Department</button>
                </div>
    <!-- <div class="container mt-5"> -->
    <h2 class="text-bg-danger text-center text-bold">Department Details</h2>

        <div id="dataTableContainer"></div>
    </div>
                <!-- Modal for Adding Department -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepartmentModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="lectureForm">
                    <!-- Your form fields -->
                    <div class="mb-3">
                        <label for="depart_name" class="form-label">Department Name:</label>
                        <input type="text" class="form-control" id="depart_name" name="depart_name" required>
                    </div>
                    <div class="mb-3">
                      <label for="Faculty_id" class="form-label">Faculty Name:</label>
                      <select class="form-select" id="Faculty_id" name="Faculty_id" required>
                          <option value="" selected disabled>Select Faculty</option>
                          <?php
                          include('../functions/fetch_foriegnData.php'); // Assuming fetch_data.php contains the necessary code to fetch faculty data                 

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
                <div id="successMessage"></div>
            </div>
            </div>
           
      

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ... -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.js"></script>
<!-- ... -->


    <script>

$(document).ready(function() {
  fetchAndDisplayData();
    // Initial DataTable setup on page load
    $("#lectureForm").submit(function(event) {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "../process/department_back.php",
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
                        $("#successMessage").html("<div class='alert alert-danger'>Error: Data not sent</div>");
                        $("#lectureForm")[0].reset();
                    }
                }
            });
        });

        // Optional: To close the modal after successful submission
        $("#lectureForm").on("submit", function() {
            $("#addDepartmentModal").modal("hide");
        });


    function fetchAndDisplayData() {
        $.ajax({
            type: "GET",
            url: "../functions/fetch_data.php?action=fetchDeaprtmentTable",
            success: function(data) {
                $("#dataTableContainer").html(data);

                // Initialize DataTables
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: {
                        container: '#dataTableButtons',
                        buttons: ['copy', 'csv', 'print']
                    }
                });
            }
        });
    }

    // Delete button click event
    $('#example').on('click', '.deleteButton', function() {
        var facultyId = $(this).data('id');
        console.log("Hello Delete");
        // AJAX call to delete the corresponding row
        $.ajax({
            type: 'GET',
            url: "../process/lectureDelete.php",
            data: { id: facultyId }, // Corrected 'id' parameter
            success: function(response) {
                alert(response); // Show success or error message
                // Refresh the table after deletion
                $('#example').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});




    </script>
<?php 
include("../include/footer.inc.php");
 

?>
