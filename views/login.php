<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Design</title>
   
    <style>
        body {
          display: flex;
          align-items: center;
          justify-content: center;
          height: 100vh; /* Make the body take up the full viewport height */
          margin: 0; /* Remove default margin */
          background-color: #f0f0f0; /* Add a background color for better visibility */
      }
      .form {
          display: flex;
          flex-direction: column;
          gap: 35px;
          padding-left: 4em;
          padding-right: 4em;
          padding-bottom: 0.4em;
          background-color: #171717;
          border-radius: 25px;
          transition: 0.4s ease-in-out;
      }

      .card {
          background-image: linear-gradient(163deg, #00ff75 0%, #3700ff 100%);
          border-radius: 22px;
          transition: all 0.3s;
      }

      .card2 {
          border-radius: 0;
          transition: all 0.2s;
      }

      .card2:hover {
          transform: scale(0.98);
          border-radius: 20px;
      }

      .card:hover {
          box-shadow: 0px 0px 30px 1px rgba(0, 255, 117, 0.3);
      }

      #heading {
          text-align: center;
          margin: 2em;
          color: rgb(255, 255, 255);
          font-size: 1.2em;
      }

      .field {
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 0.5em;
          border-radius: 25px;
          padding: 0.6em;
          border: none;
          outline: none;
          color: white;
          background-color: #171717;
          box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
      }

      .input-icon {
          height: 1.3em;
          width: 1.3em;
          fill: white;
      }

      .input-field {
          background: none;
          border: none;
          outline: none;
          width: 100%;
          color: #d3d3d3;
      }

      .form .btn {
          display: flex;
          justify-content: center;
          flex-direction: row;
          margin-top: 2.5em;
      }

      .button1 {
          padding: 0.5em;
          padding-left: 1.1em;
          padding-right: 1.1em;
          border-radius: 5px;
          margin-right: 0.5em;
          border: none;
          outline: none;
          transition: 0.4s ease-in-out;
          background-color: #252525;
          color: white;
      }

      .button1:hover {
          background-color: black;
          color: white;
      }

      .button2 {
          padding: 0.5em;
          padding-left: 2.3em;
          padding-right: 2.3em;
          border-radius: 5px;
          border: none;
          outline: none;
          transition: 0.4s ease-in-out;
          background-color: #252525;
          color: white;
          text-decoration: none; /* Added */
      }

      .button2:hover {
          background-color: black;
          color: white;
      }

      .button3 {
          margin-bottom: 3em;
          padding: 0.5em;
          border-radius: 5px;
          border: none;
          outline: none;
          transition: 0.4s ease-in-out;
          background-color: #252525;
          color: white;
      }

      .button3:hover {
          background-color: red;
          color: white;
      }
      
    </style>
</head>
<body>
<div class="card">
    <div class="card2">
      <form class="form" action="action/login_user_action .php" method="post" name="loginForm" id="loginForm">
        <p id="heading">Login</p>
        <div class="field">
          <svg
            viewBox="0 0 16 16"
            fill="currentColor"
            height="16"
            width="16"
            xmlns="http://www.w3.org/2000/svg"
            class="input-icon"
          >
          </svg>
          <input
            type="email"
            class="input-field"
            placeholder="Email"
            autocomplete="off"
            name="email"
            id="email"
            required
          />
        </div>
        <div class="field">
          <svg
            viewBox="0 0 16 16"
            fill="currentColor"
            height="16"
            width="16"
            xmlns="http://www.w3.org/2000/svg"
            class="input-icon"
          >
            <path
              d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"
            ></path>
          </svg>
          <input type="password" class="input-field" placeholder="Password" name="password" id="password" required />
        </div>
        <div class="btn">
          
          <!-- Removed the anchor tag for registration -->
          </div>
<!-- Changed the button type to submit and added an onclick attribute -->
            <button type="submit" class="button3">Login</button>
        </div>
        <button type="button" class="button3" onclick="redirectToRegister()">Register</button>
      </form>
      <script>
     
        
    function redirectToEventCalendar() {
        window.location.href = 'event_calender.php';
    }

       
function redirectToRegister() {
        window.location.href = 'register.php';
    }
</script>
    

      
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--<script>
    // jQuery document ready function
    $(document).ready(function() {
        // Submit form on button click
        $('#loginForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Get form data
            var formData = $(this).serialize();
            console.log(formData);
            
            // Perform AJAX request to submit the form data
            $.ajax({
                url: 'action/login_user_action .php',
                type: 'POST',
                data: formData,

                
                
            });
        });
    });
    </script>-->
    </div>
  </div>
</body>
</html>
