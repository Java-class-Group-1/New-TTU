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
                <form id="signupForm" method="post">
            <h1 class="text-center text-info">Add New Admin</h1>

            <div class="alert-container"></div>                
                <div class="form-outline mb-4">
                    <input type="text" id="adminemail" name="adminemail" class="form-control form-control-lg" />
                    <label class="form-label" for="adminemail">Admin Email:</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="username" class="form-control form-control-lg" />
                    <label class="form-label" for="username">Username</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" id="phone" name="phone" class="form-control form-control-lg" />
                    <label class="form-label" for="phone">Phone Number:</label>
                  </div>
                  <div class="pt-1 mb-6">
                    <button class="btn btn-success btn-lg btn-block" type="submit">Create Admin</button>
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
    $('#signupForm').submit(function(event) {
      event.preventDefault();
      var adminemail = $('#adminemail').val();
      var username = $('#username').val();
      var password = $('#password').val();
      var phone = $('#phone').val();

      var isValid = true;
      var errors = [];

      var emailRegex = /\S+@\S+\.\S+/;
      if (!emailRegex.test(adminemail)) {
        isValid = false;
        errors.push('Invalid email format');
        $('#adminemail').addClass('is-invalid');
      } else {
        $('#adminemail').removeClass('is-invalid');
      }

      if (username.length < 4) {
        isValid = false;
        errors.push('Username should be at least 4 characters');
        $('#username').addClass('is-invalid');
      } else {
        $('#username').removeClass('is-invalid');
      }

    //   var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{5,}$/;
    //   if (!passwordRegex.test(password)) {
    //     isValid = false;
    //     errors.push('Password should be at least 5 characters and contain at least one lowercase letter, one uppercase letter, one number, and one special character');
    //     $('#password').addClass('is-invalid');
    //   } else {
    //     $('#password').removeClass('is-invalid');
    //   }

      // Phone number validation
      var phoneRegex = /^\d{10}$/;
      if (!phoneRegex.test(phone)) {
        isValid = false;
        errors.push('Phone number should be 10 digits');
        $('#phone').addClass('is-invalid');
      } else {
        $('#phone').removeClass('is-invalid');
      }

      if (!isValid) {
        $('.alert-container').html('<div class="alert alert-danger" role="alert">' + errors.join('<br>') + '</div>');
        return;
      }

      var hashedPassword = CryptoJS.SHA256(password).toString();

      $.ajax({
        url: '../process/Admin_add.php',
        type: 'POST',
        data: {
          adminemail: adminemail,
          username: username,
          password: hashedPassword,
          phone: phone
        },
        success: function(response) {
          if (response == 'success') {
            $('.alert-container').html('<div class="alert alert-success text-center" role="alert">Admin Created successfully.......</div>');
            
          } else {
            $('.alert-container').html('<div class="alert alert-danger" role="alert">Admin Created failed: Admin Email or Username already Exist</div>');
            // setTimeout(function() {
            //   window.location.href = 'signup form.php';
            // }, 3000);
          }
        }
      });
    });
  });
</script>
<?php 
include("../include/footer.inc.php");
 

?>