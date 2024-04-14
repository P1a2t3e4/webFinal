<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Notifications - Campus Hub</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .notification-list {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }
        .notification-item {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .notification-item:hover {
            transform: translateY(-5px);
        }
        .notification-item p {
            margin: 5px 0;
        }
        .notification-item strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Notifications - Campus Hub</h2>
        <ul class="notification-list">
            <!-- Notifications will be dynamically added here -->
            <li class="notification-item">
                <p><strong>Type:</strong> Job Application</p>
                <p><strong>Message:</strong> John Doe applied for the Web Developer position.</p>
                <p><strong>Timestamp:</strong> 2024-04-07 10:30:15</p>
            </li>
            <li class="notification-item">
                <p><strong>Type:</strong> Event Registration</p>
                <p><strong>Message:</strong> New registration for Workshop on Web Development.</p>
                <p><strong>Timestamp:</strong> 2024-04-07 09:45:20</p>
            </li>
            <!-- Additional notifications will follow the same format -->
            <li class="notification-item">
                <p><strong>Type:</strong> Event Registration</p>
                <p><strong>Message:</strong> New registration for Workshop on Web Development.</p>
                <p><strong>Timestamp:</strong> 2024-04-07 09:45:20</p>
            </li>
        </ul>
    </div>
    
</body>
</html>
