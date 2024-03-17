<?php
// Include the database connection file
include("connections.php");

// Check if the 'id' parameter is provided in the URL
if (isset($_REQUEST["id"])) {
    // Retrieve the 'id' parameter
    $book_id = $_REQUEST["id"];

    // Check if the 'confirm' parameter is set to confirm the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Query to delete the book with the specified 'book_id'
        $sql_del = mysqli_query($connections, "DELETE FROM books WHERE book_id='$book_id'");

        // Check if the deletion was successful
        if ($sql_del) {
            echo "<script>alert('Record deleted successfully!');</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($connections);
        }
    } else {
        // Display a confirmation dialog before deleting the record
        echo "<script>
            let confirmDelete = confirm('Are you sure you want to delete this record?');
            if(confirmDelete) {
                window.location.href = 'del.php?id=$book_id&confirm=yes';
            } else {
                window.location.href = 'index.php';
            }
        </script>";
    }
} else {
    echo "No book ID provided.";
}
