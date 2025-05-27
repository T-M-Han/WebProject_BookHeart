<?php
    // Include the database connection file
    require_once('bookconnection.php');
    
    // Query to select all books from the database
    $query = "select * from booklist";
    $result = mysqli_query($con, $query);

    // Start session to retrieve user information
    session_start();
    
    // Include the profile database connection file
    require_once('profileconnection.php');
    
    // Query to select member information based on the session username
    $query1 = "select * from memberlist where name = '".$_SESSION["username"]."'";
    $result1 = mysqli_query($conn, $query1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="showinfo.js"></script>
    <title>BOOK HEART - BOOKS</title>
</head>

<body>
    <nav>
        <ul>
            <li>
                <div class="header">
                    <p>BOOK HEART</p>
                </div>
            </li>
            <li><a href="home.php">HOME</a></li>
            <li><a href="books.php" class="active">BOOKS</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <li><a href="review.php">COMMENT</a></li>
            <li style="float:right"><a href="profile.php">PROFILE</a></li>
        </ul>
    </nav>

    <?php
        // Loop through the result set and display each book
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="book-list">
            <li class="book">
                <!-- Display book information -->
                <span class="book-image"><img src="<?php echo $row['image']; ?>" alt="Book Image"></span><br>
                <span class="book-name"><br><?php echo $row['bookname']; ?></span><br>
                <span class="author"><?php echo $row['author']; ?></span><br>
                <span class="price"><?php echo "$" . $row['price']; ?></span><br>
                <!-- Button to show book information -->
                <button onclick="showInfo(
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
        <button id="buttonId" onclick="hideInformation()">Close</button>
        <p id="bookInfo"></p>

        <!-- Registration form for member information -->
        <div id="registrationFormContainer" style="display: none;">
            <center><h3>Member Information</h3></center>
            <form action="order.php" method="post">
            
            <?php
                // Loop through the result set and display member information
                while ($row1 = mysqli_fetch_assoc($result1)) {
            ?>
                <div class="memberlist">
                    <!-- Hidden input fields to store member information -->
                    <input type="hidden" id="bookidInput" name="bookid" value="">

                    <!-- Get today's date -->
                    <?php
                    $todayDate = date("Y-m-d");
                    ?>
                    <label for="date">Date <?php echo $todayDate; ?></label>
                    <input type="hidden" name="date" value="<?php echo $todayDate; ?>"><br>

                    <!-- Display member information -->
                    <label for="memberid"><?php echo "Member-ID ---" . $row1['memberid']; ?></label><br>
                    <input type="hidden"  name="1memberid" value="<?php echo$row1['memberid']; ?>">

                    <label for="fullname"><?php echo "Fullname ------" . $row1['name']; ?></label><br>
                    <input type="hidden"  name="1name" value="<?php echo$row1['name']; ?>">

                    <label for="age"><?php echo "Age-------------" . $row1['age']; ?></label><br>
                    <input type="hidden"  name="1age" value="<?php echo$row1['age']; ?>">

                    <label for="address"><?php echo "Address -------" . $row1['address']; ?></label><br>
                    <input type="hidden"  name="1address" value="<?php echo$row1['address']; ?>">

                    <label for="phone"><?php echo "Phone----------" . $row1['phone']; ?></label><br>
                    <input type="hidden"  name="1phone" value="<?php echo$row1['phone']; ?>">

                    <label for="email"><?php echo "Email ----------" . $row1['email']; ?></label><br>
                    <input type="hidden"  name="1email" value="<?php echo$row1['email']; ?>">
                </div>
            <?php
                }
            ?>
                <button id="orderbtn" type="submit">Place Order</button>
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
