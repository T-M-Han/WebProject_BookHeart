<?php
// Establish a connection to the database
$con = mysqli_connect('localhost', 'root', '', 'bookheart') or die("Could not connect to the database!");

// Function to sanitize input data to prevent SQL injection
function sanitizeInput($input) {
    global $con;
    $input = mysqli_real_escape_string($con, $input);
    return $input;
}

// Validate and sanitize input data
$fullname = sanitizeInput($_POST['fullname']);
$age = sanitizeInput($_POST['age']);
$address = sanitizeInput($_POST['address']);
$phone = sanitizeInput($_POST['phone']);
$email = sanitizeInput($_POST['email']);
$upusername = sanitizeInput($_POST['upusername']);
$uppassword = sanitizeInput($_POST['uppassword']);

// Validate fullname
if (!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
    echo "<script>alert('Error: Invalid fullname format. Only letters and spaces are allowed.'); history.back();</script>";
    die();
}

// Validate age
if (!is_numeric($age) || $age <= 7) {
    echo "<script>alert('Error: Invalid age format. Age should be above 7.'); history.back();</script>";
    die();
}

// Validate phone number
if (!preg_match("/^[0-9]{11}$/", $phone)) {
    echo "<script>alert('Error: Invalid phone number format. Please enter a 11-digit number.'); history.back();</script>";
    die();
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Error: Invalid email address format.'); history.back();</script>";
    die();
}

// Validate username
if (!preg_match("/^[a-zA-Z0-9_]+$/", $upusername)) {
    echo "<script>alert('Error: Invalid username format. Only letters, numbers, and underscores are allowed.'); history.back();</script>";
    die();
}

// Validate password
if (strlen($uppassword) < 6) {
    echo "<script>alert('Error: Password should be at least 6 characters long.'); history.back();</script>";
    die();
}

// Construct the SQL query
$sql = "INSERT INTO memberlist(name, age, address, phone, email, username, password) VALUES 
        ('$fullname', '$age', '$address', '$phone', '$email', '$upusername', '$uppassword')";

// Execute the query and handle the result
if (mysqli_query($con, $sql)) {
    // Insert successful
    echo "<script>alert('Member Registration successful! Please Sign In Again!'); window.location.href='signin&up.php';</script>";
    mysqli_close($con);
    exit();
} else {
    // Insert failed
    echo "<script>alert('Error: " . mysqli_error($con) . "'); history.back();</script>";
    die();
}
?>
