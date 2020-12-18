<?php
    include "DataBaseConnection.php";
    if(isset($_POST['Post_id'])){
            $Delete_Post = 'DELETE from duppost where id="'.$_POST['Post_id'].'"';
            $DeletePost = mysqli_query($con, $Delete_Post);
            if($DeletePost){
                
            }else{

                ?>
                    <script>console.log("problem in delete query");</script>
                <?php
            }

    }else{
        ?>
            <script>console.log("variable didnt passed");</script>
        <?php
    }
?>