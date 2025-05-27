<?php

// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bookheart';
$table_name = 'orderlist';

// Connect to the database
$con = mysqli_connect($host, $user, $password, $database) or die("could not connect to database");

// Prepare SQL query for inserting order data into the orderlist table
$sql = "INSERT INTO $table_name (Obookid, date, customername, age, address, phone, email) VALUES 
    ('$_POST[bookid]', '$_POST[date]', '$_POST[cname]', '$_POST[age]', '$_POST[address]', '$_POST[phone]', '$_POST[email]')";

// Execute the SQL query
if (!mysqli_query($con, $sql)) {
    // If there is an error in executing the query, display the error message and terminate execution
    die('Error: ' . mysqli_error($con));
}

// Display a success message
$successMessage = "Your purchase was successful! We will deliver your book in 3 days.";

// Redirect to cbooks.php with success message as a parameter
header("Location: cbooks.php?success=" . urlencode($successMessage));

// Close the database connection
mysqli_close($con);
?>
