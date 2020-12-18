<?php
    $con = mysqli_connect("localhost", "root" ,"","dupblog");
    if($con){
        ?>
        <script>
            console.log("Welcome to How To...");
        </script>
        <?php
    }else{
        ?>
        <script>
            console.log("No connection");
        </script>
        <?php
    }
?>