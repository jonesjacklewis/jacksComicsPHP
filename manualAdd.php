<?php
include "Comic.php";
include "config.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jack's Comics | Add Manually</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>

    <header>
        <div id="action-centre">
            <h1>Jack's Comics | Add Manually</h1>
            <h2><a href="./">Return to Home</a></h2>
        </div>
    </header>

    <main>
        <div id="action-centre">
            <form action="manualAdd.php" method="post">

                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" id="isbn"> <br>

                <label for="title">Title</label>
                <input type="text" name="title" id="title"> <br>

                <label for="mainCharacter">Main Character(s)</label>
                <input type="text" name="mainCharacter" id="mainCharacter"> <br>

                <label for="author">Author</label>
                <input type="text" name="author" id="author"> <br>

                <label for="year">Year of Release</label>
                <input type="number" name="year" id="year" min="100" max="5000"> <br>

                <label for="link">Link</label>
                <input type="text" name="link" id="link"> <br>

                <label for="rating">Rating</label>
                <input type="number" name="rating" id="rating" min="1" max="5" default="3"> <br>

                <label for="image">Image URL</label>
                <input type="text" name="image" id="image"> <br>

                <button type="submit">Add</button>


            </form>
        </div>
    </main>

    <footer>
        <p>Created by Jack Jones</p>
    </footer>

    <script>
        const currentYear = new Date().getFullYear();
        const yearInput = document.getElementById("year");

        yearInput.max = currentYear;
        yearInput.value = currentYear;
    </script>

    <?php

        if (isset($_POST['isbn'])) {
            $isbn = urlencode($_POST['isbn']);
            $title = urlencode($_POST['title']);
            $mainCharacter = urlencode($_POST['mainCharacter']);
            $author = urlencode($_POST['author']);
            $year = urlencode($_POST['year']);
            $link = urlencode($_POST['link']);
            $rating = urlencode($_POST['rating']);
            $image = urlencode($_POST['image']);
            
            $sql = "INSERT INTO `comics` VALUES (null, '$isbn', '$title', '$mainCharacter', '$author', $year, '$link', $rating, '$image');";

            $mysqli->query($sql);

            echo "<script>window.alert('Successfully inserted `$isbn`');window.location.href='./';</script>";

        }

    ?>

</body>

</html>