<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email address to receive the message
    $to = "amandajeewanthi663@gmail.com";
    
    // Subject of the email
    $subject = "New Message from Contact Form";
    
    // Compose the email message
    $body = "Hello $name,\n\nThank you for reaching out to me. I have received your message:\n\n$message\n\nI will get back to you soon.\n\nBest regards,\n[Your Name]";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message! I'll get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // If the form is not submitted, show the HTML form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <div class="footer-contact-form">
        <h5>Contact Form</h5>
        <form class="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="contact-form__input">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <textarea name="message" placeholder="Message" required></textarea>
            <input type="submit" name="submit" value="Submit" class="submit-button">
        </form>
    </div>
</body>
</html>
<?php
}
?>
