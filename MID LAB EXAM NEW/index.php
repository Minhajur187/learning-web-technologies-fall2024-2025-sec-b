<!DOCTYPE html>
<html>
<head>
    <title>Registration and Login</title>
</head>
<body>
    <div id="registration">
        <h2>Registration</h2>
        <form action="register.php" method="post">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" required><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br>
            <input type="submit" value="Sign Up">
        </form>
    </div>
    <div id="login">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="login_id">User ID:</label>
            <input type="text" id="login_id" name="login_id" required><br>
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="login_password" required><br>
            <input type="submit" value="Login">
            <a href="index.php">Register</a>
        </form>
    </div>
</body>
</html>