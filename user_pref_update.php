<?php 
require_once("functions.php")
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
    <?php
        $connection;
        $result;

        openConnection($connection);
        getUser($connection, $result);
        $user = mysqli_fetch_array($result);

        editUser($connection, $result, $user);

        //confirmation message displaying the name of the newly registered user
        echo "<div class=\"centered\"<p>Thanks for registering</p>".$_POST['name']."</div>";
        closeConnection($connection, $result);
    ?>
</body>
</html>







<!-- functions -->
<?php
    
    
    //function to register user calling the function to perform query
    function editUser(&$connection, &$result, &$user) {
        $updateQuery = "UPDATE users SET fullname = \"".$_POST["name"]."\", email = \"".$_POST["email"]."\", e_pref = \"".$_POST["ePref"]."\", f_pref = \"".$_POST["fPref"]."\" WHERE username = \"".$user["username"]."\";";

        // echo $updateQuery;   for debugging and figuring out what insert queries require
        
        performQuery($connection, $result, $updateQuery);   //now perform the query
    }
    
?>