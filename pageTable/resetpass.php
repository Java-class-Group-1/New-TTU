<?php 
include("../include/header.inc.php");
include("../include/sidebar.inc.php");

?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
</head>
<body>
<div class="page-wrapper">
<div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Hello Admin <?php echo $_SESSION['username']?></h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="#">Programs</a></li> -->
                    <!-- <li class="breadcrumb-item active" aria-current="page"> -->
                      <!-- Library -->
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="resetForm" method="post">
            <h1 class="text-center text-info">Account Settings</h1>

                <div id="message"></div>
                    <div class="form-group">
                        <label for="currentPassword">Current Password:</label>
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="repeatPassword">Repeat Password:</label>
                        <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="resetBtn">Reset Password</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
            </div>
            </div>
            </div>
            </div>
 
     

    <script>
        $(document).ready(function() {
            $('#resetForm').submit(function(e) {
                e.preventDefault();

                var currentPassword = CryptoJS.SHA256($('#currentPassword').val()).toString();
                var newPassword = CryptoJS.SHA256($('#newPassword').val()).toString();
                var repeatPassword = CryptoJS.SHA256($('#repeatPassword').val()).toString();

                if (newPassword !== repeatPassword) {
                    $('#message').html('New password and repeat password do not match');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: '../process/reset_back.php',
                    data: {
                        currentPassword: currentPassword,
                        newPassword: newPassword
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $("#message").html("<div class='alert alert-success text-center'>Password updated successfully</div>");
                            $("#resetForm")[0].reset();
                        } else {
                            $('#message').html("<div class='alert alert-danger text-center'>Incorrect Password Generated</div>");
                        }
                    }
                });
            });
        });
    </script>
<?php 
include("../include/footer.inc.php");
 

?>