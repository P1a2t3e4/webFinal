<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Hub - Job Board</title>
    <link rel="stylesheet" href="final.css">
    <style>
        /* Additional CSS for job listings */
        .listing {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .listing h2 {
            margin-bottom: 5px;
        }

        .listing p {
            margin-bottom: 5px;
        }

        .listing button {
            background-color: #0d8fdb;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .listing button:hover {
            background-color: #0d8fdb;
        }
    </style>
</head>
<body>
    <header>
        <h1>Campus Hub - Job Board</h1>
    </header>
    <nav>
        <ul>
            <!-- Direct the "Job Board" link to the job listings page -->
            <li><a href="event_calender.php">Events</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>

    <main>
        <section id="job-board">
            <!-- Job listings will be dynamically populated here -->
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Campus Hub</p>
    </footer>

    <script>
        // JavaScript code for client-side interactivity
        document.addEventListener('DOMContentLoaded', function() {
            const jobBoardSection = document.getElementById('job-board');

            // Function to fetch job listings from backend (replace with your API call)
            function fetchJobListings() {
                // Simulate fetching job data (replace with actual data fetching logic)
                const jobListings = [
                    { id: 1, title: 'Library Assistant', department: 'Library', type: 'Part-time' },
                    { id: 2, title: 'Lab Technician', department: 'Science Department', type: 'Full-time' },
                    // Add more job listings as needed
                ];
                return jobListings;
            }

            // Function to display job listings in the list
            function displayJobListings(jobListings) {
                jobBoardSection.innerHTML = ''; // Clear existing job listings
                for (const job of jobListings) {
                    const jobElement = document.createElement('div');
                    jobElement.classList.add('listing');
                    jobElement.innerHTML = `
                        <h2>${job.title}</h2>
                        <p>Department: ${job.department}</p>
                        <p>Type: ${job.type}</p>
                        <button onclick="window.location.href = 'applyform.php'">Apply</button>
                    `;
                    jobBoardSection.appendChild(jobElement);
                }
            }

            

            // Display job listings on load
            displayJobListings(fetchJobListings());
        });
    </script>
</body>
</html>
