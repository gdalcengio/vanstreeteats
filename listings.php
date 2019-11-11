<?php
    require_once("functions.php");
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
        // simply includes the header files to show up within this block of markup
        include("header.php");
        include("navmenu.php");
	?>
    </header>

    <!--main content section-->
    <div class="spacer"></div>
    <div class="grid-container">
        <section class="box box-main col-2of3">
            <!-- <div class="box centered">
                <img src="img/prev.svg" alt="icon to go back" class="page_icon" id="backwards">
                <div id="page_icon_holder"><a href="#">1</a></div>
                <img src="img/next.svg" alt="icon to go next" class="page_icon" id="forwards">
            </div> -->
    
<?php
    $connection;
    $result;

    openConnection($connection);
    getListings($connection, $result);
    printRows($result);
    closeConnection($connection, $result);
?>
        <!-- <a href="content.php?id=______" class="card-link">
            <article class="card box" id="_____rowid____">
                <div class="card-info-left">
                    <h2 class="vendor-name">_____vendor name_____</h2>
                    <h3 class="food-type">_____vendor type _____</h3>
                </div>
                <div class="card-info-right">
                    <p class="location">____vendor location_____</p>
                </div>
            </article>
        </a> -->

        </section>

    <!-- filter section -->
    <aside class="box col-1of3">
        <h2>filters</h2>
        <h3>type</h3>
        <section class="categories">
            <form action="#" method="GET">
                <input class="filter-item" name="" type="checkbox" value="all"><label> show all types </label>
                <input class="filter-item" name="" type="checkbox" value="hot dogs"><label> hot dogs </label>
                <input class="filter-item" name="" type="checkbox" value="drinks"><label> drinks </label>
                <input class="filter-item" name="" type="checkbox" value="sandwiches"><label> sandwiches </label>
                <input class="filter-item" name="" type="checkbox" value="dim sum"><label> dim sum </label>
                <input class="filter-item" name="" type="checkbox" value="meats"><label> meats </label>
                <input class="filter-item" name="" type="checkbox" value="seafood"><label> seafood </label>
                <input class="filter-item" name="" type="checkbox" value="crepes"><label> crepes </label>
                <input class="filter-item" name="" type="checkbox" value="potato-based"><label> potato-based dishes </label>
                <input class="filter-item" name="" type="checkbox" value="soups"><label> soups </label>
                <input class="filter-item" name="" type="checkbox" value="grilled cheese"><label> grilled cheese </label>
                <input class="filter-item" name="" type="checkbox" value="chicken"><label> chicken </label>
                <input class="filter-item" name="" type="checkbox" value="burgers"><label> burgers </label>
                <input class="filter-item" name="" type="checkbox" value="fries"><label> fries </label>
                <input class="filter-item" name="" type="checkbox" value="dessert"><label> dessert </label>
            </form>
        </section>
        <h3>region</h3>
        <section class="filter">
            <form action="#" method="GET">
                <input class="filter-item" name="" type="checkbox" value="Asian"> <label for="">asian</label>
                <input class="filter-item" name="" type="checkbox" value="Middle East"><label for="">middle eastern</label>
                <input class="filter-item" name="" type="checkbox" value="Western"><label for="">western</label>
                <input class="filter-item" name="" type="checkbox" value="South America"><label for="">south america</label>
                <input class="filter-item" name="" type="checkbox" value="European"><label for="">european</label>
                <input class="filter-item" name="" type="checkbox" value="African">          <label for="">african</label>    
            </form>
        </section>
    </aside>
</div>
</body>
</html>

<?php
    //function to select the proper listings for listings.php
    function getListings(&$connection, &$result) {
        //first GET option from index.php
        if ($_GET["location"] == "all") {
            $query = "SELECT * FROM vendors";
        } else {
            $query = "SELECT * FROM vendors WHERE location=\"".$_GET["location"]."\"";
        }
        // second GET argument from index.php
        if ($_GET["sort"] != "id") {
            if ($_GET["sort"] == "alphabetical"){
                $query .= " ORDER BY name;";
            } else if ($_GET["sort"] == "location") {
                $query .= " ORDER BY location;";
            } else {
                $query .= " ORDER BY origin;";
            }

        } else {
            $query .= ";";
        }

        performQuery($connection, $result, $query);
    }
?>