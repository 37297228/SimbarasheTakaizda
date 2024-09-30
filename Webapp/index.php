<?php
    include("database.php");
    include("header.html");

    session_start();
?>
<body>
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <label>Device ID: </label><br>
        <input type="text" name="ID">
        <input type="submit" value="Ok">
    </form>
</body>


<?php
    include("footer.html");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $id = $_POST["ID"];

        $unit = mysqli_query($con,"SELECT ID FROM units WHERE ID = '$id'");

        if (mysqli_num_rows($unit) > 0)
        {
            $_SESSION["ID"] = $id;

            header("Location: control.php");
        }
        else
        {
            echo "No matching unit found";
        }
        
    }

    mysqli_close($con);
?>