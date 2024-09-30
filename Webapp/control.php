<?php
    include("database.php");
    session_start();

    include("header.html");
?>
<body onload="item();">
    <h2>Control panel</h2>
    <script type="text/javascript">
        function item(item,file)
        {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function()
            {
                document.getElementById(item).innerHTML = this.responseText;
            }
            xhttp.open("GET",file,true);
            xhttp.send();
        }
        function button(bnum = 9)
        {
            var xmlhttp = new XMLHttpRequest();
            var url = 'push.php?btn=' + bnum;
            // window.alert(url);
            xmlhttp.onreadystatechange = function() 
            {
                if (this.readyState == 4 && this.status == 200) 
                {
                    item("buttons","buttons.php");
                }
            }
            xmlhttp.open("GET",url,true);
            xmlhttp.send();
        }
    </script>
    <p>
        <script type="text/javascript">

            setInterval(function(){item("utable","units.php");},1);

        </script>
                <div id = "utable">

                </div>
    </p>

    <p>
        <script type="text/javascript">


            item("buttons","buttons.php");  

        </script>
        <div id = "buttons">

        </div>
    </p>
    <p>
        <script type="text/javascript">

            setInterval(function(){item("ltable","logs.php");},1);

        </script>
        <div id = "ltable">

        </div>
    </p>
    
</body>

<?php
    include("footer.html");
    mysqli_close($con);
?>