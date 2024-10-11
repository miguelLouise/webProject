<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenanace Request Management</title>
    <link rel="stylesheet" href="css/maintenanace_request_management.css">
</head>
<body>
    <div class="maintenance_management_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header_admin.php'); ?>
        <!-- header -->
    </div>

    <div class="container">
        <h1>Manage Maintenance Request</h1>
        <div class="date-time" id="dateTime"></div>
        <table class="request-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Unit Number</th>
                    <th>Date</th>
                    <th>Issue Category</th>
                    <th>Issue Urgency</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="maintenance-requests">
                <!-- Sample data will be dynamically inserted here -->
            </tbody>
        </table>
    </div>

    <script src="javascript/maintenance_request_management.js"></script>
    
</body>
</html>