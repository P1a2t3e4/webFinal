
<?php
    // Fetch events using PHP and output them as JavaScript code
    
    require_once 'function/get_event_details_fxn.php';

    $events = getAllEvents();
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Hub - Events Calendar</title>
    <link rel="stylesheet" href="final.css">
    <style>
        /* Additional CSS for filter bar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #0d8fdb;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        nav {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
        }
        .filter-bar {
            margin-bottom: 20px;
            text-align: center;
        }
        .filter-bar label {
            font-weight: bold;
        }
        .filter-bar select {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-left: 10px;
        }
        .event-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            width: calc(100% - 20px); /* Occupy the whole width of the container minus the margin */
            max-width: none; /* Disable the maximum width */
            display: flex; /* Add flexbox to align items */
        }
        .event-details {
            flex: 1; /* Allow the details to take remaining space */
            padding: 20px;
        }
        .event-details h2 {
            margin-bottom: 10px;
            color: #0d8fdb;
        }
        .event-details p {
            margin-bottom: 10px;
        }
        .event-details button {
            background-color: #0d8fdb;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .event-details button:hover {
            background-color: #007bb6;
        }
        .event-container {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    overflow: hidden;
    width: calc(100% - 20px); /* Occupy the whole width of the container minus the margin */
    max-width: none; /* Disable the maximum width */
    display: flex; /* Add flexbox to align items */
}

.event-details {
    flex: 1; /* Allow the details to take remaining space */
    padding: 20px;
}

.event-details h2 {
    margin-bottom: 10px;
    color: #0d8fdb;
}

.event-details p {
    margin-bottom: 10px;
}

.event-details button {
    background-color: #0d8fdb;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.event-details button:hover {
    background-color: #007bb6;
}

.event-image {
    width: 30%; /* Set the width of the image container */
    height: auto; /* Allow the height to adjust based on the image size */
    margin-right: 20px; /* Add margin to create space between details and image */
}

.event-image img {
    width: 100%; /* Make the image fill the container horizontally */
    height: auto; /* Allow the height to adjust based on the image size */
    border-top-right-radius: 10px; /* Ensure rounded corners for the image */
    border-top-left-radius: 10px; /* Ensure rounded corners for the image */
}

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Campus Hub - Events Calendar</h1>
    </header>
    <nav>
        <ul>
            <!-- Direct the "Job Board" link to the job listings page -->
            <li><a href="jobBoardUser.php">Job Board</a></li>
            <li><a href="../admin/notification.php">Notifications</a></li> <!-- Added notification page link -->
            <li><a href="action/logout_user.php">Log out </a></li>
        </ul>
    </nav>

    <!-- Add more navigation links as needed -->
    </ul>
    </nav>

    <div class="filter-bar">
        <label for="filter-category">Filter by Category:</label>
        <select id="filter-category">
            <option value="all">All Events</option>
            <option value="academic">Academic</option>
            <option value="social">Social</option>
        </select>
    </div>

    <main>
        <section id="events" >
            <!-- Event listings will be dynamically populated here -->
        </section>
        <aside class="right-section">
            <!-- Additional content or widgets can be added here -->
        </aside>
    </main>

   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript code for client-side interactivity
        document.addEventListener('DOMContentLoaded', function() {
            const eventsSection = document.getElementById('events');
            const eventsData = <?php echo json_encode($events); ?>;
            //console.log(eventsData);
            

            // Function to display events in the list
            function displayEvents(events) {
                eventsSection.innerHTML = ''; // Clear existing events
                for (const event of events) {
                    const eventContainer = document.createElement('div');
                    eventContainer.classList.add('event-container');

                    const eventDetails = document.createElement('div');
                    eventDetails.classList.add('event-details');
                    console.log(event);
                    eventDetails.innerHTML = `
                        <h2>${event.Title}</h2>
                        <p>${event.Description}</p>
                        <p>Date: ${event.Date}</p>
                        <p>Time: ${event.Time}</p>
                        <p>Location: ${event.Location}</p>
                        <button onclick="window.location.href='register_for_event.php'">Register</button>
                    `;

                    const eventImage = document.createElement('div');
                    eventImage.classList.add('event-image');
                    eventImage.innerHTML = `<img src="${event.imageUrl}" alt="Event Image">`;

                    eventContainer.appendChild(eventDetails);
                    eventContainer.appendChild(eventImage);
                    eventsSection.appendChild(eventContainer);
                }
            }

            // Call function to display events
            displayEvents(eventsData);

            // Function to simulate event registration
            function registerForEvent(eventId) {
                // Implement event registration functionality
                console.log('Registering for event:', eventId);
            }
        });
    </script>
    
</body>
</html>
