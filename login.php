<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}

form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer; 
}

    </style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form id="loginForm" onsubmit="return validateForm()">
        <h3>Login Here</h3>

        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password">

        <button type="submit">Log In</button>
    </form>

    <script>
        // Function to validate email format
        function validateForm() {
            var emailInput = document.getElementById('email').value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
            var validDomain = /@ashesi\.edu\.gh$/;

            if (!emailRegex.test(emailInput) || !validDomain.test(emailInput)) {
                alert('Please enter a valid email address with the domain "@ashesi.edu.gh"');
                return false;
            }
            return true;
        }

        // Add event listener to the form for login action
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            // Prevent the form from submitting normally
            event.preventDefault();

            // Redirect to firstpage.html
            window.location.href = 'event_calender.php';
        });
    </script>
</body>
</html>
