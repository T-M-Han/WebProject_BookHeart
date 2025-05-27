<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cstyle.css">
    <title>BOOK HEART - BOOKS</title>
    <script src="cshowinfo.js"></script> <!-- Include JavaScript file -->
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
            <li><a href="chome.php">HOME</a></li>
            <li><a href="cbooks.php">BOOKS</a></li>
            <li><a href="cabout.php">ABOUT</a></li>
            <li><a href="creview.php" class="active">COMMENT</a></li>
            <li style="float:right"><a href="../signin&up/signin&up.php">Sign In & Up</a></li>
        </ul>
    </nav>

    <!-- Comment Section -->
    <div class="comment">
        <h1>COMMENTS</h1>
        <!-- Display existing comments -->
        <div class="comment-container">
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Comments</th>
                </tr>
                <?php
                // Connect to the database
                $con1 = mysqli_connect('localhost', 'root', '', 'bookheart') or die("Could not connect database!");
                $query1 = "SELECT * FROM commentlist";
                $result1 = mysqli_query($con1, $query1);

                // Loop through comments and display them in a table
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

        <!-- Form to add a new comment -->
        <div class="comment-section">
            <h2>Add a new comment</h2>
            <form>
                <textarea name="commentText" rows="10" cols="60" required></textarea><br>
                <button id="commentbtn" onclick="comments()">Send Comment</button> <!-- Call JavaScript function to submit comment -->
            </form>
        </div>
        
        <?php
            // Check if there is a success message in the URL parameters
            if (isset($_GET['success'])) {
                $successMessage = $_GET['success'];
                echo '<script>alert("' . $successMessage . '");</script>'; // Display success message using JavaScript alert
            }
        ?>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p>
    </footer>

</body>

</html>
