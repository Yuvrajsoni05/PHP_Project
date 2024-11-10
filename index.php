<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Software</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function calculateTotal() {
            let price = parseFloat(document.getElementById('price').value) || 0;
            let weight = parseFloat(document.getElementById('weight').value) || 0;
            let majuri = parseFloat(document.getElementById('majuri').value) || 0;
            let discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;

            let subtotal = (price * weight) + majuri;
            let discountAmount = (subtotal * discountPercentage) / 100;
            let totalAmount = subtotal - discountAmount;

            document.getElementById('amount').value = totalAmount.toFixed(2);
        }

        function printReceipt() {
            // Populate the print section with form data
            document.getElementById('printName').textContent = document.getElementById('name').value;
            document.getElementById('printPhoneNumber').textContent = document.getElementById('phone_number').value;
            document.getElementById('printVillageName').textContent = document.getElementById('village_name').value;
            document.getElementById('printItem').textContent = document.getElementById('item').value;
            document.getElementById('printPrice').textContent = document.getElementById('price').value;
            document.getElementById('printWeight').textContent = document.getElementById('weight').value;
            document.getElementById('printMajuri').textContent = document.getElementById('majuri').value;
            document.getElementById('printDiscount').textContent = document.getElementById('discount_percentage').value + "%";
            document.getElementById('printAmount').textContent = document.getElementById('amount').value;
            document.getElementById('printPaymentMethod').textContent = document.getElementById('payment_method').value;

            // Trigger the print
            let receiptContent = document.getElementById('printSection').innerHTML;
            let originalContent = document.body.innerHTML;

            document.body.innerHTML = receiptContent;
            window.print();
            document.body.innerHTML = originalContent;
        }
    </script>

    <style>
        @media print {
            .no-print {
                display: none;
            }
        }


        .receipt {
            width: 80mm;
            margin: auto;
        }


        .receipt-header, .receipt-footer {
            text-align: center;
        }

        .receipt table {
            width: 100%;
        }

        .receipt table th, .receipt table td {
            text-align: left;
            padding: 5px 0;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2>Billing Data</h2>
        <form id="billingForm" action="" method="post">

            <!-- Customer Details -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control form-control-sm" id="name" name="name" required>
                </div>
                <div class="col-md-4">
                    <label for="phone_number" class="form-label">Phone Number:</label>
                    <input type="text" class="form-control form-control-sm" id="phone_number" name="phone_number" required>
                </div>
                <div class="col-md-4">
                    <label for="village_name" class="form-label">Village Name:</label>
                    <input type="text" class="form-control form-control-sm" id="village_name" name="village_name" required>
                </div>
            </div>

            <!-- Item Details -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="item" class="form-label">Item:</label>
                    <select class="form-select form-select-sm" id="item" name="item" required>
                        <option value="Gold Necklace">Gold Necklace</option>
                        <option value="Silver Ring">Silver Ring</option>
                        <option value="Gold Earrings">Gold Earrings</option>
                        <option value="Silver Bracelet">Silver Bracelet</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="price" class="form-label">Price (per gram):</label>
                    <input type="number" class="form-control form-control-sm" id="price" name="price" step="0.01" required oninput="calculateTotal()">
                </div>
                <div class="col-md-4">
                    <label for="weight" class="form-label">Weight (grams):</label>
                    <input type="number" class="form-control form-control-sm" id="weight" name="weight" step="0.01" required oninput="calculateTotal()">
                </div>
            </div>

            <!-- Majuri and Discount -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="majuri" class="form-label">Majuri (Service/Labor Charge):</label>
                    <input type="number" class="form-control form-control-sm" id="majuri" name="majuri" step="0.01" required oninput="calculateTotal()">
                </div>
                <div class="col-md-4">
                    <label for="discount_percentage" class="form-label">Discount Percentage:</label>
                    <input type="number" class="form-control form-control-sm" id="discount_percentage" name="discount_percentage" step="0.01" required oninput="calculateTotal()">
                </div>
                <div class="col-md-4">
                    <label for="amount" class="form-label">Total Amount:</label>
                    <input type="number" class="form-control form-control-sm" id="amount" name="amount" step="0.01" readonly>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="payment_method" class="form-label">Payment Method:</label>
                    <select class="form-select form-select-sm" id="payment_method" name="payment_method" required>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Debit Card">Debit Card</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm no-print">Submit</button>
                <button type="button" class="btn btn-secondary btn-sm no-print" onclick="printReceipt()">Print</button>
            </div>
        </form>
    </div>

    <!-- Print Section -->
    <div id="printSection" style="display: none;">
        <div class="receipt">
            <div class="receipt-header">
                <h3>Rudrax </h3>
                <p>Address Line 1, City, Country</p>
            </div>
            <hr>
            <h4>Receipt</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Customer Name:</td>
                        <td id="printName"></td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td id="printPhoneNumber"></td>
                    </tr>
                    <tr>
                        <td>Village Name:</td>
                        <td id="printVillageName"></td>
                    </tr>
                    <tr>
                        <td>Item:</td>
                        <td id="printItem"></td>
                    </tr>
                    <tr>
                        <td>Price (per gram):</td>
                        <td id="printPrice"></td>
                    </tr>
                    <tr>
                        <td>Weight (grams):</td>
                        <td id="printWeight"></td>
                    </tr>
                    <tr>
                        <td>Majuri:</td>
                        <td id="printMajuri"></td>
                    </tr>
                    <tr>
                        <td>Discount:</td>
                        <td id="printDiscount"></td>
                    </tr>
                    <tr>
                        <td>Total Amount:</td>
                        <td id="printAmount"></td>
                    </tr>
                    <tr>
                        <td>Payment Method:</td>
                        <td id="printPaymentMethod"></td>
                    </tr>
                </tbody>
            </table>
            <div class="receipt-footer">
                <p>Thank you for your business!</p>
                <p>Date: <span id="printDate"></span></p>
            </div>
        </div>
    </div>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bill";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone_number'];
        $village = $_POST['village_name'];
        $item = $_POST['item'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $majuri = $_POST['majuri'];
        $discount_percentage = $_POST['discount_percentage'];
        $amount = $_POST['amount']; // Directly using the calculated amount from form
        $payment = $_POST['payment_method'];

        $insert = "INSERT INTO billdata(name, phone_number, village_name, item, price, weight, majuri, amount, payment_method)
                   VALUES('$name', '$phone', '$village', '$item', '$price', '$weight', '$majuri', '$amount', '$payment')";

        if ($conn->query($insert) === TRUE) {
            echo "<div class='alert alert-success mt-3'>Data Inserted Successfully</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
        }
    }

    $conn->close();
    ?>

</body>
</html>
