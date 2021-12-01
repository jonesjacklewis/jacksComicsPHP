<?php
include "Comic.php";
include "config.php";

if (isset($_POST["confirmDelete"])) {

    $isbn = urlencode($_POST['isbn']);

    if ($_POST["confirmDelete"] == "Y") {
        $sql = "DELETE FROM `comics` WHERE isbn = '$isbn';";

        $mysqli->query($sql);

        echo "<script>window.alert('Successfully Delete `$isbn`');window.location.href='./';</script>";
    } else {
        $sql = "DELETE FROM `comics` WHERE isbn = '$isbn';";

        $mysqli->query($sql);

        echo "<script>window.alert('Did not Delete `$isbn`');window.location.href='./';</script>";
    }
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
            <h1>Jack's Comics | Delete Record <?php echo $isbn ?></h1>
            <h2><a href="./">Return to Home</a></h2>
        </div>
    </header>

    <main>
        <div class="card">
            <form action="delete.php" method="post">

                <h2>Are you sure you want to delete the below record</h2>
                <img src="<?php echo $image ?>" alt="Cover of <?php $title ?>">
                <h2>Title: <?php echo $title ?></h2>
                <input type="text" name="isbn" id="isbn" value="<?php echo $isbn ?>"> <br>
                <label for="confirmDelete">I understand that deleting this record is permanent.</label>

                <select name="confirmDelete" id="confirmDelete" required>
                    <option value="Y">Yes</option>
                    <option value="N">No</option>
                </select> <br>

                <button type="submit">Delete</button>
            </form>
        </div>

    </main>

    <footer>
        <p>Created by Jack Jones</p>
    </footer>




</body>

</html>