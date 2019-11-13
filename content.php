<?php
    // session_start();
    @require_once("functions.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Van Street Eats</title>

    <link href="css/normalize.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Domine|Josefin+Sans&display=swap" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
</head>

<body>
    <!-- header section -->
    <header class="box-head box">
    <?php
        include("header.php");
        include("navmenu.php");
	?>
    </header>

    <!--main content section-->
    <!-- <h2 class="heading">Main Content</h2> -->
    <div class="spacer"></div>
    <section class="centered">
        <?php
            // if (isset($_SESSION["set_name"])) {
            //     $name = $_SESSION["set_name"];
            // } else {
            //     $name = "placeholder right now";
            // }
            // echo $name;
            $connection;
            $result;

            openConnection($connection);
            getListing($connection, $result);
            $row = mysqli_fetch_array($result);


            // title
            echo "<h1>".$row["name"]."</h1>";
            echo "<h3>".$row["origin"]." | ".$row["type"]."</h3>";
            //stars
            echo "<div>";
                for($i=0; $i<5; $i++){
                    if ($i<$row["rating"]) {
                        echo "<img src=\"img/star.png\" alt=\"filled star\">";
                    } else {
                        echo "<img src=\"img/star0.png\" alt=\"empty star\">";
                    }
                }
            echo "</div>";

            echo "<h4>".$row["location"]." | ".$row["address"]."</h4>";
            echo "<p>".$row["description"]."</p>";
        ?>

        <?php
            closeConnection($connection, $result);
        ?>
    </section>
</body>
</html>






