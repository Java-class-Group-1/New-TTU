<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS AND EXAMS ALLOCATRION</title>
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
                        <img src="public/assets/images/signup.png"
                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;  height: 100%;" /></div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                          
                                <form method="POST" action="#" id="loginForm">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">
                                            <img src="public/assets/images/ttu.png" height="40px"
                                                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                        </span>
                                    </div>
                                    <h5 class="fw-normal text-center mb-3 pb-3" style="letter-spacing: 1px;">Sign into
                                        your account</h5>
                                        <div class="alert-container"></div>
                                    <div class="form-outline mb-4">
                                        <input type="text" id="username" class="form-control form-control-lg" />
                                        <label class="form-label" for="username">Username</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="pt-1 mb-6">
                                        <button class="btn btn-success btn-lg btn-block" type="submit">Login</button>
                                    </div>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a
                                            href="signup form.php" style="color: red;"> Register here</a></p>
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
    $(document).ready(function () {
        $('#loginForm').submit(function (event) {
            event.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();

            // Hash the password (in a real scenario, this should be sent securely to the server)
            var hashedPassword = CryptoJS.SHA256(password).toString();

            // AJAX request to log in
            $.ajax({
                url: 'check.php',
                type: 'POST',
                data: {
                    username: username,
                    password: hashedPassword
                },
                success: function (response) {
                    if (response == 'success') {
                        // Display success alert and redirect after 3 seconds
                        $('.alert-container').html('<div class="alert text-center alert-success" role="alert">Login successful. Redirecting to the dashboard...</div>');
                        setTimeout(function () {
                            window.location.href = 'pageTable/dashboard.php';
                        }, 3000);
                    } else {
                        // Display error alert
                        $('.alert-container').html('<div class="alert text-center alert-danger" role="alert">Username and Password incorrect</div>');
                          setTimeout(function () {
                            window.location.href = 'index.php';
                        }, 3000);
                    }
                }
            });
        });
    });
</script>
</body>
</html>
