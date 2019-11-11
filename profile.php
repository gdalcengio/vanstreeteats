<?php
    @session_start();
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
            $connection;
            $result;
            if (isset($_SESSION["set_user"])) {
                openConnection($connection);
                getUser($connection, $result);
                $user = mysqli_fetch_array($result);
                $name = $user["username"];
            } else {
                $name = "please sign in, you shouldn't even see this because it means there's an error";
            }
            echo "<h1>".$name."'s user information</h1>";
            // echo "<h2>details</h2>";
            echo "<h3>email:</h3>";
            echo "<p>".$user["email"]."</p>";
            echo "<h3>preferred food region:</h3>";
            echo "<p>".$user["e_pref"]."</p>";
            echo "<h3>preferred food type:</h3>";
            echo "<p>".$user["f_pref"]."</p>";
            
            echo "<div class=\"spacer\"></div>";
            echo "<a href=\"user_pref.php\">edit</a>";
            closeConnection($connection, $result);
        ?>

        
    </section>
    



</body>
</html>
