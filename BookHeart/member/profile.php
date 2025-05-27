<?php
    // Start the session to access session variables
    session_start();

    // Include the database connection file
    require_once('profileconnection.php');

    // Query to retrieve member information based on the session username
    $query = "SELECT * FROM memberlist WHERE name = '".$_SESSION["username"]."'";

    // Execute the query
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BOOK HEART - PROFILE</title>
    <!-- Include the JavaScript file for logout functionality -->
    <script src="logout.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li>
                <div class="header">
                    <p>BOOK HEART</p>
                </div>
            </li>
            <li><a href="home.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="review.php">COMMENT</a></li>
            <li style="float:right"><a class="active" href="profile.php">PROFILE</a></li>
        </ul>
    </nav>

    <!-- Profile Container -->
    <div class="profile-container">
        <h1>Book Heart - Member Information</h1>
        <hr>     
        <?php
            // Loop through the retrieved member information
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="memberlist">
                <!-- Display member details -->
                <span class="memberid"><br><?php echo "Member-ID ---" . $row['memberid']; ?></span><br>
                <span class="fullname"><?php echo "Fullname ------" . $row['name']; ?></span><br>
                <span class="age"><?php echo "Age-------------" . $row['age']; ?></span><br>
                <span class="address"><?php echo "Address -------" . $row['address']; ?></span><br>
                <span class="phone"><?php echo "Phone----------" . $row['phone']; ?></span><br>
                <span class="email"><?php echo "Email ----------" . $row['email']; ?></span><br>
                <span class="username"><?php echo "Username -----" . $row['username']; ?></span><br>
                <span class="password"><?php echo "Password ------***********"; ?></span>
                <!-- Button to log out -->
                <button onclick="logout()">Log Out</button>
            </div>
        <?php
            }
        ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p>
    </footer>
</body>

</html>
