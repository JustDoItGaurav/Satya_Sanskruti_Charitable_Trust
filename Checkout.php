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
    <link rel="stylesheet" href="Checkout_Form.css">
   
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
<div class="container-fluid contact-section d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <!-- Form Container -->
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
                <select id="membership" name="membership" class="form-select" required onchange="updateAmount()">
                    <option value="" disabled selected>Select Membership Type (सदस्यता प्रकार चुनें)</option>
                    <option value="Lifetime trustie">Lifetime trustie (आजीवन सदस्यता)</option>
                    <option value="Member">Member (सामान्य सदस्यता)</option>
                </select>
            </div>

            <!-- Hidden Input for Amount -->
            <input type="hidden" id="amount" name="amount" value="">

            <!-- Image Upload -->
            <div class="mb-3">
                <label for="userImage" class="form-label">Upload Image (छवि अपलोड करें)</label>
                <input type="file" id="userImage" name="userImage" class="form-control" accept="image/*" required>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-firestore-compat.js"></script>

    <!-- Cloudinary SDK -->
    <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>

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

        // Cloudinary configuration
        const cloudinaryConfig = {
            cloudName: 'db7yf7rsy', // Replace with your Cloudinary cloud name
            uploadPreset: 'user_image_preset' // Replace with your Cloudinary upload preset
        };

        // Function to update the amount based on membership selection
        function updateAmount() {
            const membership = document.getElementById("membership").value;
            const amountInput = document.getElementById("amount");

            if (membership === "Lifetime trustie") {
                amountInput.value = 21000;
            } else if (membership === "Member") {
                amountInput.value = 501;
            } else {
                amountInput.value = "";
            }

            // Debugging: Log the amount value
            console.log("Selected Membership:", membership);
            console.log("Amount Set:", amountInput.value);
        }

        // Function to upload image to Cloudinary
        async function uploadImageToCloudinary(file) {
            const formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', cloudinaryConfig.uploadPreset);

            const response = await fetch(`https://api.cloudinary.com/v1_1/${cloudinaryConfig.cloudName}/image/upload`, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();
            return data.secure_url; // Return the image URL
        }

        // Function to validate form inputs
        function validateForm() {
            const aadhar = document.getElementById("aadhar").value;
            const pan = document.getElementById("pan").value;
            const dob = document.getElementById("dob").value;
            const membership = document.getElementById("membership").value;
            const amount = document.getElementById("amount").value;

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

            if (amount <= 0) {
                alert("Invalid amount! Please select a valid membership type. (अमान्य राशि! कृपया एक वैध सदस्यता प्रकार चुनें।)");
                return false;
            }

            return true;
        }

        // Function to check if member already exists
        async function checkIfMemberExists(aadhar, pan, email, mobile) {
            try {
                // Query for Aadhar
                const aadharQuery = await db.collection("donations")
                    .where("aadhar", "==", aadhar)
                    .get();
                
                if (!aadharQuery.empty) {
                    const memberDoc = aadharQuery.docs[0].data();
                    return {
                        exists: true,
                        membershipType: memberDoc.membership,
                        reason: "Aadhar Card"
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
                        membershipType: memberDoc.membership,
                        reason: "PAN Card"
                    };
                }

                // Query for Email
                const emailQuery = await db.collection("donations")
                    .where("email", "==", email)
                    .get();
                
                if (!emailQuery.empty) {
                    const memberDoc = emailQuery.docs[0].data();
                    return {
                        exists: true,
                        membershipType: memberDoc.membership,
                        reason: "Email"
                    };
                }

                // Query for Mobile
                const mobileQuery = await db.collection("donations")
                    .where("mobile", "==", mobile)
                    .get();
                
                if (!mobileQuery.empty) {
                    const memberDoc = mobileQuery.docs[0].data();
                    return {
                        exists: true,
                        membershipType: memberDoc.membership,
                        reason: "Mobile Number"
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

        // Function to handle form submission
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
                const email = document.getElementById("email").value;
                const mobile = document.getElementById("mobile").value;
                
                // Check if member already exists
                const memberStatus = await checkIfMemberExists(aadhar, pan, email, mobile);
                
                if (memberStatus.exists) {
                    let message = `This ${memberStatus.reason} is already registered as a ${memberStatus.membershipType} member.`;
                    message += `\n(यह ${getHindiReason(memberStatus.reason)} पहले से ही ${memberStatus.membershipType === 'Lifetime trustie' ? 'आजीवन सदस्य' : 'सामान्य सदस्य'} के रूप में पंजीकृत है।)`;
                    alert(message);
                    document.getElementById("loading-spinner").style.display = "none";
                    document.getElementById("submitBtn").disabled = false;
                    return false;
                }
                
                // Upload image to Cloudinary
                const imageFile = document.getElementById("userImage").files[0];
                const imageUrl = await uploadImageToCloudinary(imageFile);
                
                // Add the image URL to a hidden input field
                const hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "imageUrl";
                hiddenInput.value = imageUrl;
                document.getElementById("checkoutForm").appendChild(hiddenInput);

                // Submit the form to Payscript.php
                document.getElementById("checkoutForm").submit();
            } catch (error) {
                console.error("Error during form submission:", error);
                document.getElementById("loading-spinner").style.display = "none";
                document.getElementById("submitBtn").disabled = false;
                alert("An error occurred. Please try again. (एक त्रुटि हुई। कृपया पुनः प्रयास करें।)");
                return false;
            }
        }

        // Helper function to get Hindi translations for reasons
        function getHindiReason(reason) {
            const translations = {
                "Aadhar Card": "आधार कार्ड",
                "PAN Card": "पैन कार्ड",
                "Email": "ईमेल",
                "Mobile Number": "मोबाइल नंबर"
            };
            return translations[reason] || reason;
        }
    </script>
</body>
</html>