<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require 'vendor/autoload.php'; // Path to autoload.php for PHPMailer

include('include/db_con.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminEmail = $_POST['adminEmail'];
    $adminUsername = $_POST['adminUsername'];
    $hashedDefaultPassword = $_POST['hashedPassword']; // Hashed default password 'examsttu'

    try {
        
        // Prepare and execute the SELECT query
        $stmt = $conn->prepare("SELECT * FROM administrator WHERE admin_email = :email AND username = :username");
        $stmt->bindParam(':email', $adminEmail);
        $stmt->bindParam(':username', $adminUsername);
        $stmt->execute();

        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            // Credentials match, reset the password to the hashed default password 'examsttu'
            $updateStmt = $conn->prepare("UPDATE administrator SET password = :password WHERE admin_email = :email AND username = :username");
            $updateStmt->bindParam(':password', $hashedDefaultPassword);
            $updateStmt->bindParam(':email', $adminEmail);
            $updateStmt->bindParam(':username', $adminUsername);
            $updateStmt->execute();
           // Respond with success as JSON
           header('Content-Type: application/json');
           echo json_encode(["status" => "success"]);
       } else {
           // Credentials don't match, return failure as JSON
           header('Content-Type: application/json');
           echo json_encode(["status" => "failure"]);
           exit(); // Terminate script after sending JSON response
       }

        try {
              //Server settings
              $mail = new PHPMailer(true);
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
              $mail->SMTPAuth = true;
              $mail->Username = 'kwesime3@gmail.com'; // Replace with your email
              $mail->Password = 'pmlztbvyatzftjdr'; // Replace with your email password
              $mail->SMTPSecure = 'tls';
              $mail->Port = 587;
      
              //Recipients
              $mail->setFrom('inbitfirm@gmail.com', 'Nana Botwe');
              $mail->addAddress($adminEmail); // Recipient email
              $mail->addReplyTo('inbitfirm@gmail.com', 'Nana Botwe');

              //Content
              $mail->isHTML(true);
              $mail->Subject = 'Password Updated';
              $mail->Body    = 'Hello '.$adminEmail .'<br>Your password has been updated. <br>Your new password is: examsttu and <br>
              Your username is: '.$adminUsername;  
              
              $mail->send();
              
            //   echo 'success';
          } catch (Exception $e) {
            
              echo "Mailer Error: {$mail->ErrorInfo}";
          }
      } catch(PDOException $e) {
          echo 'Error: ' . $e->getMessage();
      }
  
    $conn = null; // Close the database connection
}
?>
