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

  <!-- INCLUDE PHP FILE -->

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
          <li class="nav-item m-1">
            <a href="AdminHome.php" class="nav-link">Home</a>
          </li>

          <li class="nav-item m-1">
            <a href="AdminExplore.php" class="nav-link">Explore</a>
          </li>

          <li class="nav-item dropdown m-1">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Help Us</a>
            <div class="dropdown-menu bg-dark">
              <a href="AdminWrite_an_Article.php" class="dropdown-item bg-dark text-white">Write an Article</a>
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

  
<!-- CONTENT -->

<div class="container-fluid">
    <div class="row mx-5">
        <div class="col-lg-4">
            <div class="card m-xl-4 m-lg-4 m-md-3 m-sm-2 my-2">
                <h3 class="card-footer text-center py-3">Analysis</h3>    
                <div class="card-body m-3">
                    <?php
                        $art_post = "select id from duppost";
                        $result_post = mysqli_query($con,$art_post);
                        $all_post = 0;
                        if($result_post){
                            $all_post = mysqli_num_rows($result_post);
                            echo '<h5 class="card-title">Total Article <span class="float-right">'.$all_post.'</span></h5>
                            <hr class="w-100">';
                        }else{
                            echo "problem in query".$art_post;
                        }

                        // Views

                        $view_query = "select view from view";
                        $result_view = mysqli_query($con,$view_query);
                        if($result_view){
                            while($row = mysqli_fetch_assoc($result_view)){
                                echo '<h5 class="card-title">Total Views <span class="float-right">'.$row['view'].'</span></h5>
                                <hr class="w-100">';
                            }
                        }else{
                            echo 'query problem'.$view_query;
                        }
                    ?>


                    
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card m-xl-4 m-lg-4 m-md-3 m-sm-2 my-2">
              <h3 class="card-footer text-center py-3">All Article</h3>
              <div class="card-body m-3">
              <?php
                $allart_query = "Select * from duppost order by id desc";
                $allart_result = mysqli_query($con,$allart_query);
                if($allart_result){
                    while($row = mysqli_fetch_assoc($allart_result)){
                      $id = $row['id'];
                      $title = $row['title'];
                      $content = $row['content'];
                      $date= $row['date']; 

                      echo '<h4 class="card-title text-center">'.$title.'</h4>
                      <div class="m-5">
                        <button onclick="delete_Post('.$id.')" class="btn btn-danger mx-1">Delete</button>
                        <a href="Adminview.php?id='.$id.'" class="float-right btn btn-primary">Read</a>
                        <hr>
                      </div>';
                    }
                }else{

                }
              ?>
                  
              </div>
            </div>
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
          <a href="AdminHome.php" class="text-white"><b>Home</b></a>
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
          <a href="https://www.instagram.com/?hl=en" class="text-white p-1"> <i class="fab fa-instagram fa-2x"></i> </a>
          <a href="https://www.facebook.com/?hl=en" class="text-white p-1"> <i class="fab fa-facebook fa-2x"></i> </a>
          <a href="https://twitter.com/" class="text-white p-1"><i class="fab fa-twitter-square fa-2x"></i></a>
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
            repellat iure adipisci ullam rem similique, corporis nulla maxime sit fugiat facilis voluptate alias?</p>
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
<!-- Delete Post -->

<script src="js/jquery-3.5.1.min.js"></script>
    <script>
        // this function will execute with submit button
        function delete_Post(id){
            // sending data to 2nd file for background process
            $.post("DeletePost.php",{
                Post_id: id
            },
            // this function receives data from 2nd file
            function (data,status){
              //  confirm('Are you sure you want to delete this Post..?');
               location.href='AdminPage.php' ;
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