<?php
    // Database connection details
    $host = 'localhost';
    $user = 'root';
    $passwd = '';
    $database = 'bookheart';
    $table_name = 'booklist';
    
    // Establish database connection
    $con = mysqli_connect($host, $user, $passwd, $database) or die("Could not connect to database");

    // Retrieve book ID from POST data
    $bookId = $_POST['bid'];

    // Query to select book details based on book ID
    $query = "SELECT * FROM $table_name WHERE bookid='" . $bookId . "'";
    mysqli_select_db($con, $database);
    $result = mysqli_query($con, $query);

    // Fetch book details
    $myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>BOOK HEART - HOME</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li>
                <!-- Logo/Header -->
                <div class="header">
                    <p>BOOK HEART</p>
                </div>
            </li>
            <!-- Navigation Links -->
            <li><a href="books(insert).php">BOOKS(Insertion)</a></li>
            <li><a href="books(update).php" class="active">BOOKS(Update)</a></li>
            <li><a href="books(delete).php">BOOKS(Deletion)</a></li>
            <li><a href="members.php">MEMBERS</a></li>
            <li><a href="orders.php">ORDERS</a></li>
            <!-- Right-aligned link -->
            <li style="float:right"><a href="admin.php">ADMIN</a></li>
        </ul>
    </nav>

    <!-- Display Books List -->
    <div class="showdata">
        <h1>Books List</h1>
        <div class="table-container">
            <!-- Table to display books -->
            <table border="1">
                <tr>
                    <th>Book Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Date</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
                <?php
                // Query to fetch all books
                $con=mysqli_connect('localhost','root','','bookheart') or die("Could not connect database!");
                $query = "SELECT * FROM booklist";
                $result = mysqli_query($con, $query);

                // Loop through each book and display details
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['bookid']; ?></td>
                        <!-- Display book image -->
                        <td><img src="<?php echo $row['image']; ?>" alt="Book Image"></td>
                        <td><?php echo $row['bookname']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['genre']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo "$" . $row['price']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Update Form for Books -->
    <div class="section">
        <?php
        // Check if book details are fetched
        if ($myrow) {
            // Assign fetched values to variables for easy access
            $bookid = $myrow["bookid"];
            $bookimage = $myrow["image"];
            $bookname = $myrow["bookname"];
            $author = $myrow["author"];
            $genre = $myrow["genre"];
            $date = $myrow["date"];
            $description = $myrow["description"];
            $price = $myrow["price"];
        ?>
            <h2>Edit a New Book</h2>
            <!-- Form for updating book details -->
            <form action="update2.php" method="post" enctype="multipart/form-data">
                <!-- Hidden field to store book ID -->
                <label for="bookid ">Book ID:<?php echo $bookid ?></label>
                <input type="hidden" name="bookid" value="<?php echo $bookid; ?>">

                <!-- Display current book image -->
                <label for="image">Current Book Image:</label>
                <img src="<?php echo $bookimage; ?>" alt="Current Book Image" style="width: 100px; height: 150px;">
                
                <!-- Hidden field to store old image path -->
                <input type="hidden" name="oldimage" value="<?php echo $bookimage; ?>">

                <!-- Allow users to upload a new image -->
                <label for="image">New Book Image:</label>
                <input type="file" name="image" accept=".jpg, .jpeg, .png">

                <!-- Input fields for updating other book details -->
                <label for="bookName">Book Name:</label>
                <input type="text" name="bookName" value="<?php echo $bookname ?>" required>

                <label for="author">Author:</label>
                <input type="text" name="author" value="<?php echo $author ?>" required>

                <label for="genre">Genre:</label>
                <input type="text" name="genre" value="<?php echo $genre ?>" required>

                <label for="publicationDate">Publication Date:</label>
                <input type="date" name="publicationDate" value="<?php echo $date ?>" required>

                <label for="description">Description:</label>
                <textarea name="description" required cols="30" rows="10"><?php echo $description ?></textarea>

                <label for="price">Price:</label>
                <input type="number" name="price" step="0.01" value="<?php echo $price ?>" required>

                <!-- Button to submit form for updating book -->
                <button type="submit" name="edit">Edit Book</button>
            </form>
        <?php
        } else {
            // If no record found for given book ID
            print "<p>No record found for Book ID: $bookId</p>";
        }
        ?>
    </div>

    <!-- Footer Section -->
    <footer>
        <!-- Copyright information -->
        <p>&copy; 2024 Book Heart. All rights reserved.</p>
    </footer>

</body>

</html>
