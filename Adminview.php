<?php
    session_start();

    if(!isset($_SESSION['admin'])){
        echo "You're Logged Out";
        header("location:AdminLoginPage.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!--     Bootstrap     -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous" />

    <!--    Font Awesome     -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />

    <!--    CSS File     -->

    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>How to do Anything...</title>
</head>

<body>

    <?php
        include "DataBaseConnection.php";
    ?>

    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="AdminHome.php" class="navbar-brand text-white bg-danger d-inline px-3 curved-end">HowTo <i
                    class="fa fa-question"></i></a>

            <button class="navbar-toggler" data-target="#collapseNavbar" data-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapseNavbar">


                <ul class="navbar-nav ml-auto">
                    <li class="nav-item m-1 ">
                        <a href="AdminHome.php" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item m-1">
                        <a href="AdminExplore.php" class="nav-link">Explore</a>
                    </li>

                    <li class="nav-item dropdown m-1">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Help Us</a>
                        <div class="dropdown-menu bg-dark">
                            <a href="AdminWrite_an_Article.php" class="dropdown-item bg-dark text-white">Write an
                                Article</a>
                            <!-- <a href="AboutUs.php" class="dropdown-item bg-dark text-white">About Us</a> -->
                        </div>
                    </li>

                    

                    <li class="nav-item dropdown m-1">
             <!-- <a href="Logout.html" class="nav-link text-white bg-danger px-3 d-inline-block curved-end">LOGOUT</a> -->
             <a class="nav-link text-white bg-danger px-3 d-inline-block curved-end" data-toggle="dropdown" data-target="#log"><?php echo ucwords($_SESSION['admin']); ?></a>
            <div class="dropdown-menu bg-dark" id="log">
            <a href="AdminPage.php" class="dropdown-item bg-dark text-white">Admin Panel</a>
              <a href="Logout.php" class="dropdown-item bg-dark text-white">LOGOUT</a>
            </div>
          </li>
                </ul>
            </div>
        </div>
    </nav>

    <!------------ CONTENT ------------>

    <!-- 1.CARD -->
    <div class="container-fluid">
        <div class="row mx-5">
            <div class="col-md-8">


                <?php
                $id = $_GET['id'];
            $postquery = "select * from duppost where id ='$id'";
            $query = mysqli_query($con,$postquery);
            if($query){
              if(mysqli_num_rows($query)>0){ //checking available post
                while($row = mysqli_fetch_assoc($query)){
                  $id = $row['id'];
                  $title = $row['title'];
                  $content = $row['content'];
                  $date= $row['date'];
                  $img = $row['articleImg'];
                  $view = $row['view'];
                  $author = $row['author'];

                  echo '<div class="p-3">
                  <h1 class="text-center font-weight-normal">'.$title.'</h1>
              </div>
              <div class="p-2 ml-5">
                  <h6 class="text-muted"><i class="far fa-calendar"></i> '.$date.'</h6>
              </div>
              <div class="m-2 text-center">
                    <img src="Database_Images/'.$img.'" alt="" class="img-fluid rounded w-75 shadow my-4">
                </div> 
              <div class="m-5">
                  <h5 class="font-weight-normal" style="line-height:30px;">'.$content.'</h5>
              </div>';





                  // echo '<h5 class="card-title">'.$title.'</h5>';
                  // echo '<h6 class="card-subtitle mb-2 text-muted">'.$date.'</h6>';
                // --------------------Image---------------------------
                  //   echo '<div class="text-center">
                //   <img src="Background-Images/Card-1.jpg" alt="" class="img-fluid rounded w-75 h-75 shadow my-4">
                // </div>';
                // -----------------------IMAGE --------------------------------
              //   echo '<p class="card-text mb-5">'.$content.'</p>';
              //   echo '<div class="float-right">
              //   <a href="" class="btn btn-primary text-white">Read More</a>
              // </div>';
                }
              }else{
                header("Location: AdminHome.php");
              }
            }else{
              echo "Problem in query";
            }
          ?>


                <!-- Content -->
                

            </div>
            <div class="col-md-4">
                <!-- Views -->
                <div class="card m-xl-4 m-lg-4 m-md-3 m-sm-2 my-2">
                <h3 class="card-footer">About This Article</h3>
                    <div class="card-body m-3">
                        <h5 class="card-text"><i class="fas fa-eye"></i>&nbsp;<span class="float-right
                        "><?php echo $view;?></span> </h5>
                        <hr>
                        <h5 class="card-text"><i class="fas fa-calendar"></i><span class="float-right"><?php echo $date;?></span> </h5>
                        <hr>
                        <h5 class="card-text"><i class="fas fa-user-tie"></i><span class="float-right"><?php echo ucwords($author);?></span> </h5>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col">
            <hr/ class="text-muted w-75">    
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                    
                        <div class="m-xl-4 m-lg-4 m-md-3 m-sm-2 my-2">
                            <div class="card-body m-3">
                                <h2> Comments </h2>
                                <hr/>
                                <div id="comment_area">
                                <?php

                                $comment_query = "select id,username,text,date from comments where post_id=".$_GET['id'];
                                $show_comment = mysqli_query($con,$comment_query);
                                if($show_comment){
                                    if(mysqli_num_rows($show_comment) > 0){
                                        while($commentrow = mysqli_fetch_assoc($show_comment)){
                                            $id = $commentrow['id'];
                                            $username = $commentrow['username'];
                                            $text = $commentrow['text'];
                                            $date = $commentrow['date'];

                                            echo '<div class="card-title p-2 h5">'.ucwords($username).'<small class="text-muted"> '.$date.'</small></div>
                                            <div class="card-text p-2">
                                                <p>'.$text.'</p>
                                            </div>
                                            <button onclick="delete_comment('.$id.')" class="btn btn-danger">Delete</button>
                                            <hr class=" text-center bg-secondary">';
                                        }
                                    }else{
                                        echo '<div class="card-text p-2">
                                        <p> No comments to this post. </p>
                                    </div>';
                                    }
                                }else{
                                    echo $comment_query."problem in query";
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        
                    
                </div>
            <div class="col-md-2">
            
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container-fluid bg-dark">
        <div class="row pt-2">
            <div class="col-lg-4 col-md-4 p-2">
                <div class="p-2">
                    <p class="text-white"><b>INFORMATION</b></p>
                </div>
                <div class="p-1 ml-4">
                    <a href="AdminHome.html" class="text-white"><b>Home</b></a>
                </div>
                <div class="p-1 ml-4">
                    <a href="AdminContactUs.php" class="text-white">Contact Us</a>
                </div>
                <div class="p-1 ml-4">
                    <a href="AdminExplore.php" class="text-white">Explore</a>
                </div>
                <!-- <div class="p-1 ml-4">
                    <a href="AboutUs.php" class="text-white">About Us</a>
                </div> -->
                <div class="p-1 ml-4">
                    <a href="AdminWrite_an_Article.php" class="text-white">Write an Article</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-5 align-self-center">
                <div class="text-center p-3">
                    <a href="https://www.youtube.com/" class="text-white p-1"> <i class="fab fa-youtube fa-2x"></i> </a>
                    <a href="https://www.instagram.com/?hl=en" class="text-white p-1"> <i
                            class="fab fa-instagram fa-2x"></i> </a>
                    <a href="https://www.facebook.com/?hl=en" class="text-white p-1"> <i
                            class="fab fa-facebook fa-2x"></i> </a>
                    <a href="https://twitter.com/" class="text-white p-1"><i
                            class="fab fa-twitter-square fa-2x"></i></a>
                    <a href="https://aboutme.google.com/u/0/" class="text-white p-1"><i
                            class="fab fa-google-plus-square fa-2x"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 p-2">
                <div class="p-2">
                    <p class="text-white"><b>HowTo</b></p>
                </div>
                <div class="px-3 text-white">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur tempora vitae
                        repellat iure adipisci ullam rem similique, corporis nulla maxime sit fugiat facilis voluptate
                        alias?</p>
                </div>
            </div>
        </div>
        <div class="row text-white p-2">
            <div class="col text-center">
                <p>Copyright &copy; <span id="year"></span> by HowTo. All rights reserved.</p>
                <!-- <h5><span>&copy;</span>Copyright</h5> -->
            </div>
        </div>
    </div>

    <!--  Javascript and JQuery files  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

<!-- Delete comment -->

<script src="js/jquery-3.5.1.min.js"></script>
    <script>
        
        function delete_comment(id){
            $.post("DeleteComment.php",{
                comment_id: id
            },
            function (data,status){
               confirm('Are you sure you want to delete this comment..?');
               location.href='Adminview.php?id=<?php echo $_GET['id']; ?>';
            }

            );
        }

    </script>
<!-- Year -->
    <script>
        $('#year').text(new Date().getFullYear());
    </script>
</body>

</html>