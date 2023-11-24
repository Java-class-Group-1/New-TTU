<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CLASS AND EXAMS ALLOCATION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
</head>
<body>

<section class="vh-150" style="background-color: darkblue;">
  <div class="container py-5 h-150">
    <div class="row d-flex justify-content-center align-items-center h-150">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="public/assets/images/signin.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">
                <form method="POST" action="#" id="signupForm" method="post">

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">   
                      <img src="public/assets/images/ttu.png" height="40px"
                      alt="login form" class="img-fluid"  style="border-radius: 1rem 0 0 1rem;" />
                    </span>
                  </div>

                  <h5 class="fw-normal text-center mb-3 pb-3" style="letter-spacing: 1px;">Sign up Here!</h5>
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
                    <button class="btn btn-success btn-lg btn-block" type="submit">Sign Up</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Already Have an account  <a href="index.php"
                      style="color:red;">Login here</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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

      if (username.length < 7) {
        isValid = false;
        errors.push('Username should be at least 7 characters');
        $('#username').addClass('is-invalid');
      } else {
        $('#username').removeClass('is-invalid');
      }

      var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      if (!passwordRegex.test(password)) {
        isValid = false;
        errors.push('Password should be at least 8 characters and contain at least one lowercase letter, one uppercase letter, one number, and one special character');
        $('#password').addClass('is-invalid');
      } else {
        $('#password').removeClass('is-invalid');
      }

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
        url: 'signup.php',
        type: 'POST',
        data: {
          adminemail: adminemail,
          username: username,
          password: hashedPassword,
          phone: phone
        },
        success: function(response) {
          if (response == 'success') {
            $('.alert-container').html('<div class="alert alert-success text-center" role="alert">Sign Up successful. Redirecting to the Login Page......</div>');
            setTimeout(function() {
              window.location.href = 'index.php';
            }, 3000);
          } else {
            $('.alert-container').html('<div class="alert alert-danger" role="alert">Sign Up failed: Admin Email or Username already Exist</div>');
            // setTimeout(function() {
            //   window.location.href = 'signup form.php';
            // }, 3000);
          }
        }
      });
    });
  });
</script>

</body>
</html>
