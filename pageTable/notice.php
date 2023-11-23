<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
 
<body>


<div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Students Notice</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Notice</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                   
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


<div class="container mt-5">
  <h2>Student Notices</h2>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Comments</th>
        <th>Date</th>
        <th>Department</th>
        <th>Faculty</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="noticeTable">
      <!-- Table rows will be populated dynamically -->
    </tbody>
  </table>
</div>

<!-- Modal for displaying notice details -->
<div class="modal" id="viewNoticeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Notice Details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="noticeDetails">
        <!-- Notice details will be displayed here -->
      </div>
    </div>
  </div>
</div>
 

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function() {
    // Fetch notices data using AJAX and populate the table
    $.ajax({
      url: '../functions/fetch_notices.php', // Replace with your PHP file for fetching notices
      method: 'GET',
      success: function(response) {
        $('#noticeTable').html(response);
      }
    });

    // View button click event
    $('#noticeTable').on('click', '.view-btn', function() {
      var noticeId = $(this).closest('tr').find('.notice-id').text();
      $.ajax({
        url: '../functions/fetch_notice_details.php', // Replace with your PHP file for fetching notice details
        method: 'POST',
        data: { id: noticeId },
        success: function(response) {
          $('#noticeDetails').html(response);
          $('#viewNoticeModal').modal('show');
        }
      });
    });
  });
</script>


    
<?php 
include("../include/footer.inc.php");
 

?>
