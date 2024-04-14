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
</head>
<body>
<div class="wrapper">
    <div class="title">Registration Form</div>
    <div class="form">
        <div class="inputfield">
            <label>First Name</label>
            <input type="text" class="input" required>
        </div>
        <div class="inputfield">
            <label>Last Name</label>
            <input type="text" class="input" required>
        </div>
        <div class="inputfield">
            <label>Gender</label>
            <div class="custom_select">
                <select>
                    <option value="">Select</option>
                    <option value="Computer Engineering">Computer Engineering</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Management and Information Systems ">Management and Information Systems</option>
                    <option value="Business Administration ">Business Administration</option>
                </select>
            </div>
        </div>
        <div class="inputfield">
            <label>Email Address</label>
            <input type="email" class="input" required>
        </div>
        <div class="inputfield">
            <label>Phone Number</label>
            <input type="tel" class="input" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
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
</body>
</html>
