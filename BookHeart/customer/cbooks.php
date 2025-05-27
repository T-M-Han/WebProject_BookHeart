<?php
    // Include the file for database connection
    require_once('cbookconnection.php');

    // Query to select all books from the database
    $query = "SELECT * FROM booklist";
    
    // Execute the query
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cstyle.css">
    <script src="cshowinfo.js"></script>
    <title>BOOK HEART - BOOKS</title>
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
            <li><a href="cbooks.php" class="active">BOOKS</a></li>
            <li><a href="cabout.php">ABOUT</a></li>
            <li><a href="creview.php">COMMENT</a></li>
            <li style="float:right"><a href="../signin&up/signin&up.php"> Sign In & Sign Up</a></li>
        </ul>
    </nav>

    <?php
        // Loop through each book in the result set
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <!-- Display book information -->
        <div class="book-list">
            <li class="book">
                <span class="book-image"><img src="<?php echo $row['image']; ?>" alt="Book Image"></span><br>
                <span class="book-name"><br><?php echo $row['bookname']; ?></span><br>
                <span class="author"><?php echo $row['author']; ?></span><br>
                <span class="price"><?php echo "$" . $row['price']; ?></span><br>
                <!-- Button to buy the book and trigger the showInfo function -->
                <button onclick="cshowInformation(
                    `<?php echo str_replace("'", "\\'", htmlspecialchars($row['bookid'], ENT_QUOTES, 'UTF-8')); ?>`,
                    `<?php echo str_replace("'", "\\'", htmlspecialchars($row['bookname'], ENT_QUOTES, 'UTF-8')); ?>`,
                    `<?php echo str_replace("'", "\\'", htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8')); ?>`,
                    `<?php echo str_replace("'", "\\'", htmlspecialchars($row['genre'], ENT_QUOTES, 'UTF-8')); ?>`,
                    `<?php echo str_replace("'", "\\'", htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8')); ?>`,
                    `<?php echo str_replace("'", "\\'", htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8')); ?>`,
                    `<?php echo str_replace("'", "\\'", htmlspecialchars($row['description'], ENT_QUOTES, 'UTF-8')); ?>`
                )">BUY</button>
            </li>
        </div>
    <?php
    }
    ?>

    <!-- Information Box -->
    <div id="informationBox" class="information-box">
        <center><h3>Book Information</h3></center>
        <!-- Close button -->
        <button id="buttonId" onclick="chideInformation()">Close</button>
        <p id="bookInfo"></p>

        <!-- Order Form -->
        <div class="section">
            <center><p style="font-size: 1.5em; font-weight: bold;">Order Form</p></center>
            <!-- Form to submit book order -->
            <form action="corder.php" method="post">
                <!-- Hidden input field to store bookid -->
                <input type="hidden" id="bookidInput" name="bookid" value="">

                <?php
                // Get today's date
                $todayDate = date("Y-m-d");
                ?>
                <!-- Display today's date -->
                <label for="date">Date <?php echo $todayDate; ?></label>
                <!-- Hidden input field to store today's date -->
                <input type="hidden" name="date" value="<?php echo $todayDate; ?>">

                <!-- Input fields for customer information -->
                <label for="customername">Customer Name: <input type="text" name="cname" style="width: 300px;" required></label>

                <label for="age">Age: <input type="number" name="age" style="width: 387px;" required></label>

                <label for="address">Address: <textarea name="address" name="address" style="width: 357px;" cols="30" rows="2" required></textarea></label>

                <label for="phone">Phone: <input type="text" name="phone" style="width: 373px;" required></label>

                <label for="email">Email: <input type="text" name="email" style="width: 373px;" required></label>

                <!-- Button to submit the order -->
                <button id="buyButton">Buy</button>
            </form>
        </div>
    </div>

    <?php
    // Check if there is a success message in the URL parameters
    if (isset($_GET['success'])) {
        $successMessage = $_GET['success'];
        echo '<script>alert("' . $successMessage . '");</script>';
    }
    ?>

    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p>
    </footer>

</body>

</html>
