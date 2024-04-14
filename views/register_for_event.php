<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
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
</head>
<body>
<div class="wrapper">
    <div class="title">Student Registration Form</div>
    <div class="form" id="registrationForm">
        <!-- Add a message container -->
        <div id="message" style="color: green; margin-bottom: 15px;"></div>
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
            <label>Email Address</label>
            <input type="email" class="input" required name="email">
        </div>
        <div class="inputfield">
            <label>Phone Number</label>
            <input type="tel" class="input" pattern="[0-9]{10}" required name="phone_number">
        </div>
        <div class="inputfield">
            <label>Password</label>
            <input type="password" class="input" required name="password">
        </div>
        <div class="inputfield">
            <label>Confirm Password</label>
            <input type="password" class="input" required name="confirm_password">
        </div>
        <div class="inputfield terms">
            <label class="check">
                <input type="checkbox" required>
                <span class="checkmark"></span>
            </label>
            <p>Agreed to terms and conditions</p>
        </div>
        <div class="inputfield">
            <input type="submit" value="Register" class="btn" onclick="submitForm()">
        </div>
    </div>
</div>

<!-- JavaScript to handle form submission with AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function submitForm() {
        var formData = $('#registrationForm').serialize(); // Serialize form data

        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: formData,
            success: function(response) {
                // Display response message
                $('#message').text(response); 
                
                // If registration is successful, clear the form
                if (response.includes('successfully registered')) {
                    $('#registrationForm')[0].reset();
                }
            },
            error: function(xhr, status, error) {
                $('#message').text('Error: ' + xhr.statusText); // Display error message
            }
            
        });
    }
</script>
</body>
</html>
