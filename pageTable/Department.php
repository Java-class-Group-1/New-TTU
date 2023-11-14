<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>

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

            
                <h2 class="text-right "><i class="mdi mdi-account-key"><a href="../page/department.php" class="text-decoration-none text-danger text-right align-items-center"></i
                  >Add Department</a></h2>

    <div class="container mt-5">
    <h2 class="text-bg-danger text-center text-bold">Department Details</h2>

        <div id="dataTableContainer"></div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.js"></script>


    <script>

$(document).ready(function() {
    // Initial DataTable setup on page load
    fetchAndDisplayData();

    function fetchAndDisplayData() {
        $.ajax({
            type: "GET",
            url: "../functions/fetch_data.php?action=fetchDeaprtmentTable",
            success: function(data) {
                $("#dataTableContainer").html(data);

                // Initialize DataTables
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: {
                        container: '#dataTableButtons',
                        buttons: ['copy', 'csv', 'print']
                    }
                });
            }
        });
    }

    // Delete button click event
    $('#example').on('click', '.deleteButton', function() {
        var facultyId = $(this).data('id');
        console.log("Hello Delete");
        // AJAX call to delete the corresponding row
        $.ajax({
            type: 'GET',
            url: "../process/lectureDelete.php",
            data: { id: facultyId }, // Corrected 'id' parameter
            success: function(response) {
                alert(response); // Show success or error message
                // Refresh the table after deletion
                $('#example').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});




// $(document).ready(function() {
//     // Initial DataTable setup on page load
//     fetchAndDisplayData();

//     function fetchAndDisplayData() {
//         $.ajax({
//             type: "GET",
//             url: "../functions/fetch_data.php?action=fetchFacultyTable",
//             success: function(data) {
//                 $("#dataTableContainer").html(data);
    
//                 // Initialize DataTables
//                 $('#example').DataTable({
//                     dom: 'Bfrtip',
//                     buttons: {
//                         container: '#dataTableButtons',
//                         buttons: ['copy', 'csv', 'print']
//                     }
//                 });
//             }
//         });
//     }
//     // Delete button click event
//     $('#example').on('click', '.deleteButton', function() {
//     var facultyId = $(this).data('id');
//     console.log("Hello Delete");
//     // AJAX call to delete the corresponding row
//     $.ajax({
//         type: 'GET',
//         url: "../process/lectureDelete.php",
//         data: { id: facultyId }, // Pass 'id' instead of 'facultyId'
//         success: function(response) {
//             alert(response); // Show success or error message
//             // Refresh the table after deletion
//             $('#example').DataTable().ajax.reload();
//         },
//         error: function(xhr, status, error) {
//             console.error(xhr.responseText);
//         }
//     });
// });

    
// });

    </script>
<?php 
include("../include/footer.inc.php");
 

?>
