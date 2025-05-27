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
            <li><a href="members.php" >MEMBERS</a></li>
            <!-- Highlighted active link -->
            <li><a href="orders.php" class="active">ORDERS</a></li>
            <li><a href="acomment.php">COMMENTS</a></li>
            <!-- Right-aligned link -->
            <li style="float:right"><a href="admin.php">ADMIN</a></li>
        </ul>
    </nav>

    <!-- Display Orders List for Members -->
    <div class="showdata">
        <h1>Orders List - Member</h1>
        <div class="table-container">
            <!-- Table to display member orders -->
            <table border="1">
                <tr>
                    <th>Order-ID</th>
                    <th>Order-Date</th>
                    <th>Book-ID</th>
                    <th>Member-ID</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                <!-- PHP code to fetch and display member orders -->
                <?php
                // Connect to database
                $con=mysqli_connect('localhost','root','','bookheart') or die("Could not connect database!");
                // SQL query to select member orders
                $query = "SELECT * FROM morderlist";
                // Execute the query
                $result = mysqli_query($con, $query);
                // Loop through each row of the result
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <!-- Display order data in each column -->
                        <td><?php echo $row['Morderid']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['Mbookid']; ?></td>
                        <td><?php echo $row['memberid']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Display Orders List for Outsider Customers -->
    <div class="showdata">
        <h1>Orders List - Outsider Customer</h1>
        <div class="table-container">
            <!-- Table to display outsider customer orders -->
            <table border="1">
                <tr>
                    <th>Order-ID</th>
                    <th>Order-Date</th>
                    <th>Book-ID</th>
                    <th>Customer Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
                <!-- PHP code to fetch and display outsider customer orders -->
                <?php
                // Connect to database
                $con=mysqli_connect('localhost','root','','bookheart') or die("Could not connect database!");
                // SQL query to select outsider customer orders
                $query = "SELECT * FROM orderlist";
                // Execute the query
                $result = mysqli_query($con, $query);
                // Loop through each row of the result
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <!-- Display order data in each column -->
                        <td><?php echo $row['orderid']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['Obookid']; ?></td>
                        <td><?php echo $row['customername']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
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
