<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TTU EXAMS SYSTEM</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center btn-info">DEPARTMENT BY DEPARTMENT TIME TABLE</h1>
        <form id="classSelectForm" method="post">
        <!-- Select options for class -->
        <div class="form-group">
        <div class="mt-4 btn-success text-center ">
        <h1 id="statusMessage" ></h1>
        </div>

            <label for="classSelect">Select Class:</label>
            <select class="form-control" id="classSelect" name="classSelect">
            <option value="Creche">Creche</option>
            <option value="NURSERY">Nursery</option>
                <option value="KG1">KG 1</option>
                <option value="KG2">KG 2</option>
                <option value="CLASS 1">Class 1</option>
                <option value="CLASS 2">Class 2</option>
                <option value="CLASS 3">Class 3</option>
                <option value="CLASS 4">Class 4</option>
                <option value="CLASS 5">Class 5</option>
                <option value="CLASS 6">Class 6</option>
                <option value="JHS 1">JHS 1</option>
                <option value="JHS 2">JHS 2</option>
                <option value="JHS 3">JHS 3</option>
            </select>
        </div>

        <!-- Form to enter student details and calculate fees -->
<!-- <button class="btn btn-primary" id="showDataButton">Show Data</button> -->
<button type="button" class="btn btn-primary" id="showDataButton">Show Data</button>

</form>
<h2 style="float: right"> <a href="../home">  <span class="material-icons">
home
</span></a></h2>

<!-- Add a container for the length menu -->
<center>
<div class="input-group mt-2">
  <label class="input-group-text" for="inputGroupSelect01">Options</label>
  <!-- <label for="inputGroupSelect01">Records per page:</label> -->
  <select class="form-select" id="inputGroupSelect01">
            <option value="10">10</option>
            <option value="100">100</option>
            <option value="1000">1000</option>
        </select>
    </div>
    </center>
  
<!-- Table to display student data -->
<table id="studentDataTable" class="display text-center">
            <thead>
                <tr>
                    <th>Students ID Number</th>
                    <th>Full Name</th>
                    <th>Class</th>
                    <th>Academic Year</th>
                    <th>Term</th>
                    <th>Total Fees</th>
                    <th>Total Fees Paid</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be loaded here using Ajax -->
            </tbody>
        </table>
    </div>





    <!-- Include DataTables and jQuery libraries -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
   
  

  <script>
    var dataTable = $('#studentDataTable').DataTable({
            ajax: {
                url: 'fetch_student_fees.php',
                data: function (data) {
                    data.classSelect = $('#classSelect').val();
                },
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                { data: 'studentID' },
                { data: 'full_name' },
                { data: 'class' },
                { data: 'acdyr' },
                { data: 'term' },
                { data: 'total_fees' },
                { data: 'total_payment_made' },
                { data: 'balance' },
            ],
            dom: 'Bfrtip', // Add buttons to the DOM
            buttons: [
                'copy', // Copy to clipboard
                'csv', // Export as CSV
                'print' // Print
            ],
        lengthMenu: [10, 50, 100, 1000], // Define the options for displaying records per page
        pageLength: 10, // Default number of records to display
    });


        $('#showDataButton').on('click', function () {
            dataTable.ajax.reload();
        });
        // Handle changes to the length menu select
            $('#inputGroupSelect01').on('change', function () {
                dataTable.page.len($(this).val()).draw();
            });
 

  </script>
</body>
</html>
