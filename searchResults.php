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

            <h1>Jack's Comics | Search Results</h1>

            <ul>
                <li><a href="./">Return Home</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="container">

            <?php 

                include "Comic.php";  
                include "config.php";

                if(isset($_POST["criteria"])){
                    $criteria = urlencode($_POST["criteria"]);
                    $sql = "SELECT * FROM comics WHERE isbn LIKE '%$criteria%' or title LIKE '%$criteria%' or mainCharacter LIKE '%$criteria%' or author LIKE '%$criteria%' or year = '$criteria' or rating = '$criteria' ORDER BY `year` desc;";
                }else{
                    $sql = "SELECT * FROM comics ORDER BY `year` desc;";
                }
              
                echo "<script>console.log(\"$sql\")</script>";
                

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