<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>

  <!-- Other meta tags and link tags -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <!-- Load DataTables Buttons and its dependencies -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    
</head>
<body>
<div class="page-wrapper">
    <!-- ... -->
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">

     
        <h1 class="text-center text-info">Available Rooms Left</h1>
    


<!-- Add a container for the length menu -->
<center>
<div class="input-group mt-2">
  <label class="input-group-text" for="inputGroupSelect01">Options</label>
  <!-- <label for="inputGroupSelect01">Records per page:</label> -->
  <select class="" id="inputGroupSelect01">
            <option value="10">10</option>
            <option value="100">100</option>
            <option value="1000">1000</option>
        </select>
    </div>
    </center>
  
<!-- Table to display student data -->
<table id="studentDataTable" class="display text-center">

                <thead style="width: 100%;">
                    <tr style="width: 100%; background-color: lightblue;">
                        <th>Room names</th>
                        <th>Exams hall</th>
                        <th>Actual Size</th>                        
                    
                        <th>Total Student </th>
                        <th>Room Left </th>
                        <th>Locations</th>
                        <th>Year</th>
                                          
                        <th>Semester</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded here using DataTables -->
                </tbody>
            </table>
    </div>
    </div>
    </div>
    </div>
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
                url: '../process/roomleft.php',
                type: 'POST',
                dataSrc: '',
                 
            },
            columns: [             
                { data: 'Room_names'},
                { data: 'Exams_hall'},
                { data: 'Total_Size'},
                { data: 'Total_Students'},
                { data: 'Room_left'},
                { data: 'Locations'},
                { data: 'Year'},
                { data: 'Semester'},
            
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
    // After fetching data, call draw() to render the table
dataTable.on('xhr', function () {
    var json = dataTable.ajax.json();
    console.log(json); // Ensure that the fetched data structure matches your column definitions
    dataTable.draw();
});


        $('#showDataButton').on('click', function () {
            dataTable.ajax.reload();
        });
        // Handle changes to the length menu select
            $('#inputGroupSelect01').on('change', function () {
                dataTable.page.len($(this).val()).draw();
            });
 

  </script>
<?php 
include("../include/footer.inc.php");
 

?>