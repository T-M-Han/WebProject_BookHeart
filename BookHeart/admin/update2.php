<?php
// Database connection details
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'bookheart';
$table_name = 'booklist';

// Establish database connection
$con = mysqli_connect($host, $user, $passwd, $database) or die("Could not connect to database");

// Check if the form is submitted for editing
if (isset($_POST['edit'])) {
    // Retrieve form data
    $bookid = $_POST['bookid'];
    $oldimage = $_POST['oldimage'];
    $newimage = $_FILES['image']['name'];
    $bookname = $_POST['bookName'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $date = $_POST['publicationDate'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // If a new image is uploaded, move it to the upload folder
    if (!empty($newimage)) {
        $upload_folder = "../Images/";
        $target_path = $upload_folder . $newimage;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
    } else {
        // If no new image is uploaded, keep the old image path
        $target_path = $oldimage;
    }

    // Use prepared statements to prevent SQL injection
    $update_query = "UPDATE $table_name SET 
                    image = ?,
                    bookname = ?,
                    author = ?,
                    genre = ?,
                    date = ?,
                    description = ?,
                    price = ?
                    WHERE bookid = ?";

    $stmt = mysqli_prepare($con, $update_query);
    mysqli_stmt_bind_param($stmt, 'sssssssi', $target_path, $bookname, $author, $genre, $date, $description, $price, $bookid);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Redirect back to the update page with a success message
    header("Location: books(update).php?success=1");
    exit();
} else {
    // If the form is not submitted, redirect back to the update page
    header("Location: books(update).php");
    exit();
}
?>
