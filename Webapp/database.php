<?php
    $db_server = "webappdb.cv64k42qa1sq.af-south-1.rds.amazonaws.com";
    $db_user   = "webapp";
    $db_pass   = "AppPass123";
    $db_name   = "potpressdb";
    // $con       = "";

    try
    {
        $con = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    }
    catch(mysqli_sql_exception)
    {
        echo "Failed to connect<br>";
    }

?>