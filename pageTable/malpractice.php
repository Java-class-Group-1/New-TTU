<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
<<<<<<< HEAD
=======

    
 

>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
<div class="page-wrapper">
        
        <div class="container-fluid">
        <div class="card">
            <div class="card-body">
<<<<<<< HEAD
            <button id="showProgramFormButton" class="btn btn-primary">Add New Malpractice Form</button>

<div class="modal fade" id="programModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
        <div class="modal-header">
                  <h5 class="modal-title" id="addFacultyModalLabel">Add Form</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <!-- Modal Body -->
            <div class="modal-body">
            <div class="malpractice-form">
                    <form method="POST" id="malpracticeForm" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div id="formMessage"></div>
                            <div class="col">
                                <label for="studentIndex" class="form-label">Student Index Number:</label>
                                <input type="text" class="form-control" id="studentIndex" name="studentIndex" placeholder="Student Index" required>
                            </div>
                         
                            <div class="row mb-3">
                            <div class="col">
=======
            <h1 class="page-title text-center text-danger">MalPractice Form</h1>
            <br><br>
                <div class="malpractice-form">
                    <form method="POST" id="malpracticeForm" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <div id="formMessage"></div>
                            <div class="col-md-6">
                                <label for="studentIndex" class="form-label">Student Index Number:</label>
                                <input type="text" class="form-control" id="studentIndex" name="studentIndex" placeholder="Student Index" required>
                            </div>
                            <div class="col-md-6">
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                                <label for="studentName" class="form-label">Student Name:</label>
                                <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Student name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
<<<<<<< HEAD
                            <div class="col">
=======
                            <div class="col-md-6">
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                                <label for="studentDepartment" class="form-label">Student Department:</label>
                                <select class="form-select" id="Department_id" name="Department_id" required>
                              <option value="" selected disabled>Select Department</option>
                              <?php
                              include('../functions/fetch_foriegnData.php'); // Assuming fetch_data.php contains the necessary code to fetch faculty data
                      
                              $departmentList = fetchDepartmentData(); // Assuming fetchFacultyData is a function in fetch_data.php
                      
                              foreach ($departmentList as $department) {
                                  echo "<option value='{$department['depart_name']}'>{$department['depart_name']}</option>";
                              }
                              ?>
                          </select>
                            
                              </div>
<<<<<<< HEAD
                              <div class="row mb-3">
                            <div class="col">
=======
                            <div class="col-md-6">
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                                <label for="courseCode" class="form-label">Course Code:</label>
                                <input type="text" class="form-control" id="courseCode" name="courseCode" placeholder="Course code" required>
                            </div>
                        </div>
                        <div class="row mb-3">
<<<<<<< HEAD
                            <div class="col">
                                <label for="supervisorName" class="form-label">Supervisor Name:</label>
                                <input type="text" class="form-control" id="supervisorName" name="supervisorName" placeholder="Supervisor's Name" required>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
=======
                            <div class="col-md-6">
                                <label for="supervisorName" class="form-label">Supervisor Name:</label>
                                <input type="text" class="form-control" id="supervisorName" name="supervisorName" placeholder="Supervisor's Name" required>
                            </div>
                            <div class="col-md-6">
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                                <label for="supervisorDepartment" class="form-label">Supervisor Department:</label>
                                <select class="form-select" id="supervisorDepartment" name="supervisorDepartment" required>
        <option value="" selected disabled>Select Department</option>
        <?php
        $departmentList = fetchDepartmentData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($departmentList as $department) {
            echo "<option value='{$department['depart_name']}'>{$department['depart_name']}</option>";
        }
        ?>
    </select>
                          
                              </div>
                        </div>
                        <div class="row mb-3">
<<<<<<< HEAD
                            <div class="col">
                                <label for="supervisorRole" class="form-label">Supervisor Role/Position:</label>
                                <input type="text" class="form-control" id="supervisorRole" name="supervisorRole" placeholder="Supervisor's role" required>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
=======
                            <div class="col-md-6">
                                <label for="supervisorRole" class="form-label">Supervisor Role/Position:</label>
                                <input type="text" class="form-control" id="supervisorRole" name="supervisorRole" placeholder="Supervisor's role" required>
                            </div>
                            <div class="col-md-6">
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                                <label for="room" class="form-label">Room where Incident Happened:</label>
                                <select class="form-select" id="room" name="room" required>
        <?php
             $roomList = fetchRoomData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($roomList as $room) {
            echo "<option value='{$room['room_name']}'>{$room['room_name']} - {$room['location']}</option>";
        }
        ?>
    </select>    

                            </div>
                        </div>
                        <div class="row mb-3">
