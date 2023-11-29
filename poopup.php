<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Select2 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Select2 JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<!-- Then include Select2 -->

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
    <!-- ... -->
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
    
            
       


  <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSix">
      <button class="accordion-button btn-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
        All Department
      </button>
    </h2>
    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        
  <button type="button" class="btn btn-primary mb-3" id="addButtons">Computer Science</button>
      <button type="button" class="btn btn-secondary mb-3" id="addButton2">Computer Science</button>
      <button type="button" class="btn btn-success mb-3" id="addButton3">Computer Science</button>
      <button type="button" class="btn btn-danger mb-3" id="addButton4">Computer Science</button>
      <button type="button" class="btn btn-warning mb-3" id="addButton5">Computer Science</button>
      <button type="button" class="btn btn-info mb-3" id="addButton6">Computer Science</button>
      <button type="button" class="btn btn-light mb-3" id="addButton7">Computer Science</button>
      <button type="button" class="btn btn-dark mb-3" id="addButton8">Computer Science</button>
      <button type="button" class="btn btn-secondary mb-3" id="addButton9">Computer Science</button>
      <button type="button" class="btn btn-success mb-3" id="addButton10">Computer Science</button>
      <button type="button" class="btn btn-danger mb-3" id="addButton11">Computer Science</button>
      <button type="button" class="btn btn-warning mb-3" id="addButton12">Computer Science</button>
      <button type="button" class="btn btn-primary mb-3" id="addButton13">Computer Science</button>
      <button type="button" class="btn btn-danger mb-3" id="addButton14">Computer Science</button>
      <button type="button" class="btn btn-outline-Dark mb-3" id="addButton15">Computer Science</button>
      <button type="button" class="btn btn-outline-Link mb-3" id="addButton16">Computer Science</button>
      <button type="button" class="btn btn-outline-Dark mb-3" id="addButton17">Computer Science</button>
      <button type="button" class="btn btn-primary mb-3" id="addButton18">Computer Science</button>
      <button type="button" class="btn btn-outline-info mb-3" id="addButton19">Computer Science</button>
      <button type="button" class="btn btn-outline-warning mb-3" id="addButton20">Computer Science</button>
      <button type="button" class="btn btn-outline-success mb-3" id="addButton21">Computer Science</button>
    
<!-- Form Popup -->
<div class="modal fade" id="examFormModal" tabindex="-1" role="dialog" aria-labelledby="examFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="examFormModalLabel">Add Exam Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>        
        <div class="modal-body">
  <form id="examForm">
  <div id="responseMessage" class="mt-3"></div>
    
    <div class="form-group">
      <label for="day">Day:</label>
      <select class="form-control select2 btn-info" id="day" name="day">
        <option value="">Select Day</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
      </select>
    </div>

    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
      <label for="coursename">Course Name:</label>
      <select class="form-control select2" id="coursename" name="coursename">
        <!-- Add options for programs -->
      </select>
    </div>

    <div class="form-group">
      <label for="program">Program:</label>
      <select class="form-control select2" id="program" name="program">
        <!-- Add options for programs -->
      </select>
    </div>

    <div class="form-group">
      <label for="department">Department:</label>
      <select class="form-control select2" id="department" name="department">
        <!-- Add options for departments -->
      </select>
    </div>
    <div class="form-group">
      <label for="faculty">Faculty:</label>
      <select class="form-control select2" id="faculty" name="faculty">
        <!-- Add options for faculties -->
      </select>
    </div>
    <!-- <div class="form-group"> -->
      <!-- <label for="coursecode">Course Code:</label>
      <select class="form-control select2" id="coursecode" name="coursecode"> -->
        <!-- Add options for programs -->
      <!-- </select> -->
    <!-- </div> -->
    
    <div class="form-group">
      <label for="session">Session:</label>
      <select class="form-control select2" id="session" name="session">
        <!-- Add options for sessions -->
      </select>
    </div>
    <div class="form-group">
      <label for="students">Number of Students:</label>
      <input type="number" class="form-control" id="students" name="students">
    </div>
    <div class="form-group">
      <label for="hall">Hall/Room:</label>
      <select class="form-control select2" id="hall" name="hall">
        <!-- Add options for rooms -->
      </select>
    </div>
        
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


      </div>
    </div>
  </div> 

    </div>
    </div>
  </div>



    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button btn-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Faculty of Applied Science
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">   
          <!-- Existing content -->
          
  
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button btn-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Faculty of Engineering
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <!-- Existing content -->
      
    
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button btn-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Faculty of Built and Natural Environment
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        
        <!-- Existing content -->
        
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button btn-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        Faculty of Business and Management Studies
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <!-- Existing content -->
      
    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
      <button class="accordion-button btn-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
        Facylty of Applied Art and Technology
      </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
          <!-- Existing content -->
            <!-- Existing content -->
          
    </div>
    </div>

  </div>
  <div class="container mt-5">
            <h2 class="text-danger text-center text-bold">Faculty Details</h2>
            <div id="dataTableContainer"></div>
          </div>
</div>

          
          
        </div>
        </div>
        </div>
        </div>
        </div>
     
      
    
  <!-- Bootstrap and other script imports -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.js"></script>

    <!-- jQuery and Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  <script>


    $(document).ready(function () {
    
      $('#addButtons').click(function() {
      $('#examFormModal').modal('show');
    });

 // Initialize Select2 after the document is ready
 $('.select2').select2({
    theme: 'bootstrap4', // or any other theme you want
    placeholder: 'Select an Option',
    allowClear: true,
    width: '100%'
  });

    $('#examForm').submit(function(event) {
      event.preventDefault();
      $.ajax({
        type: 'POST',
        url: 'process.php',
        data: $(this).serialize(),
        success: function(response) {
          $('#responseMessage').html('<div class="alert alert-success">Exam details submitted successfully!</div>');
          $('#examForm')[0].reset();
        },
        error: function() {
          $('#responseMessage').html('<div class="alert alert-danger">Error submitting exam details. Please try again.</div>');
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


      // Call function to fetch and display data on page load
      fetchAndDisplayData();
    });
  </script>

  <?php 
  include("../include/footer.inc.php");
  ?>
</body>
