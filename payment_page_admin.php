<?php
require_once './includes/login/login_view.php';
include './middleware/admin_middleware.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Recods</title>
    <link rel="stylesheet" href="css/payment_admin.css">
</head>

<body>
    <div class="payment_admin_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
        <h2>Tenant Payment Records</h2>
        <form id="paymentForm">
        <label for="tenantName">Tenant Name:</label>
        <input type="text" id="tenantName" name="tenantName" required>

        <label for="unitNumber">Unit Number:</label>
        <input type="text" id="unitNumber" name="unitNumber" required>

        <label for="billAmount">Bill Amount:</label>
        <input type="number" id="billAmount" name="billAmount" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="dueDate">Due Date:</label>
        <input type="date" id="dueDate" name="dueDate" required>

        <label for="paymentStatus">Payment Status:</label>
        <select id="paymentStatus" name="paymentStatus">
            <option value="Paid">Paid</option>
            <option value="Unpaid">Unpaid</option>
        </select>
        <br>
        <input type="submit" value="Add Record" id="add_record_btn">
        </form>

        <table id="paymentTable">
        <thead>
            <tr>
            <th>Tenant Name</th>
            <th>Unit Number</th>
            <th>Bill Amount</th>
            <th>Email</th>
            <th>Due Date</th>
            <th>Payment Status</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        </tbody>
        </table>
    </div>

    <script src="javascript/payment_page_admin.js"></script>

</body>
</html>