<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Inquiry</title>
    <link rel="stylesheet" href="css///messaging.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="messaging_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <div class="contact-container">
        <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
            <div class="contact-left-title">
                <h2>Get in touch</h2>
                <p>Reach out with your questions about our dorm apartments or inquiries, and let us help you find your perfect space!</p>
                <hr>
            </div>
            <input type="hidden" name="access_key" value="eb4ef8b5-a2f1-4c94-9c30-5c790a5799b5">
            <input type="text" name="name" placeholder="Your Name" class="contact-inputs" required>
            <input type="text" name="email" placeholder="Your email" class="contact-inputs" required>
            <textarea name="message" placeholder="Type Here" class="contact-inputs" require></textarea>
            <button type="submit">Submit</button>
        </form>
        <div class="contact-right">
            <img src="/Assets/mail.png" alt="">
        </div>
    </div>
</body>
</html>