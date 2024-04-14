<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Automatic Image Rotation and Flipping</title>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
  }

  h1 {
    text-align: center;
    margin-top: 20px;
    font-size: 24px; /* Adjust font size as needed */
    font-weight: bold; /* Adjust font weight as needed */
    color: #333; /* Adjust font color as needed */
  }

  #image-container {
    width: 100vw;
    height: calc(100vh - 40px); /* Subtract the height of the nav buttons */
    overflow: hidden;
    border: 1px solid #ccc;
    position: relative;
    margin-top: 20px; /* Adjust margin-top as needed */
  }

  #image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  #nav-buttons {
    position: fixed;
    top: 10px;
    right: 10px;
    z-index: 1000;
  }
  
  #nav-buttons button {
    margin-right: 10px;
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  h1 {
    text-align: center;
    margin-top: 20px;
    font-size: 36px; /* Adjust font size as needed */
    font-weight: bold; /* Adjust font weight as needed */
    color: #333; /* Adjust font color as needed */
    padding: 20px; /* Add some padding */
    border: 2px solid #333; /* Add border */
    border-radius: 10px; /* Add border radius */
    background-color: #fff; /* Set background color */
  }
</style>
</head>
<body>

<h1>Event Calendar and On-Campus Jobs - Campus Hub</h1>

<div id="nav-buttons">
  <button onclick="window.location.href='login.php'">Login</button>
  <button onclick="window.location.href='register.php'">Sign up </button>
  <button onclick="window.location.href='event_calender.php'">Home</button>
  <button onclick="window.location.href='dashboard.html'">Dashboard</button>
</div>

<div id="image-container">
  <img src="pic1.jpeg" id="current-image" alt="Image">
</div>

<script>
  // List of image URLs
  const imageUrls = [
    'pic1.jpeg',
    'pic2.jpeg',
    'pic3.jpeg',
    'picture.jpeg',
    'Outlook-t2zcmcmk (1).png',
    // Add more image URLs as needed
  ];

  let currentIndex = 0;

  function changeImage() {
    currentIndex = (currentIndex + 1) % imageUrls.length;
    const imageUrl = imageUrls[currentIndex];
    const image = document.getElementById('current-image');
    image.src = imageUrl;
  }

  function flipImage() {
    const image = document.getElementById('current-image');
    image.style.transform = 'scaleX(-1)';
  }

  // Change image every 3 seconds
  setInterval(changeImage, 3000);

  // Flip image side by side
  setTimeout(flipImage, 1500);
</script>
</body>
</html>
