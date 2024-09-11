<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email settings
    $to = 'paszbyforgold@gmail.com'; // Your email address
    $subject = 'Contact Form Submission';
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Prepare email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo '<p>Thank you for your message. We will get back to you soon.</p>';
    } else {
        echo '<p>Sorry, something went wrong. Please try again later.</p>';
    }
} else {
    echo '<p>Invalid request.</p>';
}
?>
