<?php

// Database connection details
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bookheart';
$table_name = 'morderlist';

// Establish a connection to the database
$con = mysqli_connect($host, $user, $password, $database) or die("could not connect to database");

// SQL query to insert order information into the morderlist table
$sql = "INSERT INTO $table_name (date, Mbookid, memberid, name, age, address, phone, email) VALUES 
    ('{$_POST['date']}', '{$_POST['bookid']}', '{$_POST['1memberid']}', '{$_POST['1name']}', '{$_POST['1age']}', '{$_POST['1address']}'
    , '{$_POST['1phone']}', '{$_POST['1email']}')";

// Execute the SQL query
if (!mysqli_query($con, $sql)) {
    // If there is an error, display the error message and terminate the script
    die('Error: ' . mysqli_error($con));
}

// Display a success message
$successMessage = "Your purchase was successful! We will deliver your book in 3 days.";

// Redirect to books.php with the success message as a parameter
header("Location: books.php?success=" . urlencode($successMessage));

// Close the database connection
mysqli_close($con);
?>
