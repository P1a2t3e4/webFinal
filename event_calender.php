<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Hub</title>
    <link rel="stylesheet" href="final.css">
    <style>
        .filter-bar {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Campus Hub</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#events">Events</a></li>
            <li><a href="#job-board">Job Board</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>
    <main>
        <section id="events">
            <!-- Event listings will be dynamically populated here -->
        </section>
        <section id="job-board">
            <!-- Job listings will be dynamically populated here -->
        </section>
        <!-- Add more sections for other features -->
        <h1>Campus Hub - Events Calendar</h1>

        <div class="filter-bar">
            <label for="filter-category">Filter by Category:</label>
            <select id="filter-category">
                <option value="all">All Events</option>
                <option value="academic">Academic</option>
                <option value="social">Social</option>
            </select>
        </div>

        <ul id="event-list"></ul>
    </main>
    <footer>
        <p>&copy; 2024 Campus Hub</p>
    </footer>
    <script src="script.js"></script>
    <script>
        // JavaScript code for client-side interactivity
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch event data from the server and populate the events section
            fetchEventData().then(events => {
                const eventsSection = document.getElementById('events');
                events.forEach(event => {
                    const eventElement = document.createElement('div');
                    eventElement.classList.add('event');
                    eventElement.innerHTML = `
                        <h2>${event.title}</h2>
                        <p>${event.description}</p>
                        <p>Date: ${event.date}</p>
                        <p>Time: ${event.time}</p>
                        <p>Location: ${event.location}</p>
                        <button onclick="registerForEvent(${event.id})">Register</button>
                    `;
                    eventsSection.appendChild(eventElement);
                });
            });

            // Fetch job data from the server and populate the job board section
            fetchJobData().then(jobs => {
                const jobBoardSection = document.getElementById('job-board');
                jobs.forEach(job => {
                    const jobElement = document.createElement('div');
                    jobElement.classList.add('job');
                    jobElement.innerHTML = `
                        <h2>${job.title}</h2>
                        <p>${job.description}</p>
                        <p>Department: ${job.department}</p>
                        <p>Type: ${job.type}</p>
                        <button onclick="applyForJob(${job.id})">Apply</button>
                    `;
                    jobBoardSection.appendChild(jobElement);
                });
            });

            const eventList = document.getElementById('event-list');
            const filterSelect = document.getElementById('filter-category');

            // Function to fetch events from backend (replace with your API call)
            function fetchEvents() {
                // Simulate fetching event data (replace with actual data fetching logic)
                const events = [
                    { id: 1, title: 'Seminar on AI', description: 'Learn about the latest advancements in artificial intelligence.', date: '2024-04-10', time: '10:00 AM', location: 'Auditorium A', category: 'academic' },
                    // Add more event data as needed
                ];
                return events;
            }

            // Function to display events in the list
            function displayEvents(events) {
                eventList.innerHTML = ''; // Clear existing events
                for (const event of events) {
                    const listItem = document.createElement('li');
                    listItem.innerHTML = `
                        <h3>${event.title}</h3>
                        <p>Category: ${event.category} - Date: ${event.date}</p>
                    `;
                    eventList.appendChild(listItem);
                }
            }

            // Filter events based on selected category
            function filterEvents() {
                const selectedCategory = filterSelect.value;
                const events = fetchEvents();
                let filteredEvents = events;
                if (selectedCategory !== 'all') {
                    filteredEvents = events.filter(event => event.category === selectedCategory);
                }
                displayEvents(filteredEvents);
            }

            // Call filter on initial load and on category change
            filterEvents();
            filterSelect.addEventListener('change', filterEvents);

            function fetchEventData() {
                // Simulate fetching event data from the server
                return new Promise(resolve => {
                    setTimeout(() => {
                        const events = [
                            { id: 1, title: 'Seminar on AI', description: 'Learn about the latest advancements in artificial intelligence.', date: '2024-04-10', time: '10:00 AM', location: 'Auditorium A', category: 'academic' },
                            // Add more event data as needed
                        ];
                        resolve(events);
                    }, 1000); // Simulate 1 second delay
                });
            }

            function fetchJobData() {
                // Simulate fetching job data from the server
                return new Promise(resolve => {
                    setTimeout(() => {
                        const jobs = [
                            { id: 1, title: 'Student Assistant - Computer Science Department', description: 'Assist professors with grading assignments and conducting research.', department: 'Computer Science', type: 'Part-time' },
                            // Add more job data as needed
                        ];
                        resolve(jobs);
                    }, 1000); // Simulate 1 second delay
                });
            }

            function registerForEvent(eventId) {
                // Implement event registration functionality
                console.log('Registering for event:', eventId);
            }

            function applyForJob(jobId) {
                // Implement job application functionality
                console.log('Applying for job:', jobId);
            }
        });
    </script>
</body>
</html>
