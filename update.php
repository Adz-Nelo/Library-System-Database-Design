<?php
include("connections.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $book_id = $_POST["book_id"];
    $new_title = $_POST["new_title"];
    $new_author = $_POST["new_author"];
    $new_cat_name = $_POST["new_cat_name"];

    // Update the record in the database
    $sql = "UPDATE books SET title = '$new_title', author = '$new_author' WHERE book_id = '$book_id';";
    $sql = "UPDATE categories SET category_name = '$new_cat_name' WHERE category_id = (SELECT category_id FROM books WHERE book_id = '$book_id')";

    // Execute the query
    if (mysqli_multi_query($connections, $sql)) {
        echo "<script>alert('Record updated successfully!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($connections);
    }
}

// Check if the 'id' parameter is provided
if (isset($_GET["id"])) {
    // Retrieve the book details based on the provided 'id'
    $db_book_id = $_GET["id"];
    $get_record = mysqli_query($connections, "SELECT b.*, c.category_name 
                                             FROM books b 
                                             LEFT JOIN categories c ON b.category_id = c.category_id 
                                             WHERE book_id = '$db_book_id'");
    if ($row_edit = mysqli_fetch_assoc($get_record)) {
        $db_title = $row_edit["title"];
        $db_author = $row_edit["author"];
        $db_cat_name = $row_edit["category_name"];
    } else {
        echo "No record found with the provided ID.";
        exit;
    }
} else {
    echo "No ID parameter provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
</head>

<body>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
        }

        *::selection {
            background-color: #FF9350;
        }

        body {
            background-image: url('img/Cute\ Astronaut\ Flying\ with\ jetpack\ orange\ and\ gray.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 -160px;
            background-attachment: fixed;
        }

        .form {
            position: relative;
            top: 7em;
            border: 2px solid white;
            border-radius: 6px;
            width: 17.5em;
            padding-top: -1em;
            height: 18.3em;
            backdrop-filter: blur(25px);
        }

        .hr {
            top: -10px;
            position: relative;
            border: 1px solid white;
            box-shadow: 1px 1px 10px gray;
        }

        .update {
            text-shadow: 1px 1px 10px gray;
            font-size: 25px;
        }

        .t-box {
            color: black;
            font-size: 18px;
        }

        .t-box::selection {
            color: white;
        }

        .update-btn {
            background-color: transparent;
            border: 2px solid white;
            width: 13em;
            height: 2.23em;
            font-size: 18px;
            border-radius: 4px;
            transition: transform 0.4s, font-size 0.4s, background-color 0.4s;
            cursor: pointer;
        }

        .update-btn:hover {
            background-color: #FF9350;
            font-size: 20px;
        }
    </style>

    <center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form">
            <h2 class="update">Update Book</h2>
            <hr class="hr">

            <input type="hidden" name="book_id" value="<?php echo $db_book_id; ?>">

            <input type="text" name="new_title" value="<?php echo $db_title; ?>" placeholder="New Title" class="t-box"><br><br>

            <input type="text" name="new_author" value="<?php echo $db_author; ?>" placeholder="New Author" class="t-box"><br><br>

            <input type="text" name="new_cat_name" value="<?php echo $db_cat_name; ?>" placeholder="New Category Name" class="t-box"><br><br>

            <input type="submit" value="Update" class="update-btn">
        </form>
    </center>
</body>

</html>