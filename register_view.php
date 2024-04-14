<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register_user.php" method="post">
        Username: <input type="text" name="username" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        User Type: <select name="userType">
            <option value="Student">Student</option>
            <option value="Staff">Staff</option>
            <option value="Admin">Admin</option>
        </select><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
