<?php
require_once './includes/login/login_view.php';
include './middleware/user_middleware.php';
require_once './includes/dbh.inc.php';
require_once 'includes/dp_management/downpayment_management_view.php';
require_once 'includes/tenant_management/tenant_management_view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>
    <div class="payment_page_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <div class="down-payment-container">
        <div class="payment-card">
            <!-- QR Code Section -->
            <div class="left-section">
                <h2>Reservation Down Payment</h2>
                <p class="note">*Note strictly no cancellation</p>
                <p class="note">*Your Downpayment will be valid for 5 to 7 days</p>
                <img src="./Assets/sampqr.png" alt="QR Code" class="qr-code">
            </div>

            <!-- Form  -->
            <div class="right-section">
                <form action="includes/dp_management/downpayment_management.php" method="post" enctype="multipart/form-data" novalidate>
                <?php does_user_have_a_reservation($dbconn, $_SESSION["user_id"]);?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" value="<?php display_message("reservation_name");?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" value="<?php display_message("reservation_contact_number");?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="reference">Payment Reference Number</label>
                        <textarea id="reference" name="reference" placeholder="Enter payment reference number"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="screenshot">Upload Gcash Payment Screenshot</label>
                        <!-- <input type="file" id="screenshot" name="screenshot" accept="image/*" required> -->
                        <!-- accept=".jpg, .jpeg, .png" -->
                        <input type="file" id="screenshot" name="screenshot">
                    </div>

                    <button type="submit">Submit Payment</button>
                    <div class="display_msg_container">
                    <p><?php display_message("user_does_not_have_a_reservation");?></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Popup Modal -->
    <div id="popupModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <p>Payment Submitted Successfully!</p>
        </div>
    </div>
    <script src="javascript/payment_page.js"></script>
</body>
</html>