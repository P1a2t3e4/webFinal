<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    <style>
        /* CSS styles */
        /* Import Google Fonts */
        /* Reset CSS */

        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: lightblue;
            padding: 0 10px;
        }

        .wrapper {
            max-width: 500px;
            width: 100%;
            background: #fff;
            margin: 50px auto;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.125);
            padding: 30px;
            text-align: center;
        }

        .wrapper .title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        .wrapper .form {
            width: 100%;
        }

        .wrapper .form .inputfield {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .wrapper .form .inputfield label {
            width: 200px;
            color: #757575;
            margin-right: 10px;
            font-size: 14px;
            text-align: left;
        }

        .wrapper .form .inputfield .input,
        .wrapper .form .inputfield .textarea,
        .wrapper .form .inputfield .custom_select select {
            width: 100%;
            outline: none;
            border: 1px solid #d5dbd9;
            font-size: 15px;
            padding: 8px 10px;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .wrapper .form .inputfield .textarea {
            height: 125px;
            resize: none;
        }

        .wrapper .form .inputfield .custom_select {
            position: relative;
            height: 37px;
        }

        .wrapper .form .inputfield .custom_select select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            outline: none;
            border: 0px;
            padding: 8px 10px;
            font-size: 15px;
            border: 1px solid #d5dbd9;
            border-radius: 3px;
        }

        .wrapper .form .inputfield .input:focus,
        .wrapper .form .inputfield .textarea:focus,
        .wrapper .form .inputfield .custom_select select:focus {
            border: 1px solid #fec107;
        }

        .wrapper .form .inputfield p {
            font-size: 14px;
            color: #757575;
            text-align: left;
        }

        .wrapper .form .inputfield .check {
            width: 15px;
            height: 15px;
            position: relative;
            display: block;
            cursor: pointer;
        }

        .wrapper .form .inputfield .check input[type="checkbox"] {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .wrapper .form .inputfield .check .checkmark {
            width: 15px;
            height: 15px;
            border: 1px solid lightblue;
            display: block;
            position: relative;
        }

        .wrapper .form .inputfield .check .checkmark:before {
            content: "";
            position: absolute;
            top: 1px;
            left: 2px;
            width: 5px;
            height: 2px;
            border: 2px solid;
            border-color: transparent transparent #fff #fff;
            transform: rotate(-45deg);
            display: none;
        }

        .wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark {
            background: #208ad6;
        }

        .wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before {
            display: block;
        }

        .wrapper .form .inputfield .btn {
            width: 100%;
            padding: 8px 10px;
            font-size: 15px;
            border: 0px;
            background: #3096eb;
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            outline: none;
        }

        .wrapper .form .inputfield .btn:hover {
            background: #4abdeb;
        }

        .wrapper .form .inputfield:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 420px) {
            .wrapper .form .inputfield {
                flex-direction: column;
                align-items: flex-start;
            }

            .wrapper .form .inputfield label {
                margin-bottom: 5px;
            }

            .wrapper .form .inputfield.terms {
                flex-direction: row;
            }
        }
    </style>
     </style>
    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="title">Registration Form</div>
    <div class="form" id="registrationForm">
    <div class="form">
        <!-- Add a message container -->
        <div id="message" style="color: green; margin-bottom: 15px;"></div>
        <!-- User type selection dropdown -->
        <div class="inputfield">
            <label>User Type</label>
            <select id="userType" class="input">
                <option value="student">Student</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <!-- Dynamic registration fields based on user type selection -->
        <div id="registrationFields"></div>
        <!-- Common registration fields -->
        <div class="inputfield">
            <label>Email Address</label>
            <input type="email" class="input" required name="email">
        </div>
        <div class="inputfield">
            <label>Phone Number</label>
            <input type="tel" class="input" pattern="[0-9]{10}" required name="phone_number">
        </div>
      
        <div class="inputfield terms">
            <label class="check">
                <input type="checkbox" required>
                <span class="checkmark"></span>
            </label>
            <p>Agreed to terms and conditions</p>
        </div>
        <div class="inputfield">
            <input type="submit" value="Register" class="btn">
        </div>
    </div>
</div>


<!-- JavaScript to handle user type selection and display corresponding registration fields -->
<script>
   // Function to dynamically update registration fields based on user type
function updateUserType() {
    var userType = document.getElementById('userType').value;
    var registrationFields = document.getElementById('registrationFields');

    // Clear existing registration fields
    registrationFields.innerHTML = '';

    // Add student registration fields
    if (userType === 'student') {
        registrationFields.innerHTML += `
            <!-- Student registration fields -->
            <div class="inputfield">
                <label>First Name</label>
                <input type="text" class="input" required name="first_name">
            </div>
            <div class="inputfield">
                <label>Last Name</label>
                <input type="text" class="input" required name="last_name">
            </div>
            <div class="inputfield">
                <label>Major</label>
                <div class="custom_select">
                    <select name="major" id="major">
                    <option value="">Select</option>
                            <option value="Computer Engineering">Computer Engineering</option>
                            <option value="Electrical Engineering">Electrical Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Management and Information Systems">Management and Information Systems</option>
                            <option value="Business Administration">Business Administration</option>
                        </select>
                </div>
            </div>`;
    }
    // Add admin registration fields
    else if (userType === 'admin') {
        registrationFields.innerHTML += `
            <!-- Admin registration fields -->
            <div class="inputfield">
                <label>Admin Name</label>
                <input type="text" class="input" required name="admin_name">
            </div>
            <div class="inputfield">
                <label>Department</label>
                <input type="text" class="input" required name="department">
            </div>`;
    }

    // Add password and confirmation fields for both user types
    registrationFields.innerHTML += `
        <!-- Password fields -->
        <div class="inputfield">
            <label>Password</label>
            <input type="password" class="input" required name="password">
        </div>
        <div class="inputfield">
            <label>Confirm Password</label>
            <input type="password" class="input" required name="confirm">
        </div>`;
}

// Call updateUserType() when the user type selection changes
document.getElementById('userType').addEventListener('change', updateUserType);

// Call updateUserType() initially to populate the registration fields based on default user type
updateUserType();

// Function to redirect to the login page
function redirectToLogin() {
    window.location.href = 'login.php'; // Replace 'login.php' with the actual login page URL
}

</script>

<script>
$(document).ready(function() {
    $('.btn').click(function(e) {
        e.preventDefault(); // Prevent the default form submission

        //for student
        var userType = $('#userType').val();
        var email = $('input[name="email"]').val();
        var phone_number = $('input[name="phone_number"]').val();
        var terms = $('input[type="checkbox"]').is(':checked');
        var first_name = $('input[name="first_name"]').val();
        var last_name = $('input[name="last_name"]').val();
        var major = $('#major').val();
        var password = $('input[name="password"]').val();

        //for admin

        var admin_name = $('input[name="admin_name"]').val();
        var department = $('input[name="department"]').val();
        var password2 = $('input[name="confirm"]').val();
        
       
        console.log(userType);


        // Perform AJAX request to submit the form data
        $.ajax({
            url: 'action/register.php', 
            method: 'POST',
            data: {
                userType: userType,
                email: email,
                phone_number: phone_number,
                terms: terms,
                major: major,
                first_name: first_name,
                last_name: last_name,
                admin_name :admin_name,
                department :department,
                password:password,
                password2 :password2,
            },
           
            success: function(response) {
        // Handle success
        header("Location:login.php"); // Log response for debugging
        // Redirect or show success message as needed
    },
    error: function(xhr, status, error) {
        // Handle errors
        console.error(xhr.responseText); // Log error response for debugging
        // Show error message to the user
    }

        });
    });

    // Function to redirect to the login page
   // function redirectToLogin() {
       // window.location.href = 'login.php'; //
   // }

   
    
});

</script>
</body>
</html>