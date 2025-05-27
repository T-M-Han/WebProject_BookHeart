<?php
// Check if the form for adding a new book is submitted
if (isset($_POST['add'])) {
    // Establish database connection
    $con = mysqli_connect('localhost', 'root', '', 'bookheart') or die("Could not connect to the database!");

    // Define the target directory where the uploaded image will be stored
    $targetDirectory = "../Images/";

    // Define the target file path
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    // Initialize variables for file upload validation
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file format
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Use prepared statement to avoid SQL injection
            $sql = "INSERT INTO booklist (image, bookname, author, genre, date, description, price) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $sql);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ssssssd", $targetFile, $_POST['bookName'], $_POST['author'], $_POST['genre'], $_POST['publicationDate'], $_POST['description'], $_POST['price']);

            // Execute the statement
            if (!mysqli_stmt_execute($stmt)) {
                echo 'Error: ' . mysqli_stmt_error($stmt);
            } else {
                // Redirect to the book insertion page after successful insertion
                header("Location: books(insert).php");
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Close the database connection
    mysqli_close($con);
}
?>
