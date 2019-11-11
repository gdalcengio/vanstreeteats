<?php 
session_start(); 
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
        include("header.php");
        include("navmenu.php");
	?>
    </header>

    <!--main content section-->
    <!-- <h2 class="heading">Main Content</h2> -->
    <div class="spacer"></div>
    <section class="centered">
        <form action="" method="post">
            <h2>Log In</h2>

            <div class="form-input">
                <!-- username -->
                <label for="user">username:</label>
                <input type="text" name="user" placeholder="john111" required>
            </div>
            <div class="form-input">
                <!-- password -->
                <label for="pass">password:</label>
                <input type="password" name="pass" placeholder="*****" required>
            </div>

            <input type="submit">
    </section>

    <?php
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            $connection;
            $result;
            openConnection($connection);
            
            //returns true if there is a user with the same name and hashed password in the users table
            if (userRegistered($connection, $result, $_POST["user"], $_POST["pass"])){
                //set user
                $_SESSION["set_user"] = $_POST["user"];
                // echo "worked";
            } else {
                //return an error message later gabe
                echo "can't find";
            }

            closeConnection($connection, $result);
            
            header('Location: login_successful.php');
        }
    ?>
</body>
</html>







<!-- functions -->
<?php  
    
    //function to perform the query to the table
    function performQueryIsTrue(&$connection, &$result, $queryToPerform) {
        //Perform database query
        $result = mysqli_query($connection, $queryToPerform);

        //Test if there was a query error 
        if (!$result) { 
            die("Database query failed."); 
        } 

        $row = mysqli_fetch_row($result);
        if ($row) {     //if it returned any rows at all
            return true;
        } else {
            return false;
        }
    }


    //function to register user calling the function to perform query
    function userRegistered(&$connection, &$result, $username, $password) {
        $pass = sha1($password);
        $query = "SELECT * FROM users WHERE username = '".$username."' AND pass = '".$pass."';";
        // echo $query;

        return performQueryIsTrue($connection, $result, $query);   //now perform the query
    }
    
?>