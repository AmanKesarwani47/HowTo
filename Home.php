<?php
    session_start();

    if(!isset($_SESSION['username'])){
        echo "You're Logged Out";
        header("location:LoginPage.php");
    }
    include "DataBaseConnection.php";
    // Visting this page will add +1 to view
    $view_query = "select view from view";
    $result_addview = mysqli_query($con,$view_query);
    if($result_addview){
      $row = mysqli_fetch_assoc($result_addview);
      $view_add = $row['view'] + 1;

      // update view in table

      $view_update = 'Update view set view="'.$view_add.'"';
      $result_viewupdate = mysqli_query($con,$view_update);
      if($result_viewupdate){
?>
<script>console.log("view inserted");</script>
<?php
      }else{
        ?>
<script>console.log("Problem in query");</script>
        <?php
      }
    }else{
      ?>
      <script>console.log("Problem in query");</script>
              <?php
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
      <a href="Home.php" class="navbar-brand text-white bg-danger d-inline px-3 curved-end">HowTo <i
          class="fa fa-question"></i></a>

      <button class="navbar-toggler" data-target="#collapseNavbar" data-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="collapseNavbar">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item m-1 active pl-1">
            <a href="Home.php" class="nav-link">Home</a>
          </li>

          <li class="nav-item m-1">
            <a href="Explore.php" class="nav-link">Explore</a>
          </li>

          <li class="nav-item dropdown m-1">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Help Us</a>
            <div class="dropdown-menu bg-dark">
              <a href="Write_an_Article.php" class="dropdown-item bg-dark text-white">Write an Article</a>
              <a href="AboutUs.php" class="dropdown-item bg-dark text-white">About Us</a>
            </div>
          </li>

          <li class="nav-item dropdown m-1">
            <!-- <a href="Logout.html" class="nav-link text-white bg-danger px-3 d-inline-block curved-end">LOGOUT</a> -->
            <a class="nav-link text-white bg-danger px-3 d-inline-block curved-end" data-toggle="dropdown" data-target="#log"><?php echo ucwords($_SESSION['username']); ?></a>
            <div class="dropdown-menu bg-dark" id="log">
              <a href="Logout.php" class="dropdown-item bg-dark text-white">LOGOUT</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HOME BACKGROUND -->

  <section>

    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active carousel-image shadow">
          <!-- <img src="../Background-Images/Background-image-1.jpg" alt="" class="img-fluid"> -->
        </div>
      </div>

  </section>

  <!----------------------------->
  <!-- CONTENT -->
  <!----------------------------->

  <!-- 1.CARD -->
  <div class="container-fluid">
    <div class="row mx-5">
    <div class="col-lg-4">
            <div class="m-4">
              <form action="">
              <div class="input-group">
            <input type="text" class="form-control form-control-lg" placeholder="Search Anything...">
            <div class="input-group-append">
              <a href="#" class="btn btn-primary btn-lg">Search</a>
            </div>
          </div>
              </form>
            </div>
            <div class="card sticky-top m-4 d-none d-lg-block">
              <h3 class="card-footer">Trending Post</h3>
              <div class="card-body">

                <?php
                  $trend_query = 'select * from duppost order by view DESC limit 5';
                  $trend_result = mysqli_query($con,$trend_query);
                  if(mysqli_num_rows($trend_result)>0){
                    while($row = mysqli_fetch_assoc($trend_result)){
                      echo '<h5 class="card-text"><a href="ShowContent.php?id='.$row['id'].'">'.$row['title'].'</a></h5><hr>';
                    }
                  }else{
                    echo '<div class="alert alert-warning alert-dismissible fade show m-2" role="alert"><p><strong>No Trending Post </strong>Available</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                  }
                ?>
              </div>
            </div>
      </div>
      <div class="col-lg-8">
      <?php
            $postquery = "select * from duppost order by id desc";
            $query = mysqli_query($con,$postquery);
            if($query){
              if(mysqli_num_rows($query)>0){ //checking available post
                while($row = mysqli_fetch_assoc($query)){
                  $id = $row['id'];
                  $title = $row['title'];
                  $content = $row['content'];
                  $date= $row['date'];
                  $img = $row['articleImg'];

                  echo '<div class="card text-center m-xl-4 m-lg-4 m-md-3 m-sm-2 my-2">
                  <div class="card-img-top text-center">
                      <img src="Database_Images/'.$img.'" alt="" class="img-fluid rounded w-50 shadow my-4">
                    </div>
                  <div class="card-body m-3">
                    <h5 class="card-title">'.ucwords($title).'</h5>
                    
                    <p class="card-text"><small class="text-muted"><i class="far fa-calendar"></i>&nbsp;&nbsp;'.$date.'</small></p>
                      <a href="ShowContent.php?id='.$id.'" class="btn btn-primary btn-lg text-white">Read More</a>
                  </div>
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
              // <div class="card-text mb-5 ">
              // <span class="truncate">'.$content.'</span>
              // </div>
                }
              }else{
                echo '<div class="alert alert-warning alert-dismissible fade show m-2" role="alert"><p><strong>No Post </strong>Available</p><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
              }
            }else{
              echo "Problem in query";
            }
          ?>
<!-- CODE -->

      </div>
      
    </div>
  </div>

<!-- CODE -->
  <!-- FOOTER -->
  <div class="container-fluid bg-dark">
    <div class="row pt-2">
      <div class="col-lg-4 col-md-4 p-2">
        <div class="p-2">
          <p class="text-white"><b>INFORMATION</b></p>
        </div>
        <div class="p-1 ml-4">
          <a href="Home.php" class="text-white"><b>Home</b></a>
        </div>
        <div class="p-1 ml-4">
          <a href="ContactUs.php" class="text-white">Contact Us</a>
        </div>
        <div class="p-1 ml-4">
          <a href="Explore.php" class="text-white">Explore</a>
        </div>
        <div class="p-1 ml-4">
          <a href="AboutUs.php" class="text-white">About Us</a>
        </div>
        <div class="p-1 ml-4">
          <a href="Write_an_Article.php" class="text-white">Write an Article</a>
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

  <!-- Year -->
  <script>
    $('#year').text(new Date().getFullYear());
  </script>
</body>

</html>