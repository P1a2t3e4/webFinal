<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Hub Admin Dashboard</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #f4f4f4; /* Light gray background */
        }
        .left-panel {
            background-color: #1f4068; /* Dark blue background */
            color: #fff;
            width: 20%;
            min-height: 100vh;
            padding: 20px;
        }
        .left-panel ul {
            list-style-type: none;
            padding: 0;
        }
        .left-panel ul li {
            margin-bottom: 10px; 
        }
        .left-panel ul li a {
            display: block;
            background-color: #4a69bb; /* Blue accent color */
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .left-panel ul li a:hover {
            background-color: #35495e; /* Darker blue on hover */
        }
        .container {
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .stats-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            background-color: #1f4068; /* Dark blue background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }
        .stat-box {
            background-color: #ffffff; /* White background */
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 30%;
            background-color: #eff2f7; /* Light blue background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }
        .notification-snippet {
            background-color: #ffffff; /* White background */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }
        .load-more-btn {
            background-color: #4a69bb; /* Blue accent color */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .load-more-btn:hover {
            background-color: #35495e; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="left-panel">
        <!-- Add your left panel content here -->
        <h3>Admin Dashboard</h3>
        <ul>
            <li><a href="">Dashboard</a></li>
            <li><a href="event_calender.php">Events</a></li>
            <li><a href="register.php">Registrations</a></li>
            <li><a href="jobBoardUser.php">Job Applications</a></li>
            <li><a href="notifications.php">Notifications</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Campus Hub Admin Dashboard</h2>
        <div class="stats-container">
            <div class="stat-box">
                <h3>Total Events</h3>
                <p id="total-events"><?php echo getTotalEvents(); ?></p>
            </div>
            <div class="stat-box">
                <h3>Total Registrations</h3>
                <p id="total-registrations"><?php echo getTotalRegistrations(); ?></p>
            </div>
            <div class="stat-box">
                <h3>Total Job Applications</h3>
                <p id="total-job-applications"><?php echo getTotalJobApplications(); ?></p>
            </div>
        </div>

        <!-- Notification Snippets -->
        <div class="notification-snippet">
            <h3>Latest Notifications</h3>
            <!-- You can dynamically populate notification snippets here -->
            <?php echo getLatestNotifications(); ?>
        </div>

        <!-- Load More Button -->
        <button class="load-more-btn" onclick="window.location.href='notification.php'">Load More Activity</button>
    </div>

    <?php
        // Sample PHP functions to fetch dynamic data
        function getTotalEvents() {
            // Replace with your logic to fetch total events
            // Sample data for demonstration
            return 50;
        }

        function getTotalRegistrations() {
            // Replace with your logic to fetch total registrations
            // Sample data for demonstration
            return 150;
        }

        function getTotalJobApplications() {
            // Replace with your logic to fetch total job applications
            // Sample data for demonstration
            return 30;
        }

        function getLatestNotifications() {
            // Replace with your logic to fetch latest notifications
            // Sample data for demonstration
            $notifications = '';
            $notifications .= '<p><strong>Type:</strong> Job Application</p>';
            $notifications .= '<p><strong>Message:</strong> John Doe applied for the Web Developer position.</p>';
            $notifications .= '<p><strong>Timestamp:</strong> 2024-04-07 10:30:15</p>';
            $notifications .= '<p><strong>Type:</strong> Event Registration</p>';
            $notifications .= '<p><strong>Message:</strong> Jane Smith registered for the Seminar on AI Ethics.</p>';
            $notifications .= '<p><strong>Timestamp:</strong> 2024-04-06 15:45:30</p>';
            $notifications .= '<p><strong>Type:</strong> Event Registration</p>';
            $notifications .= '<p><strong>Message:</strong> Alex Johnson registered for the Workshop on Data Science.</p>';
            $notifications .= '<p><strong>Timestamp:</strong> 2024-04-06 12:20:00</p>';
            return $notifications;
        }
    ?>
</body>
</html>
