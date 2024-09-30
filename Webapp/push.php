<?php

    function sqlQuery($Init, $Press, $Heat, $Cool,$con)
    {
        $query = "UPDATE units SET $Init $Press $Heat $Cool WHERE ID = '{$_SESSION["ID"]}' ";
        $info = mysqli_query($con,$query);
    }

    include("database.php");

    if (!isset($_SESSION))
    {
        session_start();
    }

    $Init  = "";
    $Press = "";
    $Heat  = "";
    $Cool  = "";

    $btnId = 99;

    if(isset($_GET["btn"]))
    {
        $btnId = $_GET["btn"];
        echo "<script>alert('set')</script>";
    }
    
    

    switch($btnId)
    {
        case 0:
            $Init  = "Initialization = '1' ";
            sqlQuery($Init, $Press, $Heat, $Cool,$con);
        break;
        case 1:
            $Init  = "Press = '1' ";
            sqlQuery($Init, $Press, $Heat, $Cool,$con);
        break;
        case 2:
            $Init  = "Heating = '1' ";
            sqlQuery($Init, $Press, $Heat, $Cool,$con);
        break;
        case 3:
            $Init  = "Cooling = '1' ";
            sqlQuery($Init, $Press, $Heat, $Cool,$con);
        break;
        case 4:
            $Init = "Operation = 'OFF', Initialization = '0', Press = '0', Heating =	'0', Cooling = '0' ";
            sqlQuery($Init, $Press, $Heat, $Cool,$con);
        break;
        default:

        break;
    }

    
    

    mysqli_close($con);
?>