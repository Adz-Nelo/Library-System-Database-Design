<?php

include("connections.php");

$title = $author = $cat_name = "";
$titleErr = $authorErr = $catErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $title = trim($_POST["title"]);
    $author = trim($_POST["author"]);
    $cat_name = trim($_POST["cat_name"]);

    if (empty($title)) {
        $titleErr = "Title is required!";
    }

    if (empty($author)) {
        $authorErr = "Author is required!";
    }

    if (empty($cat_name)) {
        $catErr = "Category is required!";
    }

    // If all fields are filled
    if (!empty($title) && !empty($author) && !empty($cat_name)) {
        // Insert book into the books table
        $sql_book = mysqli_query($connections, "INSERT INTO books (title, author, category_id) VALUES ('$title', '$author', NULL)");

        // Get the ID of the inserted book
        $book_id = mysqli_insert_id($connections);

        // Insert category into the categories table
        $sql_cat = mysqli_query($connections, "INSERT INTO categories (category_name) VALUES ('$cat_name')");

        // Get the ID of the inserted category
        $category_id = mysqli_insert_id($connections);

        // Update the category_id of the book with the ID of the inserted category
        $sql_update = mysqli_query($connections, "UPDATE books SET category_id = '$category_id' WHERE book_id = '$book_id'");

        if ($sql_book && $sql_cat && $sql_update) {
            echo "<script>alert('New Record has been inserted!')</script>";
            echo "<script>window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error occurred while inserting records!')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratory Exercise 3</title>
</head>

<body>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            text-shadow: 1px 1px 10px black;
        }

        *::selection {
            background: #5FD164;
        }

        body {
            background-image: url('img/futuristic\ sci-fi\ Library\ pod.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
        }

        #form {
            border: 2px solid white;
            padding-top: 1em;
            position: relative;
            top: -2em;
            height: 22em;
            width: 20em;
            border-radius: 4px;
            box-shadow: 1px 1px 10px gray;
            backdrop-filter: blur(20px);
        }

        .dev {
            position: relative;
            padding-top: 20px;
            bottom: -10px;
            font-size: 38px;
            text-shadow: 1px 1px 10px #262C27;
        }

        .h {
            position: relative;
            border: 1px solid white;
            box-shadow: 1px 1px 10px gray;
        }

        .lib {
            position: relative;
            top: -5px;
            font-size: 30px;
            text-shadow: 1px 1px 10px black;
        }

        #th {
            position: relative;
            border: 1.5px solid white;
            top: -52px;
            width: 78.2em;
        }

        #fh {
            position: relative;
            top: -20px;
        }

        .t-box {
            outline: none;
            text-shadow: none;
            color: black;
            font-size: 20px;
            top: 20px;
            margin-top: 15px;
        }

        .t-box::selection {
            color: white;
            text-shadow: 1px 1px 10px black;
        }

        #title {
            position: relative;
            top: -1em;
        }

        #author {
            position: relative;
            top: -1em;
        }

        #category {
            position: relative;
            top: -1em;
        }

        .error {
            position: fixed;
            font-size: 20px;
            color: #F83315;
            right: 50px;
            text-shadow: 1px 1px 10px red;
        }

        #titleErr {
            top: 6.12em;
            right: 4.4em;
        }

        #authorErr {
            top: 9.6em;
            right: 3.7em;
        }

        #catErr {
            top: 13em;
            right: 3.25em;
        }

        .submit {
            background-color: transparent;
            border: 2px solid white;
            border-radius: 5px;
            font-size: 22px;
            height: 2em;
            width: 12em;
            cursor: pointer;
            transition: transform 0.4s, font-size 0.4s, background-color 0.4s;
        }

        .submit:hover {
            font-size: 24px;
            background-color: #5FD164;
        }
    </style>

    <center>
        <h1 class="dev">Adz's Library</h1>
        <br><br>
        <hr class="h" id="th">
        <br>

        <?php

        include("nav.php");

        ?>

        <div id="form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <span class="lib">Library Form</span><br><br>
                <hr class="h" id="fh">

                <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title" class="t-box" id="title">
                <span class="error" id="titleErr"><?php echo $titleErr; ?></span><br><br>

                <input type="text" name="author" value="<?php echo $author; ?>" placeholder="Author" class="t-box" id="author">
                <span class="error" id="authorErr"><?php echo $authorErr; ?></span><br><br>

                <input type="text" name="cat_name" value="<?php echo $cat_name; ?>" placeholder="Category" class="t-box" id="category">
                <span class="error" id="catErr"><?php echo $catErr; ?></span><br><br>

                <input type="submit" class="submit">
            </form>
        </div>

        <br>

    </center>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>