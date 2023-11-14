<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
 
 <head>
 
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

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
                    <li class="breadcrumb-item"><a href="#">Faculty</a></li>
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
        
                <h2 class="text-right "><i class="mdi mdi-account-key"><a href="../pageTable/Faculty.php" class="text-decoration-none text-danger text-right align-items-center"></i
                  >View Faculty</a></h2>
    <div class="container mt-5">
        <h2 class="text-bg-danger text-center text-bold">Add Faculty</h2>
        <div id="successMessage"></div>
        <form id="lectureForm">
            <div class="mb-3">
                <label for="faculty_name" class="form-label">Faculty Name:</label>
                <input type="text" class="form-control" id="faculty_name" name="faculty_name" required>
            </div>
        
            <div class="mb-3">
                <label for="dep_num" class="form-label">Number of Department:</label>
                <input type="number" class="form-control" id="dep_num" name="dep_num" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

$(document).ready(function() {
    $("#lectureForm").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "../process/faculty_back.php",
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

    });


    </script>
<?php 
include("../include/footer.inc.php");
 

?>

