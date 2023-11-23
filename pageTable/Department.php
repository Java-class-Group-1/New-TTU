<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
        /* Style for the table */
        table {
            border-collapse: collapse;
            border: 2px solid black; /* Add a border to the table */
            width: 100%;
        }

        th {
            background-color: lightblue; /* Change header color to light green */
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
          
         <div class="container-fluid">
     
              <div class="card">
                <div class="card-body">
                  <!-- <div class="container mt-5"> -->
                              <!-- Add Department Button -->
                    <button class="btn btn-primary" id="addDepartmentBtn" data-bs-toggle="modal" data-bs-target="#addDepartmentModal"><i class="mdi mdi-account-key"></i>Add Department</button>
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
                    <div id="successMessage"></div>
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
                
            </div>
            </div>
            </div>
            </div>
         
         
         
               <!-- <div class="container mt-5"> -->
    <h2 class="text-danger text-center text-bold">Department Details</h2>

<div id="dataTableContainer"></div>
</div>
      
</div>
            </div>
            </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.js"></script>

    <script>
        $(document).ready(function() {
            fetchAndDisplayData();

            // Form submission
            $("#lectureForm").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "../process/department_back.php",
                    data: $("#lectureForm").serialize(),
                    success: function(response) {
                        if (response.trim() === "Data inserted successfully") {
                            $("#successMessage").html("<div class='alert alert-success text-center'>Data submitted successfully</div>");
                            $("#lectureForm")[0].reset();
                            // $('#example').DataTable().ajax.reload();
                        } else {
                            $("#successMessage").html("<div class='alert alert-danger'>Error: Data not sent</div>");
                            $("#lectureForm")[0].reset();
                        }
                    }
                });
            });



            function fetchAndDisplayData() {
                $.ajax({
                    type: "GET",
                    url: "../functions/fetch_data.php?action=fetchDeaprtmentTable",        
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
    var departmentID = $(this).data('id');

    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            type: 'GET',
            url: "../process/DepartmentDelete.php",
            data: { id: departmentID },
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