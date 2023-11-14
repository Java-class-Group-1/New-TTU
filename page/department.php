<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
 
    <div class="page-wrapper">
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
        
                <h2 class="text-right "><i class="mdi mdi-account-key"><a href="../pageTable/Department.php" class="text-decoration-none text-danger text-right align-items-center"></i
                  >View Department</a></h2>
    <div class="container mt-5">
        <h2 class="text-bg-danger text-center text-bold">Add Department</h2>
        <div id="successMessage"></div>
        <form id="lectureForm">
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

    });


    </script>
<?php 
include("../include/footer.inc.php");
 

?>

