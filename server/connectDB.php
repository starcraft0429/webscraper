<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "scrap";

    // Create connection
    $link = mysql_connect($servername, $username, $password);
    if (!$link) {
        die('Could not connect: ' . mysql_error());
    }
    $db_selected = mysql_select_db($dbname, $link);
    if (!$db_selected) {
        die ('Can\'t use database "scrap" : ' . mysql_error());
    }
    
?>

