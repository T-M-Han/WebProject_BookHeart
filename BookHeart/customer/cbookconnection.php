<?php
    // Database connection parameters
    $host = 'localhost'; // Hostname
    $user = 'root'; // Username
    $password = ''; // Password
    $database = 'bookheart'; // Database name
    $table_name = 'booklist'; // Table name for book list

    // Connect to the database or display an error message if connection fails
    $con = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database!");
?>
