<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Table</title>
</head>

<body>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            text-shadow: 1px 1px 10px gray;
        }

        *::selection {
            background-color: #3599FE;
        }

        body {
            background-image: url('img/educational\ books\ over\ a\ table.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .book {
            font-size: 45px;
        }

        .h {
            position: relative;
            border: 1px solid white;
            box-shadow: 1px 1px 10px gray;
            margin-bottom: 5em;
        }

        .table {
            position: relative;
            top: -4em;
            backdrop-filter: blur(30px);
            border: 1px solid white;
            border-radius: 3px;
            box-shadow: 1px 1px 10px gray;
            font-size: 18px;
            width: 45em;
        }

        .td {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
        }

        .db {
            position: relative;
            text-align: center;

        }

        .action {
            text-align: center;
        }

        .action a {
            text-decoration: none;
            transition: transform 0.4s, font-size 0.4s, color 0.4s;
        }

        .action a:hover {
            font-size: 20.5px;
        }

        #update:hover {
            color: #2E85FA;
            text-shadow: 1px 1px 10px gray;
        }

        #delete:hover {
            color: #F62037;
            text-shadow: 1px 1px 10px gray;
        }
    </style>

    <center>
        <h1 class="book">Books Table</h1>
        <hr class="h">
        <div>
            <?php
            include("connections.php");
            include("nav.php");

            $view_sql = mysqli_query($connections, "SELECT * FROM books");

            echo "<br><table border='1' width='50%' class='table'>";
            echo "<tr>
                            <td class='td'>Book ID</td>
                            <td class='td'>Name</td>
                            <td class='td'>Author</td>
                            <td class='td'>Action</td>
                        </tr>";

            while ($row = mysqli_fetch_assoc($view_sql)) {
                $db_book_id = $row["book_id"];
                $db_title = $row["title"];
                $db_author = $row["author"];

                echo "<tr>
                        <td class='db'>$db_book_id</td>
                        <td class='db'>$db_title</td>
                        <td class='db'>$db_author</td>

                        <td class='action'><a href='update.php?id=$db_book_id' id='update'>Update</a>&nbsp;
                        <a href='del.php?id=$db_book_id' id='delete'>Delete<a/></td>&nbsp;
                    </tr>";
            }

            echo "</table>";

            ?>
        </div>
    </center>

</body>

</html>