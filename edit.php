<?php
include "Comic.php";
include "config.php";

if (isset($_POST["mainCharacter"])) {
    $isbn = urlencode($_POST['isbn']);
    $title = urlencode($_POST['title']);
    $mainCharacter = urlencode($_POST['mainCharacter']);
    $author = urlencode($_POST['author']);
    $year = urlencode($_POST['year']);
    $link = urlencode($_POST['link']);
    $rating = urlencode($_POST['rating']);
    $image = urlencode($_POST['image']);


    $sql = "UPDATE `comics` SET title = '$title', mainCharacter = '$mainCharacter', author = '$author', year = '$year', link = '$link', rating = '$rating', image = '$image' WHERE isbn = '$isbn';";
    
    $mysqli->query($sql);

    echo "<script>window.alert('Successfully updated `$isbn`');window.location.href='./';</script>";


}

if (isset($_GET["isbn"])) {
    $isbn = $_GET["isbn"];
} else {
    $isbn = null;
}

if ($isbn != null) {
    $sql = "SELECT * FROM comics where isbn = '$isbn';";

    $result = $mysqli->query($sql);

    $data = $result->fetch_all(MYSQLI_ASSOC)[0];

    $title = urldecode($data["title"]);
    $mainCharacter = urldecode($data["mainCharacter"]);
    $author = urldecode($data["author"]);
    $year = urldecode($data["year"]);
    $link = urldecode($data["link"]);
    $rating = urldecode($data["rating"]);
    $image = urldecode($data["image"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jack's Comics | Edit Record</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>

    <header>
        <div id="action-centre">
            <h1>Jack's Comics | Edit Record <?php echo $isbn ?></h1>
            <h2><a href="./">Return to Home</a></h2>
        </div>
    </header>

    <main>
        <div id="action-centre">
            <form action="edit.php" method="post">

                <label for="isbn">ISBN/ASIN</label>
                <input type="text" name="isbn" id="isbn" value="<?php echo $isbn ?>"> <br>

                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?php echo $title ?>"> <br>

                <label for="mainCharacter">Main Character(s)</label>
                <input type="text" name="mainCharacter" id="mainCharacter" value="<?php echo $mainCharacter ?>"> <br>

                <label for="author">Author</label>
                <input type="text" name="author" id="author" value="<?php echo $author ?>"> <br>

                <label for="year">Year of Release</label>
                <input type="number" name="year" id="year" min="100" max="5000" value="<?php echo $year ?>"> <br>

                <label for="link">Link</label>
                <input type="text" name="link" id="link" value="<?php echo $link ?>"> <br>

                <label for="rating">Rating</label>
                <input type="number" name="rating" id="rating" min="1" max="5" default="3" value="<?php echo $rating ?>"> <br>

                <label for="image">Image URL</label>
                <input type="text" name="image" id="image" value="<?php echo $image ?>"> <br>

                <button type="submit">Edit</button>


            </form>
        </div>
    </main>

    <footer>
        <p>Created by Jack Jones</p>
    </footer>



</body>

</html>