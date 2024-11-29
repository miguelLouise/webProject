<?php
require_once "./includes/login/login_view.php";
include "./middleware/user_middleware.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/aboutus.css">
</head>
<body style="background-image: url('Assets/newbg.png'); background-repeat: no-repeat; background-position: center; background-size: cover;">
    <div class="about_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <div class="about-container">
        <h1>About Us</h1>
        <p>Welcome to our DormLink! We are dedicated to providing high-quality services to our clients. With a focus on professionalism and innovation, we strive to meet and exceed expectations in everything we do.</p>
        <p>Lavanders Place is ideally located in the center of University Belt, offering a convenient and affordable living option. Designed for students and professionals, the residence focuses on creating a comfortable environment with modern amenities and well-maintained facilities. Lavender's Place is committed to addressing tenant concerns quickly, ensuring a smooth and stress-free stay for all residents. </p>
        <p>We at 1277 Apartments our team consists of experienced professionals who are passionate about delivering exceptional results. We believe in a customer-centric approach and work hard to ensure client satisfaction at every step.</p>
        <p>Thank you for visiting our page. We look forward to working with you and building a long-lasting relationship!</p>
    </div>
</body>
</html>
