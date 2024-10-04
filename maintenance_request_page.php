<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Request</title>
    <link rel="stylesheet" href="css/maintenance_request.css">
</head>

<body>

    <div class="maintenance_req_container1">
        <!-- header -->
        <?php include('./templates/logged_in_header.php'); ?>
        <!-- header -->
    </div>

    <!-- page content -->
    <div class="container1">
        <div class="left-column">
            <h2>Submit</h2>
            <h1>Maintenance Requests</h1>
            <p>Welcome to Lavenders Place Dorm! If you encounter any issues within your apartment, please submit a maintenance request using the form below. Our team is dedicated to ensuring your comfort and promptly addressing your concerns.</p>
            <p><strong>1277 Apartments Admin:</strong> Please allow up to 48 hours for our team to respond to your request. We appreciate your patience as we work to ensure a comfortable living experience at Lavenders Place.</p>
            <p>Lavenders Place</p>
        </div>
        <div class="right-column">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="unit-number">Unit Number *</label>
                    <input type="text" id="unit-number" name="unit-number" required>
                </div>
                <div class="form-group">
                    <label for="category">Issue Category</label>
                    <select id="category" name="category" required>
                        <option value="electrical">Electrical</option>
                        <option value="plumbing">Plumbing</option>
                        <option value="hvac">HVAC</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Issue Urgency</label>
                    <div class="urgency-options">
                        <div>
                            <input type="radio" id="low" name="urgency" value="low" required>
                            <label for="low">Low</label>
                        </div>
                        <div>
                            <input type="radio" id="medium" name="urgency" value="medium" required>
                            <label for="medium">Medium</label>
                        </div>
                        <div>
                            <input type="radio" id="high" name="urgency" value="high" required>
                            <label for="high">High</label>
                        </div>
                        <div>
                            <input type="radio" id="emergency" name="urgency" value="emergency" required>
                            <label for="emergency">Emergency</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Describe The Issue *</label>
                    <textarea id="description" name="description" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        </div>
    </div>

    <!--  radio buttons function -->
    <script>
        document.querySelectorAll('input[type="radio"]').forEach((radio) => {
            radio.addEventListener('click', () => {
                console.log(`${radio.id} selected`);
            });
        });

        // combo box selection
        document.querySelector('#category').addEventListener('change', (e) => {
            console.log(`${e.target.value} selected`);
        });
    </script>

</body>
</html>
