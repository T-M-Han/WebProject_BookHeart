<?php
    // Establish a connection to the database
    $conn = mysqli_connect('localhost', 'root', '', 'bookheart') or die("Could not connect to the database!");

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get username and password from the form
        $username = $_POST['inusername'];
        $password = $_POST['inpassword'];

        // Validate the username and password for members
        $member_sql = "SELECT * FROM memberlist WHERE username = ? AND password = ?";
        $member_stmt = $conn->prepare($member_sql);
        $member_stmt->bind_param('ss', $username, $password);
        $member_stmt->execute();
        $member_result = $member_stmt->get_result();
        $row = $member_result->fetch_assoc();

        // Validate the username and password for admins
        $admin_sql = "SELECT * FROM adminlist WHERE adminname = ? AND password = ?";
        $admin_stmt = $conn->prepare($admin_sql);
        $admin_stmt->bind_param('ss', $username, $password);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();
        $arow = $admin_result->fetch_assoc();

        // Check if the user is a member
        if (mysqli_num_rows($member_result) > 0) {
            session_start();
            // Set session variable and redirect to member's home page
            $_SESSION['username'] = $row['name'];
            header("Location: ../member/home.php");
            exit();
        } 
        // Check if the user is an admin
        elseif ($admin_result->num_rows > 0) {
            session_start();
            // Set session variable and redirect to admin's page for book insertion
            $_SESSION['name'] = $arow['adminname'];
            header("Location: ../admin/books(insert).php");
            exit();
        } 
        // If neither member nor admin, redirect back with an error message
        else {
            // Invalid credentials, redirect back with an error message
            header("Location: signin&up.php?error=1");
            exit();
        }
    }

    // Close the database connection
    $conn->close();
?>
