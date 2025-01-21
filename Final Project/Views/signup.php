

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Form Login and Register</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
<div class="signup">

<h1>Sign Up</h1>

<h4>It's free and only takes a minute</h4>

<form method="POST">
<label>First Name</label>
<input type="text" name="firstname" required>
<label>Last Name</label>
<input type="text" name="lastname" required>
<label>Gender</label>
<input type="text" name="gender" required>
<label>Contact Address</label>
<input type="tel" name="contactnumber" required>
<label>Address</label>
<input type="text" name="address" required>
<label>Email</label>
<input type="email" name="email" required>
<label>Password</label>
<input type="password" name="password" required>
<input type="submit" name="" value="Submit">

</form>

<p>By clicking the Sign Up button, you agree to our<br>

<a href="">Terms and Condition</a> and <a href="#">Policy Privacy</a>

</p>
<p> <h3>Already have an account?</h3> <a href="login.php"><h3>Login Here</h3></a></p>
</div>
</body>
</html>