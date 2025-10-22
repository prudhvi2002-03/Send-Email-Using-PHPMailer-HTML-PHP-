<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $fromEmail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';  // Gmail SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'prudhvinarayana2002@gmail.com';  // Your Gmail address
        $mail->Password   = 'uaeo ulnh vpbj mgpy';    // Your Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom($fromEmail, $name);
        $mail->addAddress('recipient@example.com');  // Change to your recipient

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<h3>New message from $name ($fromEmail)</h3>
                          <p>$message</p>";

        $mail->send();
        echo "<h2 style='color:green;text-align:center;'>✅ Message sent successfully!</h2>";
    } catch (Exception $e) {
        echo "<h3 style='color:red;text-align:center;'>❌ Message could not be sent. Error: {$mail->ErrorInfo}</h3>";
    }
}
?>
