<?php
    // include "DataBaseConnection.php";

    if(isset($_POST['articlePost'])){
        date_default_timezone_set('Asia/Kolkata');
        $title = "How  to ".$_POST['articleTitle'];
        $content = $_POST['articleHere'];
        $date = date("y-m-d h:i:sa");
        $img = $_FILES["articleImage"]["name"];
        $user = $_SESSION['username'];
        if(empty($title) || empty($date) || empty($content) || empty($img)){
            header("Location: Write_an_Article.php?&title=empty&date=empty&content=empty&img=empty");
        }else{
            if(arttitle($title)){
                $insert_article = "Insert into duppost(id,title,articleImg, content, date,view,author) Values ('','$title','$img','$content ','$date','','$user')";
                $iquery = mysqli_query($con,$insert_article);
                if($iquery){
                    move_uploaded_file($_FILES['articleImage']['tmp_name'], "Database_Images/$img");
                    ?><script>console.log("Inserted");</script><?php
                }else{

                    echo $iquery;
                    ?><script>console.log("Not-Inserted");</script><?php
                    echo "problem".$iquery;
                }
            }else{
                ?><script>console.log("article title should not contain any special characters");</script><?php
                
            }
        }
    }


// <!-- number and words both -->
function arttitle($str){
          return (preg_match("/^[a-zA-Z|0-9| ]*$/",$str)) ? TRUE:FALSE;
      }

?>