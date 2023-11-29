<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Exam Timetable</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


</head>
<body>

<div class="container mt-5">
  <h2>Exam Timetable</h2>
  <button type="button" class="btn btn-primary mb-3" id="addButton">Add</button>

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
      <select class="form-control select2 btn-danger" id="day" name="day">
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
      <label for="timest">Time start:</label>
      <input type="time" class="form-control" id="timest" name="timest">
      
    </div>
    <div class="form-group">
      <label for="timeend">Time End:</label>
      <input type="time" class="form-control" id="timeend" name="timeend">
      
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
    <div class="form-group">
      <label for="invigilator">Invigilator:</label>
      <select class="form-control select2" id="invigilator" name="invigilator">
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

<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('#addButton').click(function() {
      $('#examFormModal').modal('show');
    });

    $('.select2').select2({
      theme: 'bootstrap5', // Change the theme if needed
      placeholder: 'Select an Option',
      // allowClear: true, // Add option to clear selected value
      width: '100%' // Adjust the width as needed
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
  });
</script>

</body>
</html>
