<?php
    // Start the session
    session_start();
    
    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'bookheart') or die("Could not connect to the database!");
    
    // Query to select admin information based on session username
    $query = "SELECT * FROM adminlist WHERE adminname = '".$_SESSION["name"]."'";
    
    // Execute the query
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>BOOK HEART - HOME</title>
    <script src="alogout.js"></script> <!-- Include logout JavaScript -->
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li>
                <div class="header">
                    <p>BOOK HEART</p> <!-- Logo or site name -->
                </div>
            </li>
            <!-- Navigation links to different pages -->
            <li><a href="books(insert).php">BOOKS(Insertion)</a></li>
            <li><a href="books(update).php" >BOOKS(Update)</a></li>
            <li><a href="books(delete).php">BOOKS(Deletion)</a></li>
            <li><a href="members.php" >MEMBERS</a></li>
            <li><a href="orders.php" >ORDERS</a></li>
            <li><a href="acomment.php">COMMENTS</a></li>
            <li style="float:right"><a href="admin.php" class="active">ADMIN</a></li> <!-- Active page -->
        </ul>
    </nav>
    
    <!-- Profile Container -->
    <div class="profile-container">
        <h1>Book Heart - Admin Information</h1>
        <hr>     
        <?php
            // Loop through the admin information fetched from the database
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="memberlist">
                <!-- Display admin ID -->
                <span class="adminid"><br><?php echo "Admin-ID ---" . $row['id']; ?></span><br>
                <!-- Display admin username -->
                <span class="username"><?php     echo "Username ------" . $row['adminname']; ?></span><br>
                <!-- Display admin password -->
                <span class="password"><?php     echo "Password ------" . $row['password']; ?></span>
                <!-- Logout button -->
                <button onclick="alogout()">Log Out</button>
            </div>
        <?php
            }
        ?>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p> <!-- Copyright information -->
    </footer>
</body>

</html>
