<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Razorpay Test API Key
$apiKey = "rzp_test_e9b72njeFD2yeM";

// Ensure required POST variables are set
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize POST data
    $amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 0;
    $orderId = isset($_POST['orderid']) ? htmlspecialchars($_POST['orderid']) : 'OID' . rand(100, 1000);
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'John Doe';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : 'john@example.com';
    $mobile = isset($_POST['mobile']) ? htmlspecialchars($_POST['mobile']) : '1234567890';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $aadhar = isset($_POST['aadhar']) ? htmlspecialchars($_POST['aadhar']) : '';
    $pan = isset($_POST['pan']) ? htmlspecialchars($_POST['pan']) : '';
    $dob = isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : '';
    $hobbies = isset($_POST['hobbies']) ? htmlspecialchars($_POST['hobbies']) : '';
    $qualification = isset($_POST['qualification']) ? htmlspecialchars($_POST['qualification']) : '';
    $membership = isset($_POST['membership']) ? htmlspecialchars($_POST['membership']) : ''; // Corrected typo
    $imageUrl = isset($_POST['imageUrl']) ? htmlspecialchars($_POST['imageUrl']) : ''; // Add image URL

   

    // Validate membership and amount
    if (empty($membership) || ($membership !== 'Lifetime trustie' && $membership !== 'Member')) {
        echo "Invalid membership type!";
        exit;
    }

    if ($amount <= 0) {
        echo "Invalid amount! Amount must be greater than 0.";
        exit;
    }
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
    <link rel="stylesheet" href="Payscript_styles.css">
</head>
<body>
<div class="checkout-container">
        <h2>Paying amount: ₹<?php echo number_format($amount, 2); ?></h2> <!-- Display actual amount -->
        <button id="pay-button">Pay with Razorpay</button>
    </div>

    <script>
        // Store form data in session storage before payment
        const formData = {
            name: "<?php echo $name; ?>",
            email: "<?php echo $email; ?>",
            mobile: "<?php echo $mobile; ?>",
            address: "<?php echo $address; ?>",
            aadhar: "<?php echo $aadhar; ?>",
            pan: "<?php echo $pan; ?>",
            dob: "<?php echo $dob; ?>",
            hobbies: "<?php echo $hobbies; ?>",
            qualification: "<?php echo $qualification; ?>",
            membership: "<?php echo $membership; ?>",
            imageUrl: "<?php echo $imageUrl; ?>" // Include image URL
        };
        sessionStorage.setItem('formData', JSON.stringify(formData));

        // Razorpay payment options
        var options = {
            "key": "<?php echo $apiKey; ?>",
            "amount": "<?php echo $amount * 100; ?>", // Amount in paise
            "currency": "INR",
            "name": "Satya Sanskruti Charitable Trust",
            "description": "Training & Development",
            "image": "",
            "prefill": {
                "name": "<?php echo $name; ?>",
                "email": "<?php echo $email; ?>",
                "contact": "<?php echo $mobile; ?>"
            },
            "theme": {
                "color": "#0e9e4f"
            },
            "handler": function (response) {
                // Redirect to success page with payment ID and form data
                window.location.href = `Success.html?payment_id=${response.razorpay_payment_id}`;
            },
            "modal": {
                "ondismiss": function () {
                    // Redirect to failure page if payment is canceled
                    window.location.href = "Failure.html";
                }
            }
        };

        var rzp = new Razorpay(options);

        // Open Razorpay payment modal
        document.getElementById('pay-button').onclick = function (e) {
            rzp.open();
            e.preventDefault();
        };

        // Handle payment failures explicitly
        rzp.on('payment.failed', function (response) {
            window.location.href = "Failure.html";
        });
    </script>
</body>
</html>