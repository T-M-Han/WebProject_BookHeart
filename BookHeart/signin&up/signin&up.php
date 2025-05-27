<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Link to external CSS stylesheet -->
    <link rel="stylesheet" href="signin&up.css">
    <!-- Set the title of the page -->
    <title>BOOK HEART - Login Form</title>
    <!-- Link to external JavaScript file -->
    <script src="signin&up.js"></script>
</head>

<body>
    <!-- Sign-in form container -->
    <div class="signin">
        <!-- Sign-in form -->
        <form name="signinform" action="inprocess.php" method="post">
            <h1>BOOK HEART</h1>
            <!-- Input field for username -->
            Username <input type="text" name="inusername" required>
            <!-- Input field for password -->
            Password <input type="password" name="inpassword" required>
            <!-- Submit button for sign-in -->
            <input type="submit" name="signinbtn" value="SIGN IN">
            <!-- Link to sign-up form -->
            <p>Not a member? <a href="#" id="showSignup">Sign Up</a></p>
            <!-- Link for guest login -->
            <p><a href="../customer/chome.php">Guest Login</a></p>
        </form>
    </div>
    <!-- Sign-up form container -->
    <div class="signup">
        <!-- Sign-up form -->
        <form name="signupform" action="upprocess.php" method="post">
            <h1>BOOK HEART</h1>
            <!-- Input field for full name -->
            <label>Full Name</label>
            <input type="text" name="fullname" required>
            <!-- Input field for age -->
            <label> Age </label>
            <input type="number" name="age" required>
            <!-- Input field for address -->
            <label> Address</label>
            <input type="text" name="address" required>
            <!-- Input field for phone number -->
            <label>Phone</label>
            <input type="text" name="phone" required>
            <!-- Input field for email -->
            <label>Email</label>
            <input type="email" name="email" required>
            <!-- Input field for username -->
            <label>Username</label>
            <input type="text" name="upusername" required>
            <!-- Input field for password -->
            <label>Password</label>
            <input type="password" name="uppassword" required>
            <!-- Submit button for sign-up -->
            <input type="submit" name="signupbtn" value="SIGN UP">
            <!-- Link to sign-in form -->
            Already a member? <a href="#" id="showSignIn">Sign In</a>
        </form>
    </div>
</body>

</html>
