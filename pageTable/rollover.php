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
            <h1 class="text-center text-uppercase text-info">Change Academic Year and Semester</h1>

                <div id="message"></div>
                    <div class="form-group">
                        <label for="acdyr">Academic Year</label>
                        <input type="text" class="form-control" id="acdyr" name="acdyr" placeholder="20xx/20xx" required>
                    </div>
                    <div class="form-group">
                        <label for="sem">Academic Semester</label>
                        <input type="text" class="form-control" id="sem" name="sem" placeholder="Sem X" required>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="resetBtn">Roll Over</button>
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

                var acdyr = $('#acdyr').val();
                var sem = $('#sem').val();       
            

                $.ajax({
                    type: 'POST',
                    url: '../process/rollover_back.php',
                    data: {
                        acdyr: acdyr,
                        sem: sem
                    },
                    success: function(response) {
                        if (response == 'success') {
                            $("#message").html("<div class='alert alert-info text-center'>Academic Year and Sem updated successfully</div>");
                            $("#resetForm")[0].reset();
                        } else {
                            $('#message').html("<div class='alert alert-danger text-center'>Incorrect Year and Sem Generated</div>");
                        }
                    }
                });
            });
        });
    </script>
<?php 
include("../include/footer.inc.php");
 

?>