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
            $reviewResult;

            openConnection($connection);
            getListing($connection, $result);
            $row = mysqli_fetch_array($result);
            getReviews($connection, $reviewResult);
            


            // title
            echo "<h1>".$row["name"]."</h1>";
            echo "<h2>".$row["origin"]." | ".$row["type"]."</h2>";
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

            echo "<h3>".$row["location"]." | ".$row["address"]."</h3>";
            echo "<p>".$row["description"]."</p>";

            echo "<div class=\"review-container\">";
            echo "<h2>reviews</h2>";

            while ($review = mysqli_fetch_array($reviewResult)) {
                echo "<h4>".$review["username"].":</h4>";
                echo "<p>".$review["text"]."</p>";
            }
            echo "</div>";

            $id = $_GET["id"];

            if (isset($_SESSION["set_user"])) {
                echo "<form action=\"addedReview.php?id=".$id."\" method=\"POST\">";
                echo "<h2>add a review</h2>";
                echo "<div class=\"form-input\">";
                    // text (reviewtext)
                echo "<input type=\"text\" name=\"reviewText\" required>";
                echo "</div>";
                echo "<div class=\"form-input\">";
                    // rating (stars)
                echo "<label for=\"stars\">rating/5:</label>";
                echo "<select name=\"stars\">";
                echo "    <option value=\"1\">1</option>";
                echo "    <option value=\"2\">2</option>";
                echo "    <option value=\"3\">3</option>";
                echo "    <option value=\"4\">4</option>";
                echo "    <option value=\"5\">5</option>";
                echo "</select>";
                echo "</div>";
                    // submit button
                echo "<input type=\"submit\">";
                echo "</form>";
            }
        ?>

        <?php
            closeConnection($connection, $result);
        ?>
    </section>
</body>
</html>






