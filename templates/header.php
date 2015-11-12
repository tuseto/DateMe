<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <link rel="shortcut icon" href="./logos/favicon.ico">
    </head>
    <body>
        <div id="navigation">

            <span class="button"><a class="menu" href="?home">Home</a></span>
            <span class="button"><a class="menu" href="?viewprofile">View Profile</a></span>
            <span ><img src=./logos/Logo.png height="45" class="logo"></span>
            <span class="button"><a class="menu" href="?dateslist">Dates List</a></span>
            <span class="button"><a class="menu" href="">Chat</a></span>

        </div>
        

            <?php
            if (isset($_SESSION['username']) && $_SESSION['username'] != NULL) {
                echo '<span class=asd><span class=logout>'.$_SESSION['username'] . '</span> <a class=logout href="?logout">Logout</a></span>';
            }
            else {
                echo '<span class=asd><a class=loginregister href="?register">Register</a>
            <a class=loginregister href="?login">Login</a></span>';
            }
            ?>
