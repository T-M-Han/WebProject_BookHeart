<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- External CSS -->
    <link rel="stylesheet" href="style1.css">
    <!-- Title -->
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
            <li><a href="books(update).php" >BOOKS(Update)</a></li>
            <li><a href="books(delete).php">BOOKS(Deletion)</a></li>
            <li><a href="members.php" class="active">MEMBERS</a></li>
            <li><a href="orders.php">ORDERS</a></li>
            <li><a href="acomment.php">COMMENTS</a></li>
            <li style="float:right"><a href="admin.php">ADMIN</a></li>
        </ul>
    </nav>

    <!-- Display Members Data -->
    <div class="showdata">
        <h1>Members List</h1>
        <div class="table-container">
            <!-- Table to display data -->
            <table border="1">
                <tr>
                    <th>Member ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email Address</th>
                    <th>UserName</th>
                    <th>Password</th>
                </tr>
                <!-- PHP code to fetch and display member data -->
                <?php
                // Connect to database
                $con=mysqli_connect('localhost','root','','bookheart') or die("Could not connect database!");
                // SQL query to select all members
                $query = "SELECT * FROM memberlist";
                // Execute the query
                $result = mysqli_query($con, $query);
                // Loop through each row of the result
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <!-- Display member data in each column -->
                        <td><?php echo $row['memberid']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <!-- Mask the password for security -->
                        <td><?php echo "***********"; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <!-- Copyright information -->
        <p>&copy; 2024 Book Heart. All rights reserved.</p>
    </footer>
</body>

</html>
