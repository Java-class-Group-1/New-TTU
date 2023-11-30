<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.flash.js"></script>
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

         <div class="container-fluid">
     
              <div class="card">
                <div class="card-body">

                <button id="showProgramFormButton" class="btn btn-primary">Add New Room</button>

<div class="modal fade" id="programModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">

                <h4 class="modal-title text-danger text-center text-bold">Add Room</h4>

                <!-- <h4 class="modal-title text-bg-danger text-center text-bold">Add Room</h4> -->

                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>
            
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div id="successMessage"></div>
                <form id="programForm">
                    <div class="mb-3">
                        <label for="roomname" class="form-label">Room Name</label>
                        <input type="text" class="form-control" id="roomname" name="roomname" required>
                    </div>
                    <div class="mb-3">
                        <label for="roomsize" class="form-label">Room Size</label>
                        <input type="number" class="form-control" id="roomsize" name="roomsize" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Room Location</label>
            <!-- <input type="text" class="form-control" id="" name="location" required> -->
                
                <select class="form-select" id="location" name="location" required>
        <option value="" selected disabled>Select Course</option>
        <?php
        include('../functions/fetch_foriegnData.php'); // Assuming fetch_data.php contains the necessary code to fetch faculty data

        $departmentList = fetchRoomData(); // Assuming fetchFacultyData is a function in fetch_data.php

        foreach ($departmentList as $department) {
            echo "<option value='{$department['location']}'>{$department['location']}</option>";
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

              

    <div class="container mt-5">
    <h2 class="text-danger text-center text-bold">Room Details </h2>

        <div id="dataTableContainer"></div>
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
            fetchAndDisplayData();

            $("#showProgramFormButton").click(function() {
                $("#programModal").modal("show");
            });

            $("#programForm").submit(function(event) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "../process/room_back.php",
                    data: $("#programForm").serialize(),
                    success: function(response) {
                        if (response) {
                            $("#successMessage").html("<div class='alert alert-success text-center'>Data submitted successfully</div>");
                            $("#programForm")[0].reset();
                            fetchAndDisplayData();
                        } else {
                            $("#successMessage").html("<div class='alert alert-danger'>Error: Data not sent</div>");
                            $("#programForm")[0].reset();
                        }
                    }
                });
            });

            function fetchAndDisplayData() {
                $.ajax({
                    type: "GET",
                    url: "../functions/fetch_data.php?action=fetchRoomTable",
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
    var courseID = $(this).data('id');

    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            type: 'GET',
            url: "../process/roomDelete.php",
            data: { id: courseID },
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
    var courseID = $(this).data('id');

    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            type: 'GET',
            url: "../process/roomDeletess.php",
            data: { id: courseID },
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