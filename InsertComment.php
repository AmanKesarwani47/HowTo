<?php

    include "DataBaseConnection.php";
    if(isset($_POST['user_name']) && isset($_POST['text']) && isset($_POST['post_id'])){
        date_default_timezone_set('Asia/Kolkata');
        $date = date("y-m-d h:i:sa");
        // check whether the boxes have some text or not
        if(empty($_POST['user_name']) && empty($_POST['text'])){
            echo "please fill all the details";
        }else{
            $comment_query = 'INSERT INTO comments(id, post_id, Username, text, date) VALUES ("","'.$_POST['post_id'].'","'.$_POST['user_name'].'","'.$_POST['text'].'","'.$date.'")';
            $commentresult = mysqli_query($con, $comment_query);
            if($commentresult){
                // show comment
                echo '<div class="card-title p-2">'.$_POST['user_name'].'<small class="text-muted"> '.$date.'</small></div>
                    <div class="card-text p-2">
                        <p>'.$_POST['text'].'</p>
                    </div>
                    <hr class=" text-center bg-secondary">';
            }else{
                echo "problem in insert query".$comment_query;
            }

        }
    }else{
        echo 'variable didnt passed';
    }

?>