<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");
?>

<head>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.js"></script>
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
    
            <h1 class="text-success text-center text-uppercase">TAKORADI TECHNICAL UNIVERSITY EXAMS TIME TABLE</h1>
       
          <br><br>

  <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">

  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSix">
      <button class="accordion-button btn-success collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
        Set Exams Time Table
      </button>
    </h2>
    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        
  <button type="button" class="btn btn-primary mb-3" id="addButton">Faculty of Applied Science</button>
      <button type="button" class="btn btn-secondary mb-3" id="addButton2">Faculty of Applied Arts</button>
  
      <button type="button" class="btn btn-warning mb-3" id="addButton4">Faculty of Built and Natural Environment</button>
      <button type="button" class="btn btn-danger mb-3" id="addButton5">Faculty of Business and Management Studies</button>
      <button type="button" class="btn btn-info mb-3" id="addButton6">Faculty of Engineering</button>

  <!-- Form Popup -->
  <div class="modal fade" id="examFormModal" tabindex="-1" role="dialog" aria-labelledby="examFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="examFormModalLabel">Add Exam Details</h5>
          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
          </button>
        </div>
        
        <div class="modal-body">
  <form id="examForm" method="POST" action="#">
  <div id="responseMessage" class="mt-3"></div>
    
    <div class="form-group">
      <label for="day">Day:</label>
      <select class="form-control select2 btn-info" id="day" name="day" required>
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
      <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <div class="form-group">
      <label for="coursename">Course Name:</label>
      <select class="form-control select2" id="coursename" name="coursename" required>
      <option value="" selected disabled>Select Course</option>
    <?php
        include('../functions/fetch_foriegnData.php'); // Assuming fetch_data.php contains the necessary code to fetch faculty data

        $Course = fetchcoursesData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($Course as $Courses) {
            echo "<option value='{$Courses['id']}'>{$Courses['coursename']}</option>";
        }

        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="courselevel">Course Level:</label>
      <select class="form-control select2" id="courselevel" name="courselevel" required>
      <option value="" selected disabled>Select Course Level</option>
      <?php 
      $courselevel = fetchCourselevelData(); // Assuming fetchFacultyData is a function in 
      foreach ($courselevel as $courselevels) {
          echo "<option value='{$courselevels['id']}'>{$courselevels['course_level']}</option>";
      }

?>
      </select>
    </div>

    

    <div class="form-group">
      <label for="program">Program:</label>
      <select class="form-control select2" id="program" name="program" required>
      <option value="" selected disabled>Select Program</option>
      <?php 
      $program = fetchprogramData(); // Assuming fetchFacultyData is a function in fetch_data.php

foreach ($program as $programs) {
    echo "<option value='{$programs['id']}'>{$programs['prog_name']}</option>";
}

?>
      </select>
    </div>
    
    <div class="form-group">
      <label for="department">Department:</label>
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
    <div class="form-group">
      <label for="faculty">Faculty:</label>
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
      
    <div class="form-group">
      <label for="session">Session:</label>
      <select class="form-control select2" id="session" name="session" required>
      <option value="FIRST SESSION">FIRST SESSION</option>
        <option value="SECOND SESSION">SECOND SESSION</option>
        <option value="THIRD SESSION">THIRD SESSION</option>
        <option value="FOURTH SESSION">FOURTH SESSION</option>
      </select>
    </div>
    <div class="form-group">
      <label for="timest">Time start:</label>
      <input type="time" class="form-control" id="timest" name="timest" required>
      
    </div>
    <div class="form-group">
      <label for="timeend">Time End:</label>
      <input type="time" class="form-control" id="timeend" name="timeend" required>
      
    </div>
    <div class="form-group">
      <label for="students">Number of Students:</label>
      <input type="number" class="form-control" id="students" name="students" required>
    </div>
    <div class="form-group">
      <label for="hall">Hall/Room:</label>
      <select class="form-control select2" id="hall" name="hall" required>
      <option value="" selected disabled>Select Room / Hall</option>
    <?php
      
        $room = fetchRoomData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($room as $rooms) {
            echo "<option value='{$rooms['room_name']}'>{$rooms['room_name']} -  Size = {$rooms['room_size']} - {$rooms['location']}</option>";

        }

        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="invigilator">Invigilator:</label>
      <select class="form-control select2" id="invigilator" name="invigilator" required>
      <option value="" selected disabled>Select Invigilator</option>
      <?php
        $invigilator = fetchinvigilatorData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($invigilator as $invigilators) {
            echo "<option value='{$invigilators['id']}'>{$invigilators['lec_name']}</option>";
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
    
    $('#examForm').submit(function(event) {
      event.preventDefault(); // Prevent the default form submission behavior
      $.ajax({
        type: 'POST',
        url: '../process/examsprocess.php',
        data: $(this).serialize(),
        success: function(response) {

          try {
              if (response && response.status) {
                if (response.status == "Successfully, Exams set") {
                  console.log('Exam details submitted successfully!');
                  $('#responseMessage').html('<div class="alert alert-success text-center">Exam details submitted successfully!</div>');
                  setTimeout(function () {
                    $('#examForm')[0].reset();
                  }, 4000); 
                } else if (response.status === "Error") {
                  console.log('Error:Data with the same acdyr, sem, course, program, course_level, and department already exists in the exams table.');
                  $('#responseMessage').html('<div class="alert alert-danger"> Data with the same acdyr, sem, course, program, course_level, and department already exists in the exams table.</div>');
                  setTimeout(function () {
                    // $('#examForm')[0].reset();
                  }, 4000); 
                }
             else if (response.status === "Errors") {
                  console.log('Error: ' + response.message);
                  $('#responseMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                  setTimeout(function () {
                    // $('#examForm')[0].reset();
                  }, 4000); 
                }
              } else {
            console.log('Unexpected response received.');
            $('#responseMessage').html('<div class="alert alert-danger">Unexpected response received. Please try again.</div>');
          }
        } catch (error) {
          console.error('An error occurred:', error);
          $('#responseMessage').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
          setTimeout(function() {
            $('#examForm')[0].reset();
          }, 4000); 
        }
      },
      error: function(xhr, status, error) {
        console.error('AJAX Error:', error);
        $('#responseMessage').html('<div class="alert alert-danger">AJAX Error. Please try again.</div>');
      }
    });
  });
       
      });

    $('#addButton').click(function() {
      $('#examFormModal').modal('show');
    });
    $('#addButton2').click(function() {
      $('#examFormModal').modal('show');
    });
    $('#addButton5').click(function() {
      $('#examFormModal').modal('show');
    });
    $('#addButton4').click(function() {
      $('#examFormModal').modal('show');
    });
    $('#addButton6').click(function() {
      $('#examFormModal').modal('show');
    });

    $('.select2').select2({
      theme: 'bootstrap5', // Change the theme if needed
      placeholder: 'Select an Option',
      // allowClear: true, // Add option to clear selected value
      width: '100%' // Adjust the width as needed
    });

</script>

<?php
include("../include/footer.inc.php");
?>