
$(document).ready(function() {
    $("#lectureForm").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "lecture_back.php",
            data: $("#lectureForm").serialize(),
            success: function(response) {
                if (response.trim() === "Data inserted successfully") {
                    // Display success message
                    $("#successMessage").html("<div class='alert alert-success'>Data submitted successfully</div>");
    
                    // Reset the form
                    $("#lectureForm")[0].reset();
    
                    // Redraw the DataTable
                    $('#lectureForm').DataTable().ajax.reload();
                } else {
                    // Display error message
                    $("#successMessage").html("<div class='alert alert-danger'>Error: Data not sent</div>");
                    $("#lectureForm")[0].reset();
                }
                 
                // Fetch and display all data in DataTable
                fetchAndDisplayData();
            }
        });
    });

    var online = "../functions/";
    function fetchAndDisplayData() {
        $.ajax({
            type: "GET",
            url: "../functions/fetch_data.php?action=fetchFacultyTable",
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
    

    // Initial DataTable setup on page load
    fetchAndDisplayData();


 // Fetch faculty data from the database and populate dropdown
 fetchFacultyData();

// Fetch faculty data from the database and populate dropdown
function fetchFacultyData() {
 $.ajax({
     type: "GET",
     url: "../fetch_foriegnData.php", // Replace with the actual PHP file to fetch faculty data
     success: function(data) {
         $("#faculty_id").html(data);
     }
 });
}



});
