<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="public/assets/images/ttu.png" 
                        alt="login form" class="img-fluid" style="  width:90%;border-radius: 1rem 0 0 1rem;" />
                        <h1 class="card-title text-center text-uppercase mb-4">Admin Reset Password</h1>
                        <form id="forgetPasswordForm" method="POST">
                        <div class="alert-container"></div>
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Admin Email</label>
                                <input type="email" id="adminEmail" name="adminEmail" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="adminUsername" class="form-label">Admin Username</label>
                                <input type="text" id="adminUsername" name="adminUsername" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Reset Password</button>
                        </form>
                        <p class="pb-lg-2  text-center" style="color: #393f81;">Do you remember your password? <a
                        href="index.php" style="color: red;"> Login Here!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (Popper included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <script>
    $(document).ready(function () {
    $('#forgetPasswordForm').submit(function (event) {
        event.preventDefault();
        var adminEmail = $('#adminEmail').val();
        var adminUsername = $('#adminUsername').val();
        
        // Hash the default password 'examsttu' using SHA256 algorithm
        var hashedPassword = CryptoJS.SHA256('examsttu').toString();

        // AJAX request to check admin credentials
        $.ajax({
            url: 'check_admin_credentials.php',
            type: 'POST',
            data: {
                adminEmail: adminEmail,
                adminUsername: adminUsername,
                hashedPassword: hashedPassword
            },
            success: function (resetResponse) {
        try {
            let response = resetResponse;

            if (typeof resetResponse === 'string') {
                response = JSON.parse(resetResponse);
            }

            if (response && response.status === 'success') {
                console.log('Password reset successful. Check your email.');
                // Rest of your success handling code
                $('.alert-container').html('<div class="alert text-center alert-success" role="alert">Password Reset successful. Redirecting to the Login Page...</div>');
                        setTimeout(function () {
                            window.location.href = 'index.php';
                        }, 4000); // Redirect after 4 seconds
            } else {
                console.log('Error resetting password or invalid response format.');
                $('.alert-container').html('<div class="alert text-center alert-danger" role="alert">AdminEmail and Username incorrect</div>');
                        setTimeout(function () {
                            window.location.href = 'forgetpassw.php';
                        }, 4000); // Redirect after 4 seconds
            }
        } catch (error) {
            console.error('Error parsing or handling response:', error);
            // Handle parsing error or unexpected response
        }
            // success: function (resetResponse) {
            //     try {
            //         // Parse JSON response
            //         const response = JSON.parse(resetResponse);

            //         if (response.status === 'success') {
            //             console.log('Password reset successful. Check your email.');
            //             $('.alert-container').html('<div class="alert text-center alert-success" role="alert">Password Reset successful. Redirecting to the Login Page...</div>');
            //             setTimeout(function () {
            //                 window.location.href = 'index.php';
            //             }, 4000); // Redirect after 4 seconds
            //         } else {
            //             console.log('Error resetting password.');
            //             $('.alert-container').html('<div class="alert text-center alert-danger" role="alert">AdminEmail and Username incorrect</div>');
            //             setTimeout(function () {
            //                 window.location.href = 'forgetpassw.php';
            //             }, 4000); // Redirect after 4 seconds
            //         }
            //     } catch (error) {
            //         console.error('Error parsing JSON:', error);
            //         // Handle parsing error or unexpected response
            //     }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                // Handle AJAX error
            }
        });
    });
});

    </script>
</body>
</html>
