<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    * {
        color: white;
        text-shadow: 1px 1px 10px gray;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    *::selection {
        background-color: #F6EB51;
    }

    body {
        background-image: url('img/A\ photo\ of\ a\ bookshelf\ with\ a\ variety\ of\ books.\ Th.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
    }

    .cat {
        font-size: 45px;
    }

    .hr {
        top: -20px;
        position: relative;
        border: 1px solid white;
        margin-bottom: 60px;
        box-shadow: 1px 1px 10px gray;
    }

    .table {
        margin-top: -1.5em;
        border: 1px solid white;
        backdrop-filter: blur(30px);
        font-size: 20px;
        border-radius: 3px;
        box-shadow: 1px 1px 10px gray;
    }

    .td {
        text-align: center;
    }

    #th {
        font-weight: bold;
    }
</style>


<body>

    <center>

        <h1 class="cat">Categories</h1>
        <hr class="hr">

        <?php

        include("connections.php");
        include("nav.php");

        $view_cat = mysqli_query($connections, "SELECT * FROM categories");

        echo "<table border ='1' width='50%' class='table'>";
        echo "<tr>
                <td class='td' id='th'>Category ID</td>
                <td class='td' id='th'>Category Name</td>
            </tr>";

        while ($row = mysqli_fetch_assoc($view_cat)) {
            $db_cat_id = $row["category_id"];
            $db_cat_name = $row["category_name"];

            echo "<tr>
                    <td class='td'>$db_cat_id</td>
                    <td class='td'>$db_cat_name</td>
                </tr>";
        }

        echo "</table>";

        ?>

    </center>

</body>

</html>