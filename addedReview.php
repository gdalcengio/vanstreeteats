<?php require_once("functions.php");?>

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

        $connection;
        $result;

        openConnection($connection);

        //setting up variables and initializing them to receive the data from the form submitted
        $review = $_POST["reviewText"];
        $name = $_SESSION["set_user"];
        $stars = $_POST["stars"];

        //creates query and performs it
        addReview($connection, $result, $review, $name, $stars);

        // //creating and initializing the string variable that stores the information into the txt file, ending with an end of line character \n
        // $info = $name." ".$user." ".$pass." ".$email."\n";
        // //writes the info variable into the next line of the txt file
        // fwrite($file, $info);
        // //close the file so nothing bad happens
        // fclose($file);	

        //confirmation message displaying the name of the newly registered user
        echo "<div class=\"centered\"<p>Thanks for registering</p>".$_SESSION['set_user']."</div>";
        closeConnection($connection, $result);
	?>
    </header>

    <div class="spacer"></div>
            
    <p class="centered">thanks for the review!</p>;

</body>
</html>

<?php 
    //function to register user calling the function to perform query
    function addReview(&$connection, &$result, $reviewText, $name, $stars) {
        // $insertQuery = addslashes("INSERT INTO users (username, pass, fullname, email, e_pref, f_pref) VALUES('.$username.','.$password.','.$fullname.','.$email.','.$e_pref.','.$f_pref.');");
        $insertQuery = "INSERT INTO reviews (text, stars) VALUES('$reviewText', '$stars');";
        performQuery($connection, $result, $insertQuery);   //now perform the query

        $returnQuery = "SELECT rid FROM reviews ORDER BY rid DESC";
        performQuery($connection, $result, $returnQuery);   //returns the rid
        $row = mysqli_fetch_array($result);
        $rid = $row["rid"];
        $id = $_GET["id"];
        echo $rid;
        echo $id;

        $secondQuery = "INSERT INTO reviewed (username, rid) VALUES(\"".$name."\", \"".$rid."\");";      
        performQuery($connection, $result, $secondQuery);   //now perform the query
        $insertQuery = "INSERT INTO hasreview (id, rid) VALUES('$id', '$rid')";
        performQuery($connection, $result, $insertQuery);   //now perform the query
        // $updateQuery = "UPDATE reviews SET stars = $rid WHERE ;";    //intended to update stars, will finish in next release
        // performQuery($connection, $result, $insertQuery);   //now perform the query
    }
?>