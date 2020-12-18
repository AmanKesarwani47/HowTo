<?php
    include "DataBaseConnection.php";
    if(isset($_POST['comment_id'])){
            $Delete_comment = 'DELETE from comments where id="'.$_POST['comment_id'].'"';
            $Deleteresult = mysqli_query($con, $Delete_comment);
            if($Deleteresult){
                
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