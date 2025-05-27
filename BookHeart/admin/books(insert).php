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
                <div class="header">
                    <p>BOOK HEART</p>
                </div>
            </li>
            <!-- Navigation links -->
            <li><a href="books(insert).php" class="active">BOOKS(Insertion)</a></li>
            <li><a href="books(update).php">BOOKS(Update)</a></li>
            <li><a href="books(delete).php">BOOKS(Deletion)</a></li>
            <li><a href="members.php" >MEMBERS</a></li>
            <li><a href="orders.php">ORDERS</a></li>
            <li><a href="acomment.php">COMMENTS</a></li>
            <li style="float:right"><a href="admin.php">ADMIN</a></li>
        </ul>
    </nav>

    <!-- Displaying Book List -->
    <div class="showdata">
        <h1>Books List</h1>
        <div class="table-container">
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
                // Connect to the database
                $con=mysqli_connect('localhost','root','','bookheart') or die("Could not connect database!");
                $query = "SELECT * FROM booklist";
                $result = mysqli_query($con, $query);

                // Fetch and display book details
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['bookid']; ?></td>
                        <!-- Displaying the image using an <img> tag -->
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

    <!-- Insert Form for Books -->
    <div class="section">
        <h2>Add a New Book</h2>
        <form action="insert.php" method="post" enctype="multipart/form-data">

            <label for="image">Book Image:</label>
            <input type="file" name="image" accept=".jpg, .jpeg, .png" required>

            <label for="bookName">Book Name:</label>
            <input type="text" name="bookName" required>

            <label for="author">Author:</label>
            <input type="text" name="author" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" required>

            <label for="publicationDate">Publication Date:</label>
            <input type="date" name="publicationDate" required>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>

            <label for="description">Description:</label>
            <textarea name="description" rows="5" cols="40" required></textarea><br>

            <!-- Button to submit the form for adding a new book -->
            <button type="submit" name="add">Add Book</button>
        </form>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Book Heart. All rights reserved.</p>
    </footer>
</body>

</html>