<<<<<<< HEAD
                            <div class="col">
                                <label for="dateTime" class="form-label">Date and Time of Incident:</label>
                                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" placeholder="date and time of incident" required>
                            </div>
                            <div class="row mb-3">
                            <div class="col">
=======
                            <div class="col-md-6">
                                <label for="dateTime" class="form-label">Date and Time of Incident:</label>
                                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" placeholder="date and time of incident" required>
                            </div>
                            <div class="col-md-6">
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                                <label for="malpracticeType" class="form-label">Malpractice Type:</label>
                                <select class="form-select" id="malpracticeType" name="malpracticeType" required>
                                    <option value="" selected disabled>Select Malpractice Type</option>
                                    <option value="Copying">Copying</option>
                                    <option value="Using Unauthorized Materials">Using Unauthorized Materials</option>
                                    <option value="Impersonation">Impersonation</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
<<<<<<< HEAD
                            <div class="col">
=======
                            <div class="col-md-6">
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                                <label for="studentImage" class="form-label">Upload Student's Image:</label>
                                <input type="file" class="form-control" id="studentImage" name="studentImage" accept="image/*" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="itemSeen" class="form-label">Item Seen:</label>
                                <textarea class="form-control" id="itemSeen" name="itemSeen" placeholder="item seen" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="description" class="form-label">Brief Description:</label>
                                <textarea class="form-control" id="description" name="description" placeholder="brief description of incident" required></textarea>
                            </div>
                        </div>
                        <div class="">
<<<<<<< HEAD
                    
                                <button type="submit" class="btn btn-danger ">Submit Report</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
=======
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-danger btn-lg">Submit Malpractice Report</button>
                            </div>
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
<<<<<<< HEAD
            </div>
        </div>
    </div>
 
        </div>
    </div>
    </div>
 
 
 

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {

        $("#showProgramFormButton").click(function() {
                $("#programModal").modal("show");
            });

=======

<!-- Your HTML code with form -->
<!-- Including necessary libraries -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
>>>>>>> 7b97636344d05ac5557ff0f2eb5d4924f6768fc8
        $('#malpracticeForm').submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Perform client-side validation
            var isValid = validateForm(); // You need to define your own validation function

            if (isValid) {
                // Serialize form data
                var formData = new FormData($(this)[0]);

                // AJAX request
                $.ajax({
                    url: '../process/malpractice_form_back.php', // Replace with your PHP processing file
                    type: 'POST',
                    data: formData,
                    async: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Display success message or handle response
                        $('#formMessage').html('<div class="alert text-center alert-success">Form report submitted successfully!</div>');
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle errors or display error message
                        $('#formMessage').html('<div class="alert alert-danger">Error submitting report. Please try again.</div>');
                    }
                });
            }
        });
    });

    function validateForm() {
    var isValid = true;

    // Validate Student Index Number
    if ($('#studentIndex').val() === '') {
        isValid = false;
        // Display an error message or style the input field to indicate an error
    }

    // Validate Student Name
    if ($('#studentName').val() === '') {
        isValid = false;
        // Display an error message or style the input field to indicate an error
    }

    // Validate Student Department
    if ($('#Department_id').val() === null) {
        isValid = false;
        // Display an error message or style the input field to indicate an error
    }

    // Validate Course Code
    if ($('#courseCode').val() === '') {
        isValid = false;
        // Display an error message or style the input field to indicate an error
    }

    // Perform similar validations for other fields...

    // Validate Student Image
    var fileInput = $('#studentImage');
    var uploadedFile = fileInput[0].files[0];
    if (!uploadedFile) {
        isValid = false;
        // Display an error message or style the input field to indicate an error
    } else {
        var fileType = uploadedFile.type.split('/').pop().toLowerCase();
        if (fileType !== 'jpeg' && fileType !== 'jpg' && fileType !== 'png' && fileType !== 'gif') {
            isValid = false;
            // Display an error message or style the input field to indicate an error
        }
    }

    return isValid;
}

</script>


<?php 
include("../include/footer.inc.php");
?>
