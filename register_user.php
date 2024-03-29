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
        //open up connection to user table
        openConnection($connection);

        //setting up variables and initializing them to receive the data from the form submitted
        $user = $_POST["user"];
        $passHashed = sha1($_POST["pass"]);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $ethnic = $_POST["ePref"];
        $type = $_POST["fPref"];

        //creates query and performs it
        registerUser($connection, $result, $user, $passHashed, $name, $email, $ethnic, $type);

        // //creating and initializing the string variable that stores the information into the txt file, ending with an end of line character \n
        // $info = $name." ".$user." ".$pass." ".$email."\n";
        // //writes the info variable into the next line of the txt file
        // fwrite($file, $info);
        // //close the file so nothing bad happens
        // fclose($file);	

        //confirmation message displaying the name of the newly registered user
        echo "<div class=\"centered\"<p>Thanks for registering</p>".$_POST['name']."</div>";
        closeConnection($connection, $result);
    ?>
</body>
</html>







<!-- functions -->
<?php    
    
    //function to register user calling the function to perform query
    function registerUser(&$connection, &$result, $username, $password, $fullname, $email, $e_pref, $f_pref) {
        // $insertQuery = addslashes("INSERT INTO users (username, pass, fullname, email, e_pref, f_pref) VALUES('.$username.','.$password.','.$fullname.','.$email.','.$e_pref.','.$f_pref.');");
        $insertQuery = "INSERT INTO users (username, pass, fullname, email, e_pref, f_pref) VALUES('$username', '$password', '$fullname', '$email', '$e_pref', '$f_pref');";

        // echo $insertQuery;   for debugging and figuring out what insert queries require
        
        performQuery($connection, $result, $insertQuery);   //now perform the query
    }
    
?>