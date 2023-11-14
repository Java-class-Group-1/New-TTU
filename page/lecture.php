<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
  <head>
 
 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        
                <h2 class="text-right "><i class="mdi mdi-account-key"><a href="../pageTable/lectureTable.php" class="text-decoration-none text-danger text-right align-items-center"></i
                  >View Lecture</a></h2>
    <div class="container mt-5">
        <h2 class="text-bg-danger text-center text-bold">Add New Lecture</h2>
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
                <input type="text" class="form-control" id="course_taught" name="course_taught" required>
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


            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
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

