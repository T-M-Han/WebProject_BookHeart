<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bookheart';
$table_name = 'commentlist';

// Connect to the database or display an error message if connection fails
$con = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

// SQL query to insert a new comment into the commentlist table
$sql = "INSERT INTO $table_name (Cmemberid, membername, comment) VALUES 
    ('{$_POST['membrid']}', '{$_POST['membername']}', '{$_POST['commentText']}')";

// Execute the SQL query
if (!mysqli_query($con, $sql)) {
    // If insertion fails, display an error message and terminate the script
    die('Error: ' . mysqli_error($con));
}

// If insertion is successful, display a success message
$successMessage = "Your message was successfully sent!";

// Redirect back to the review page (cbooks.php) with success message as a parameter
header("Location: review.php?success=" . urlencode($successMessage));

// Close the database connection
mysqli_close($con);
?>
