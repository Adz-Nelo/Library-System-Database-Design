<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
</head>

<body>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-shadow: 1px 1px 10px gray;
        }

        .navbar {
            text-decoration: none;
            color: white;
            font-size: 28px;
            position: relative;
            top: -2.5em;
            margin: .80em;
            text-shadow: 1px 1px 10px black;
            transition: transform 0.4s, background-color 0.4s;
        }

        #home:hover {
            background-color: #5FD164;
            position: relative;
            padding-left: .45em;
            padding-right: .45em;
            padding-top: .10em;
            padding-bottom: .10em;
            top: -69px;
            font-size: 30px;
            border: 2px solid white;
            border-radius: 5px;
            box-shadow: 1px 1px 10px #262C27;
        }

        #books:hover {
            background-color: #3599FE;
            position: relative;
            padding-left: .45em;
            padding-right: .45em;
            padding-top: .10em;
            padding-bottom: .10em;
            top: -69px;
            font-size: 30px;
            border: 2px solid white;
            border-radius: 5px;
            box-shadow: 1px 1px 10px #262C27;
        }

        #categories:hover {
            background-color: #F6EB51;
            position: relative;
            padding-left: .45em;
            padding-right: .45em;
            padding-top: .10em;
            padding-bottom: .10em;
            top: -69px;
            font-size: 30px;
            border: 2px solid white;
            border-radius: 5px;
            box-shadow: 1px 1px 10px #262C27;
        }
    </style>

    <center>
        &nbsp;&nbsp;<a href="index.php" class="navbar" id="home">HOME</a>
        <a href="display.php" class="navbar" id="books">BOOKS</a>
        <a href="cat_display.php" class="navbar" id="categories">CATEGORIES</a>
    </center>
</body>

</html>