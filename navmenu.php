<?php
    @session_start();
    @require_once("functions.php");
?>

<nav><!-- added to the header via include-->
    <a href="about.php" class="nav-link">ABOUT</a>
    <?php
    if (isset($_SESSION["set_user"])) {
        echo "<a href=\"profile.php\" class=\"nav-link\" id=\"profile-link\">PROFILE</a>";
        echo "<a href=\"logout.php\" class=\"nav-link\" id=\"logout-link\">LOGOUT</a>";
    } else {
        echo "<a href=\"login.php\" class=\"nav-link\" id=\"login-link\">LOGIN</a>";
        echo "<a href=\"signup.php\" class=\"nav-link\" id=\"signup-link\">SIGN UP</a>";
    }
    ?>
</nav>