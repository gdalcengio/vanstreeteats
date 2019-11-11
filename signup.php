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
    // adds the header files
        include("header.php");
        include("navmenu.php");
	?>
    </header>

    <!--main content section-->
    <div class="spacer"></div>
    <section class="centered">
        <!-- form to sign up user -->
        <form action="register_user.php" method="POST">
            <h2>Sign Up</h2>
            <div class="form-input">
                <!-- name -->
                <label for="name">name:</label>
                <input type="text" name="name" placeholder="john doe" required>
            </div>
            <div class="form-input">
                <!-- username -->
                <label for="user">username:</label>
                <input type="text" name="user" placeholder="john111" required>
            </div>
            <div class="form-input">
                <!-- password (shows up hidden) -->
                <label for="pass">password:</label>
                <input type="password" name="pass" placeholder="*****" required>
            </div>
            <div class="form-input">
                <!-- email address (requires an @_____.com) -->
                <label for="email">e-mail address:</label>
                <input type="email" name="email" placeholder="email@email.com" required>
            </div>

            <div class="form-input">
                <label for="ePref">preferred food origin:</label>
                <select name="ePref">;
                    <option value="fusion">fusion</option>
                    <option value="western">from the west</option>
                    <option value="south american">south american</option>
                    <option value="asian">asian</option>
                    <option value="middle eastern">middle eastern</option>
                    <option value="european">european</option>
                    <option value="australian">australian</option>
                </select>
            </div>

            <div class="form-input">
                <label for="fPref">preferred food type:</label>
                <select name="fPref">;
                    <option value="cultural cuisine">cultural cuisine</option>
                    <option value="hot dogs">hot dogs</option>
                    <option value="fried">fried foods</option>
                    <option value="drinks">drinks</option>
                    <option value="meats">meat based dishes</option>
                    <option value="sandwiches">sandwiches</option>
                    <option value="soups">soups</option>
                    <option value="vergan">vegan/vegetarian</option>
                    <option value="burgers">burgers</option>
                    <option value="dessert">desserts</option>
                </select>
            </div>

            <!-- submits the form which leads to register_user.php -->
            <input type="submit" value="register">
        </form>
    </section>
</body>
</html>
