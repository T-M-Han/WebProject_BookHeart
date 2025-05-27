<?php
    // Database connection parameters
    $host = 'localhost';    // Hostname of the database server
    $user = 'root';         // Username to access the database
    $password = '';         // Password to access the database
    $database = 'bookheart';// Name of the database
    $table_name = 'memberlist'; // Name of the table in the database

    // Establishing a connection to the database
    $conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database!");
    // If connection fails, the script stops execution and displays an error message
?>
