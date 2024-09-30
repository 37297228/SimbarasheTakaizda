<?php
    include("database.php");
    session_start();
?>
    <table>
        <tr>
            <th>Id</th>
            <th>Connected</th>
            <th>Operation</th>
            <th>Initialization</th>
            <th>Press</th>
            <th>Heating</th>
            <th>Cooling</th>
        </tr>
        <tr>
        <?php
            $query = "SELECT * FROM units WHERE ID = '{$_SESSION["ID"]}' ";
            $info = mysqli_query($con,$query);

            if(mysqli_num_rows($info) > 0)
            { 
                while($results = mysqli_fetch_assoc($info))
                {
                    echo "<tr><td>".$results["ID"]."</td>";
                    echo "<td>".$results["Connected"]."</td>";
                    echo "<td>".$results["Operation"]."</td>";
                    echo "<td>".$results["Initialization"]."</td>";
                    echo "<td>".$results["Press"]."</td>";
                    echo "<td>".$results["Heating"]."</td>";
                    echo "<td>".$results["Cooling"]."</td></tr>";
                }
            }
        ?>
        </tr>
    </table>
<?php
    mysqli_close($con);
?>