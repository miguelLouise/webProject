<?php
require_once "./includes/login/login_view.php";
//include "./middleware/admin_middleware.php";//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Management</title>
    <link rel="stylesheet" href="css/tenant_management.css">
</head>
<body>
<div class="tenant_management_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
        <h1>New Tenant Registration</h1>
        <form id="tenant-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <span class="note">This device is not supported for taking photos.</span>
                    <div class="photo-actions">
                        <button type="button" id="takePhoto">Take Photo</button>
                        <span> -OR- </span>
                        <input type="file" id="photo">
                    </div>
                </div>
                <div class="form-group">
                    <!-- Empty  -->
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="dob">DOB</label>
                    <input type="date" id="dob" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div class="radio-group">
                        <label><input type="radio" name="gender" value="Male" required> Male</label>
                        <label><input type="radio" name="gender" value="Female"> Female</label>
                        <label><input type="radio" name="gender" value="Other"> Other</label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" placeholder="Address" required>
                </div>
                <div class="form-group">
                    <label for="unit">Unit No.</label>
                    <select id="unit">
                        <option value="" disabled selected>--Select Unit--</option>
                        <option value="101">101</option>
                        <option value="102">102</option>
                        <option value="103">103</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="tel" id="contact" placeholder="Contact" required>
                </div>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Unit No.</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="tenant-list">
                <!-- Data will be dynamically added here -->
            </tbody>
        </table>
    </div>

    <script src="javascript/tenant_management_page_admin.js"></script>

    
</body>
</html>