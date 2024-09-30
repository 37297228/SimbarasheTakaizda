<?php 

    include("database.php");
    session_start();

    $query = "SELECT * FROM units WHERE ID = '{$_SESSION["ID"]}' ";
    $info = mysqli_query($con,$query);
    $results = mysqli_fetch_assoc($info);

    $disabled = array("Init"=>"disabled","Press"=>"disabled","Heat"=>"disabled","Cool"=>"disabled");//Init;Press;Heat;Cool

    if(mysqli_num_rows($info) > 0)
    { 
        if($results["Connected"])
        {
            $disabled["Init"]  = "";
            if($results["Initialization"])
            {
                $disabled["Init"] = "disabled";
                $disabled["Press"]  = "";
                if($results["Press"])
                {
                    $disabled["Heat"]  = "";
                    $disabled["Press"]  = "disabled";
                    if($results["Heating"])
                    {
                        $disabled["Cool"]  = "";
                        $disabled["Heat"]  = "disabled";
                        if($results["Cooling"])
                        {
                            $disabled["Cool"]  = "disabled";
                            // $disabled["Heat"]  = ;
                        }
                    }
                    
                }
            }
        } 
    }

    include("push.php");

    echo "<button onclick='button(0)' type='button' {$disabled["Init"]}  >Start Initialization</button>";
    echo "<button onclick='button(1)' type='button' {$disabled["Press"]} >Start Press</button>";
    echo "<button onclick='button(2)' type='button' {$disabled["Heat"]}  >Start Heating</button>";
    echo "<button onclick='button(3)' type='button' {$disabled["Cool"]}  >Start Cooling</button>";
    echo "<button onclick='button(4)' type='button'>Stop</button>";
?> 