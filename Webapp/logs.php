<?php
    include("database.php");
    session_start();
?>
<table>
    <tr>
        <th>Log_Time</th>
        <th>Sensor1</th>
        <th>Sensor2</th>
        <th>Sensor3</th>
    </tr>
    <tr>
    <?php
        $query = "SELECT * FROM logs WHERE ID = '{$_SESSION["ID"]}' ";
        $info = mysqli_query($con,$query);

        if(mysqli_num_rows($info) > 0)
        { 
            while($results = mysqli_fetch_assoc($info))
            {
                echo "<tr><td>".$results["Log_Time"]."</td>";
                echo "<td>".$results["Sensor1"]."</td>";
                echo "<td>".$results["Sensor2"]."</td>";
                echo "<td>".$results["Sensor3"]."</td></tr>";
            }
        }
    ?>
    </tr>
</table>
<?php
    mysqli_close($con);
?>