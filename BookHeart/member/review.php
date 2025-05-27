<?php
    // Start session to access session variables
    session_start();

    // Include the file for database connection
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
    <title>BOOK HEART - COMMENTS</title>
    <!-- Include JavaScript file for showing comment information -->
    <script src="showinfo.js"></script>
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
            <li><a href="review.php" class="active">COMMENT</a></li>
            <li style="float:right"><a href="profile.php">PROFILE</a></li>
        </ul>
    </nav>

    <!-- Comment Section -->
    <div class="comment">
        <h1>COMMENTS</h1>
        <!-- Container for displaying existing comments -->
        <div class="comment-container">
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Comments</th>
                </tr>
                <?php
                // Establish connection to the database for retrieving comments
                $con1 = mysqli_connect('localhost', 'root', '', 'bookheart') or die("Could not connect database!");

                // Query to select all comments
                $query1 = "SELECT * FROM commentlist";

                // Execute the query
                $result1 = mysqli_query($con1, $query1);

                // Loop through each row of the result set to display comments
                while ($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                    <tr>
                        <td><?php echo $row1['membername']; ?></td>
                        <td><?php echo $row1['comment']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <!-- Section for adding a new comment -->
        <div class="comment-section">
            <h2>Add a new comment</h2>
            <!-- Form to submit a new comment -->
            <form action="comment.php" method="post">
                <?php
                // Loop through each row of the result set to add hidden input fields for member information
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <!-- Hidden input fields for member information -->
                    <input type="hidden" name="membrid" value="<?php echo $row['memberid']; ?>">
                    <input type="hidden" name="membername" value="<?php echo $row['name']; ?>">
                <?php
                }
                ?>
                <!-- Textarea for entering the comment -->
                <textarea name="commentText" rows="10" cols="40" required></textarea><br>

                <!-- Submit button for sending the comment -->
                <button type="submit">Send Comment</button>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p>
    </footer>

</body>

</html>
