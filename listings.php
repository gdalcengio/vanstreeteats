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
    <div class="grid-container">
            <!-- <div class="box centered">
                <img src="img/prev.svg" alt="icon to go back" class="page_icon" id="backwards">
                <div id="page_icon_holder"><a href="#">1</a></div>
                <img src="img/next.svg" alt="icon to go next" class="page_icon" id="forwards">
            </div> -->
        <section class="box box-main col-2of3">
<?php
    $connection;
    $result;

    openConnection($connection);
    getListings($connection, $result);
    printRows($result);
    closeConnection($connection, $result);
?>

        </section>

    <!-- filter section -->
    <aside class="box col-filter1">
        <h3 class="block">type</h3>
        <section class="categories">
            <form action="#" method="GET">
                <label class="filter-item"><input type="checkbox" value="all"> show all types </label>
                <label class="filter-item"><input type="checkbox" value="hot dogs"> hot dogs </label>
                <label class="filter-item"><input type="checkbox" value="drinks"> drinks </label>
                <label class="filter-item"><input type="checkbox" value="sandwiches"> sandwiches </label>
                <label class="filter-item"><input type="checkbox" value="dim sum"> dim sum </label>
                <label class="filter-item"><input type="checkbox" value="meats"> meats </label>
                <label class="filter-item"><input type="checkbox" value="seafood"> seafood </label>
                <label class="filter-item"><input type="checkbox" value="crepes"> crepes </label>
                <label class="filter-item"><input type="checkbox" value="potato-based"> potato-based dishes </label>
                <label class="filter-item"><input type="checkbox" value="soups"> soups </label>
                <label class="filter-item"><input type="checkbox" value="grilled cheese"> grilled cheese </label>
                <label class="filter-item"><input type="checkbox" value="chicken"> chicken </label>
                <label class="filter-item"><input type="checkbox" value="burgers"> burgers </label>
                <label class="filter-item"><input type="checkbox" value="fries"> fries </label>
                <label class="filter-item"><input type="checkbox" value="dessert"> dessert </label>
            </form>
        </section>
    </aside>
    <aside class="box col-filter2">
        <h3 class="block">region</h3>
        <section class="region">
            <form action="#" method="GET">
                <label class="filter-item"><input type="checkbox" value="Asian"> asian</label>
                <label class="filter-item"><input type="checkbox" value="Middle East"> middle eastern</label>
                <label class="filter-item"><input type="checkbox" value="Western"> western</label>
                <label class="filter-item"><input type="checkbox" value="South America"> south american</label>
                <label class="filter-item"><input type="checkbox" value="European"> european</label>
                <label class="filter-item"><input type="checkbox" value="African"> african</label>    
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