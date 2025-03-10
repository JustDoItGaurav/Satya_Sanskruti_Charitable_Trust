<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Razorpay Test API Key
$apiKey = "rzp_test_MVsyK2krAQ5CZs";

// Ensure required POST variables are set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = isset($_POST['amount']) ? $_POST['amount'] : 0;
    $orderId = isset($_POST['orderid']) ? $_POST['orderid'] : 'OID' . rand(100, 1000);
    $name = isset($_POST['name']) ? $_POST['name'] : 'John Doe';
    $email = isset($_POST['email']) ? $_POST['email'] : 'john@example.com';
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '1234567890';
} else {
    echo "No POST data received!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Checkout</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .checkout-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 90%;
            max-width: 400px;
            text-align: center;
        }
        .checkout-container h2 {
            color: #0e9e4f;
            margin-bottom: 20px;
        }
        .checkout-container button {
            background-color: #0e9e4f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .checkout-container button:hover {
            background-color: #0c7b3e;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout Form</h2>
        <button id="pay-button">Pay with Razorpay</button>
    </div>

    <script>
        var options = {
            "key": "<?php echo $apiKey; ?>",
            "amount": "<?php echo $amount * 100; ?>", 
            "currency": "INR",
            "name": "Traidev Solutions",
            "description": "Training & Development",
            "image": "https://traidev.com/img/web-design-development.png",
            "prefill": {
                "name": "<?php echo $name; ?>",
                "email": "<?php echo $email; ?>",
                "contact": "<?php echo $mobile; ?>"
            },
            "theme": {
                "color": "#0e9e4f"
            },
            "handler": function (response) {
                // ✅ Redirect to success page only when payment is successful
                window.location.href = "Success.html";
            },
            "modal": {
                "ondismiss": function () {
                    // ✅ If user cancels or closes Razorpay modal, redirect to unsuccessful page
                    window.location.href = "Failure.html";
                }
            }
        };

        var rzp = new Razorpay(options);

        document.getElementById('pay-button').onclick = function (e) {
            rzp.open();
            e.preventDefault();
        };

        // ✅ Handle payment failures explicitly
        rzp.on('payment.failed', function (response) {
            window.location.href = "Failure.html";
        });
    </script>
</body>
</html>