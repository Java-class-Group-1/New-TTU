<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");
?>

<head>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
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
<div class="page-wrapper">
    <!-- ... -->
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
    
                <div class="text-right">
        <button type="button" class="btn btn-info" data-bs-toggle="modal"       data-bs-target="#addFacultyModal">
          <i class="mdi mdi-account-key"></i> Add Faculty
        </button>
      </div>
                <!-- Modal -->
                <div class="modal fade" id="addFacultyModal" tabindex="-1" aria-labelledby="addFacultyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addFacultyModalLabel">Add Faculty</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Your form -->
                  <form id="lectureForm">
                    <div class="mb-3">
                      <!-- Success/Error message -->
                <div id="successMessage"></div>

                      <label for="faculty_name" class="form-label">Faculty Name:</label>
                      <input type="text" class="form-control" id="faculty_name" name="faculty_name" required>
                    </div>
                    <div class="mb-3">
                      <label for="dep_num" class="form-label">Names of Department:</label>
                      <textarea name="dep_num" id="dep_num" class="form-control" cols="30" rows="10" required></textarea>
                      <!-- <input type="text" class="form-control" id="" name="" > -->
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               
                  </form>
                </div>
              </div>
            </div>
          </div>

          
          <!-- Existing content -->
          <div class="container mt-5">
            <h2 class="text-danger text-center text-bold">Faculty Details</h2>
            <div id="dataTableContainer"></div>
          </div>
        </div>
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
    $(document).ready(function () {
      // Submit form data using AJAX
      $("#lectureForm").submit(function (event) {
        event.preventDefault();

        $.ajax({
          type: "POST",
          url: "../process/faculty_back.php",
          data: $("#lectureForm").serialize(),
          success: function (response) {
            if (response.trim() === "Data inserted successfully") {
              // Display success message
              $("#successMessage").html("<div class='alert alert-success text-center'>Data submitted successfully</div>");

              // Reset the form
              $("#lectureForm")[0].reset();

              // Reload the DataTable (assuming it has the ID 'example')
              // $('#example').DataTable().ajax.reload(); // Use '#example' for DataTable selector
              fetchAndDisplayData();
              hideSuccessMessage();
            } else {
              // Display error message
              $("#successMessage").html("<div class='alert alert-danger'>Error: Data not sent</div>");
              $("#lectureForm")[0].reset();
            }
          }
        });
      });

        // Function to handle the success message disappearing after 5 seconds
  function hideSuccessMessage() {
    setTimeout(function () {
      $('#successMessage').fadeOut('slow', function () {
        $(this).empty().show();
      });
    }, 3000); // 5000 milliseconds = 5 seconds
  }

  function fetchAndDisplayData() {
                $.ajax({
                    type: "GET",
                    url: "../functions/fetch_data.php?action=fetchmainFacultyTable",
                success: function (data) {
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
    var facultyId = $(this).data('id');
 
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            type: 'GET',
            url: "../process/facultyDelete.php",
          data: { id: facultyId }, // Corrected 'id' parameter
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
            url: "../process/facultyDeletess.php",
          data: { id: facultyId }, // Corrected 'id' parameter
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


      // Call function to fetch and display data on page load
      fetchAndDisplayData();
    });
  </script>

  <?php 
  include("../include/footer.inc.php");
  ?>
</body>
