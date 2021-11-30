<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jack's Comics</title>
    <link rel="stylesheet" href="style/index.css">
</head>

<body>

    <header>
        <div id="action-centre">

            <h1>Jack's Comics</h1>

            <ul>
                <li><a href="manualAdd.php">Add Record Manually</a></li>
                <li><a href="#">Add Record ISBN</a></li>
            </ul>

            <form action="index.php" method="post">
                <label for="criteria">Search Criteria</label>
                <input type="text" name="criteria" id="criteria">
                <button type="submit">Search</button>
            </form>
        </div>
    </header>

    <main>
        <div class="container">

            <?php 

                include "Comic.php";  
                include "config.php";

              

                $sql = "SELECT * FROM comics ORDER BY `year` desc;";

                $loop = $mysqli->query($sql)
                or die (mysqli_error($dbh));

                while ($row = mysqli_fetch_array($loop))
                {
                    $details = [$row["isbn"], $row["title"], $row["mainCharacter"], $row["author"], $row["year"], $row["link"], $row["rating"], $row["image"]];
                    $comic = new Comic($details);

              

                    echo $comic->create_div();

                }
            
            
            ?>

        </div>
    </main>

    <footer>
        <p>Created by Jack Jones</p>
    </footer>
</body>

</html>