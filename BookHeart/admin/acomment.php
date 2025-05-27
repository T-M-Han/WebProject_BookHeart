<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css"> <!-- Link to external stylesheet -->
    <title>BOOK HEART - HOME</title>
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
            <li><a href="members.php">MEMBERS</a></li>
            <li><a href="orders.php">ORDERS</a></li>
            <li><a href="acomment.php" class="active">COMMENTS</a></li> <!-- Current active page -->
            <li style="float:right"><a href="admin.php">ADMIN</a></li>
        </ul>
    </nav>

    <div class="comment">
    <h1>COMMENTS</h1>
    <!-- Container for displaying comments -->
    <div class="comment-container">
        <!-- Table to display comments -->
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Comments</th>
            </tr>
            <?php
            // Connect to the database
            $con1=mysqli_connect('localhost','root','','bookheart') or die("Could not connect database!");
            // Query to select all comments
            $query1 = "SELECT * FROM commentlist";
            // Execute the query
            $result1 = mysqli_query($con1, $query1);

            // Loop through the results and display each comment
            while ($row1 = mysqli_fetch_assoc($result1)) {
            ?>
                <tr>
                    <td><?php echo $row1['membername']; ?></td> <!-- Display member's name -->
                    <td><?php echo $row1['comment']; ?></td> <!-- Display member's comment -->
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p> <!-- Copyright information -->
    </footer>
</body>

</html>
