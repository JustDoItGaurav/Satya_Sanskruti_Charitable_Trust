<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Checkout_styles.css">
    <link rel="stylesheet" href="Index_styles.css">
    <style>
        body {
            background-image: linear-gradient(to left, #ffd363, #fff);
        }

        .contact-section {
            padding: 2rem;
            margin-top: 5%;
        }

        /* Ensure the image and form columns have the same height */
        .contact-image,
        .contact-details {
            height: 100%; /* Make both columns take full height */
            display: flex;
            align-items: center; /* Center content vertically */
            justify-content: center; /* Center content horizontally */
        }

        .contact-image {
            background: url('Images/logo.png') center center no-repeat;
            background-size: cover;
            min-height: 400px; /* Set a minimum height for the image */
        }

        .contact-details {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px; /* Rounded corners for the form container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }

        /* Form styling */
        .form-label {
            font-weight: 500; /* Bold labels */
            color: #333; /* Darker text for better readability */
            margin-bottom: 0.5rem; /* Space between label and input */
        }

        .form-control {
            border: 1px solid #ddd; /* Light border */
            border-radius: 5px; /* Rounded corners for inputs */
            padding: 10px; /* Comfortable padding */
            font-size: 1rem; /* Consistent font size */
            margin-bottom: 1rem; /* Space between inputs */
        }

        .form-control:focus {
            border-color: #0e9e4f; /* Green border on focus */
            box-shadow: 0 0 5px rgba(14, 158, 79, 0.5); /* Subtle shadow on focus */
        }

        .form-select {
            border: 1px solid #ddd; /* Light border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px; /* Comfortable padding */
            font-size: 1rem; /* Consistent font size */
            margin-bottom: 1rem; /* Space below the select */
        }

        .form-select:focus {
            border-color: #0e9e4f; /* Green border on focus */
            box-shadow: 0 0 5px rgba(14, 158, 79, 0.5); /* Subtle shadow on focus */
        }

        .btn-primary {
            background-color: #0e9e4f; /* Green button */
            border: none; /* Remove default border */
            padding: 12px; /* Comfortable padding */
            font-size: 1rem; /* Consistent font size */
            transition: background-color 0.3s ease; /* Smooth hover effect */
        }

        .btn-primary:hover {
            background-color: #097c3c; /* Darker green on hover */
        }

        #loading-spinner {
            display: none;
            text-align: center;
            margin-top: 10px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .contact-image {
                min-height: 300px; /* Adjust height for smaller screens */
                margin-bottom: 1rem;
            }

            .contact-details {
                padding: 1.5rem; /* Slightly reduce padding on smaller screens */
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar1 fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand1" href="index.html">
                <img src="Images/logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                सत्य संस्कृति चैरिटेबल ट्रस्ट
            </a>
        </div>
    </nav>

    <!-- Contact Section -->
    <div class="container-fluid contact-section">
        <div class="row">
            <!-- Left Column: Image -->
            <div class="col-md-6 contact-image mb-3 mb-md-0">
                <!-- Add an image here -->
                <img src="Images/logo.png" alt="Form Image" class="img-fluid">
            </div>

            <!-- Right Column: Form -->
            <div class="col-md-6 contact-details d-flex flex-column justify-content-center">
                <form id="checkoutForm" action="Payscript.php" method="post" onsubmit="return submitForm(event)" class="mx-auto" style="max-width: 400px;">
                    <h3 class="text-center mb-4">Checkout Form (चेकआउट फॉर्म)</h3>

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="fname" class="form-label">Full Name (पूरा नाम)</label>
                        <input type="text" id="fname" name="name" class="form-control" placeholder="John M. Doe / जॉन एम. डो" required>
                    </div>

                    <!-- Email and Mobile -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email (ईमेल)</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile Number ( नंबर)</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="1234567890" required>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="adr" class="form-label">Address (पता)</label>
                        <input type="text" id="adr" name="address" class="form-control" placeholder="542 W. 15th Street / 542 डब्ल्यू. 15वीं स्ट्रीट" required>
                    </div>

                    <!-- Aadhar and PAN -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="aadhar" class="form-label">Aadhar Card (आधार कार्ड)</label>
                            <input type="text" id="aadhar" name="aadhar" class="form-control" placeholder="123456789012" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pan" class="form-label">PAN Card (पैन कार्ड)</label>
                            <input type="text" id="pan" name="pan" class="form-control" placeholder="ABCDE1234F" required>
                        </div>
                    </div>

                    <!-- Date of Birth and Hobbies -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth (जन्म तिथि)</label>
                            <input type="text" id="dob" name="dob" class="form-control" placeholder="DD/MM/YYYY" required>
                        </div>
                        <div class="col-md-6">
                            <label for="hobbies" class="form-label">Hobbies (शौक)</label>
                            <input type="text" id="hobbies" name="hobbies" class="form-control" placeholder="Reading, Coding, Music (पढ़ाई, कोडिंग, संगीत)" required>
                        </div>
                    </div>

                    <!-- Qualification -->
                    <div class="mb-3">
                        <label for="qualification" class="form-label">Academic Qualification / Job Designation (शैक्षिक योग्यता / नौकरी का पदनाम)</label>
                        <input type="text" id="qualification" name="qualification" class="form-control" placeholder="Bachelor's / Engineer (स्नातक / इंजीनियर)" required>
                    </div>

                    <!-- Membership -->
                    <div class="mb-3">
                        <label for="membership" class="form-label">Membership (सदस्यता)</label>
                        <select id="membership" name="membership" class="form-select" required>
                            <option value="" disabled selected>Select Membership Type (सदस्यता प्रकार चुनें)</option>
                            <option value="Life Membership">Life Membership (आजीवन सदस्यता)</option>
                            <option value="Ordinary Membership">Ordinary Membership (सामान्य सदस्यता)</option>
                        </select>
                    </div>

                    <!-- Loading spinner -->
                    <div id="loading-spinner">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p>Checking membership status...</p>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" id="submitBtn" class="btn btn-primary w-100">Pay Now (अब भुगतान करें)</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-firestore-compat.js"></script>

    <!-- Custom Script -->
    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyAO5xFUGkSTcJ5VEZS3O5T8h_m4lt4hVdc",
            authDomain: "satyasanskruticharitabletrust.firebaseapp.com",
            projectId: "satyasanskruticharitabletrust",
            storageBucket: "satyasanskruticharitabletrust.firebasestorage.app",
            messagingSenderId: "233629367169",
            appId: "1:233629367169:web:74a4ff7dbda70ec57dc680",
            measurementId: "G-X2N24095EC",
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const db = firebase.firestore();

        function validateForm() {
            const aadhar = document.getElementById("aadhar").value;
            const pan = document.getElementById("pan").value;
            const dob = document.getElementById("dob").value;
            const membership = document.getElementById("membership").value;

            const aadharPattern = /^[0-9]{12}$/;
            const panPattern = /^[A-Z0-9]{10}$/i;
            const dobPattern = /^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(\d{4})$/;

            if (!aadharPattern.test(aadhar)) {
                alert("Aadhar Card must be exactly 12 digits. (आधार कार्ड को ठीक 12 अंकों का होना चाहिए।)");
                return false;
            }

            if (!panPattern.test(pan)) {
                alert("PAN Card must be exactly 10 characters (Alphanumeric). (पैन कार्ड ठीक 10 वर्णों का होना चाहिए - अल्फान्यूमेरिक।)");
                return false;
            }

            if (!dobPattern.test(dob)) {
                alert("Date of Birth must be in DD/MM/YYYY format. (जन्म तिथि DD/MM/YYYY प्रारूप में होनी चाहिए।)");
                return false;
            }

            if (membership === "") {
                alert("Please select a membership type. (कृपया सदस्यता प्रकार चुनें।)");
                return false;
            }

            return true;
        }

        async function checkIfMemberExists(aadhar, pan) {
            try {
                // Query for Aadhar
                const aadharQuery = await db.collection("donations")
                    .where("aadhar", "==", aadhar)
                    .get();
                
                if (!aadharQuery.empty) {
                    const memberDoc = aadharQuery.docs[0].data();
                    return {
                        exists: true,
                        membershipType: memberDoc.membership
                    };
                }
                
                // Query for PAN
                const panQuery = await db.collection("donations")
                    .where("pan", "==", pan)
                    .get();
                
                if (!panQuery.empty) {
                    const memberDoc = panQuery.docs[0].data();
                    return {
                        exists: true,
                        membershipType: memberDoc.membership
                    };
                }
                
                return {
                    exists: false
                };
            } catch (error) {
                console.error("Error checking membership:", error);
                throw error;
            }
        }

        function storeFormData() {
            const formData = {
                name: document.getElementById("fname").value,
                email: document.getElementById("email").value,
                mobile: document.getElementById("mobile").value,
                address: document.getElementById("adr").value,
                aadhar: document.getElementById("aadhar").value,
                pan: document.getElementById("pan").value,
                dob: document.getElementById("dob").value,
                hobbies: document.getElementById("hobbies").value,
                qualification: document.getElementById("qualification").value,
                membership: document.getElementById("membership").value,
                timestamp: new Date().toISOString()
            };

            // Store form data in session storage
            sessionStorage.setItem('formData', JSON.stringify(formData));
        }

        async function submitForm(event) {
            event.preventDefault();
            
            if (!validateForm()) {
                return false;
            }
            
            // Show loading spinner
            document.getElementById("loading-spinner").style.display = "block";
            document.getElementById("submitBtn").disabled = true;
            
            try {
                const aadhar = document.getElementById("aadhar").value;
                const pan = document.getElementById("pan").value;
                
                // Check if member already exists
                const memberStatus = await checkIfMemberExists(aadhar, pan);
                
                // Hide loading spinner
                document.getElementById("loading-spinner").style.display = "none";
                document.getElementById("submitBtn").disabled = false;
                
                if (memberStatus.exists) {
                    alert(`You are already a ${memberStatus.membershipType} member. (आप पहले से ही ${memberStatus.membershipType === 'Life Membership' ? 'आजीवन सदस्य' : 'सामान्य सदस्य'} हैं।)`);
                    return false;
                }
                
                // Store form data and submit the form
                storeFormData();
                document.getElementById("checkoutForm").submit();
                return true;
                
            } catch (error) {
                console.error("Error during form submission:", error);
                document.getElementById("loading-spinner").style.display = "none";
                document.getElementById("submitBtn").disabled = false;
                alert("An error occurred. Please try again. (एक त्रुटि हुई। कृपया पुनः प्रयास करें।)");
                return false;
            }
        }
    </script>
</body>
</html>