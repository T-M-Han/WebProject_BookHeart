<?php
// Database connection parameters
$host = 'localhost';
$user = 'root';
$passwd = '';
$database = 'bookheart';
$table_name = 'booklist';

// Path to the folder where images are stored
$image_folder = $_SERVER['DOCUMENT_ROOT'] . '/BookHeart/Images/';

// Establish database connection
$connect = mysqli_connect($host, $user, $passwd, $database) or die("Could not connect to the database");

// Select the database
mysqli_select_db($connect, $database);

// Get the book ID from the POST request
$bookid = $_POST["bookid"];

// Query to select the record with the given book ID
$query = "SELECT * FROM $table_name WHERE bookid='" . $bookid . "'";

// SQL statement to delete the record with the given book ID
$sql = "DELETE FROM $table_name WHERE bookid='" . $bookid . "'";

// Execute the query
$result = mysqli_query($connect, $query);

// Fetch the record
$myrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

// Check if the record exists
if (!$myrow) {
    // If no record found
    print "<p>No such record</p>";
} else {
    // If record found

    // Get the image filename associated with the record
    $imageFilename = $myrow['image'];

    // Construct the full path to the image file
    $imageFilePath = $image_folder . $imageFilename;

    // Delete the corresponding image file
    if (file_exists($imageFilePath)) {
        unlink($imageFilePath);
        echo "Image file '$imageFilename' deleted successfully.";
    } else {
        echo "Image file '$imageFilename' not found.";
    }

    // Delete the record from the database
    mysqli_query($connect, $sql);
    echo "Book with ID '$bookid' has been deleted from the Database";

    // Redirect back to the delete page
    header("Location: books(delete).php");
}

// Close the database connection
mysqli_close($connect);
?>
