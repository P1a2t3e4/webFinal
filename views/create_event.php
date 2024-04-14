<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <style>
        body {
            background-image: url('..images/pexels-pixabay-356065.jpg');
           
        }
    </style>

</head>
<body>
    <h1>Create Event</h1>
    <form action="../action/eventcreation.php" method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="speaker">Speaker:</label><br>
        <input type="text" id="speaker" name="speaker"><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>"required><br><br>

        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br><br>

        <!-- <button type="submit" name = "submit" id="submit">Create Event</button> -->

        <input type="submit" name ="submi"value="Create Event">
    </form>
</body>
</html>
