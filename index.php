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
        // simply includes the header files to show up within this block of markup
        include("header.php");
        include("navmenu.php");
	?>
    </header>

    <!--main content section-->
    <div class="spacer"></div>
    
    <section class="centered">
        <h2 class="heading">Where are you hungry?</h2>
        <form action="listings.php" method="GET" class="centered">
            <select name="location">
                <option value="all">show all locations</option>
                <option value="downtown">downtown</option>
                <option value="west end">west end</option>
                <option value="mount pleasant">mount pleasant</option>
                <option value="fairview">fairview</option>
                <option value="kensington-cedar cottage">kensington-cedar cottage</option>
            </select>
            <h3 class="centered">sort by</h3>  
            <!-- random, alphabetical, by location, and by ethnic origin which include: -->
            <select name="sort">
                <option value="id">id</option>
                <option value="alphabetical">alphabetical</option>
                <option value="location">location</option>
                <option value="origin">country of origin</option>
            </select>      
            <input type="submit" value="go">
        </form>
        <!-- <a href="content.php?id="></a> -->
    </section>



</body>
</html>
