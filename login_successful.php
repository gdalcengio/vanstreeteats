<?php session_start();?>

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

    <div class="spacer"></div>
            
    <p class="centered">you have successfully logged in,<?php$_SESSION["set_user"]?></p>;

</body>
</html>