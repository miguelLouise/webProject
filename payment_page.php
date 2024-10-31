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

    <main>
        <h1>My Payment Schedule</h1>
        <section class="payment-schedule">
            <table>
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Due Date</th>
                        <th>Amount Due</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Default 6-month schedule -->
                    <tr>
                        <td>Month 1</td>
                        <td></td>
                        <td></td>
                        <td class="status unpaid"></td>
                    </tr>
                    <tr>
                        <td>Month 2</td>
                        <td></td>
                        <td></td>
                        <td class="status"></td>
                    </tr>
                    <tr>
                        <td>Month 3</td>
                        <td></td>
                        <td></td>
                        <td class="status"></td>
                    </tr>
                    <tr>
                        <td>Month 4</td>
                        <td></td>
                        <td></td>
                        <td class="status"></td>
                    </tr>
                    <tr>
                        <td>Month 5</td>
                        <td></td>
                        <td></td>
                        <td class="status"></td>
                    </tr>
                    <tr>
                        <td>Month 6</td>
                        <td></td>
                        <td></td>
                        <td class="status"></td> 
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
    <script src="javascript/payment_page.js"></script>
</body>
</html>