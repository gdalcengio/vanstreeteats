<?php
    //function to open connection to database
    function openConnection(&$connection) {
        //open the connection to the database
        $connection = mysqli_connect("localhost", "root", "", "gabriele_dalcengio"); 

        // Test if connection succeeded 
        if(mysqli_connect_errno()) { 
            // if connection failed, skip the rest of PHP code, and print an error 
            die("Database connection failed: " . 
                mysqli_connect_error() . 
                " (" . mysqli_connect_errno() . ")" 
                ); 
        } 
    }
    
    
    //function to perform the query to the table
    function performQuery(&$connection, &$result, $queryToPerform) {
        //Perform database query
        $result = mysqli_query($connection, $queryToPerform);

        //Test if there was a query error 
        if (!$result) { 
            die("Database query failed."); 
        } 
    }


    //function to select the right listing for content.php
    function getListing(&$connection, &$result) {
        $query = "SELECT * FROM vendors WHERE id=\"".$_GET["id"]."\";";
        // echo $query;

        performQuery($connection, $result, $query);   //now perform the query
    }

    function getReviews(&$connection, &$reviewResult) {
        $query = "SELECT reviewed.username, reviews.text, reviews.stars, reviews.date FROM reviews INNER JOIN reviewed ON reviews.rid = reviewed.rid INNER JOIN hasreview ON reviewed.rid = hasreview.rid WHERE hasreview.id = ".$_GET["id"].";";
        // echo $query;

        performQuery($connection, $reviewResult, $query);   //now perform the query
    }

    //function to select the right listing for profile.php
    function getUser(&$connection, &$result) {
        $query = "SELECT * FROM users WHERE username=\"".$_SESSION["set_user"]."\";";   //primary key so only returns one user
        // echo $query;

        performQuery($connection, $result, $query);   //now perform the query
    }

    //prints out each row of information into a list in listings.php
    function printRows(&$result) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<article class=\"box card\">";
                echo "<a href=\"content.php?id=".$row['id']."\" class=\"card-link\">".$row['id'];
                    echo "<p class=\"vendor-name\">".$row['name']."</p>";
                    echo "<p class=\"location\">".$row['location']."</p>";
                    echo "<div class=\"star-container\">";
                        for($i=0; $i<5; $i++){
                            if ($i<$row["rating"]) {
                                echo "<img src=\"img/star.png\" alt=\"filled star\">";
                            } else {
                                echo "<img src=\"img/star0.png\" alt=\"empty star\">";
                            }
                        }
                    echo "</div>";
                echo "</article>";
            echo "</a>";
        }
    }
    
    
    //function to close the connection to the database
    function closeConnection(&$connection, &$result) {
        //Release returned data 
        @mysqli_free_result($result);
        //Close database connection 
        mysqli_close($connection); 
    }
    
?>