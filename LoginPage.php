<?php
    session_start();
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
  <style>
        .bgform {
            background-position: center;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("Login-Background-Images/Background-image-1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>
<?php
        include "DataBaseConnection.php";
        // include "SignupPhp.php";
        include "LoginPhp.php";
    ?>
    

    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
      <a href="LoginPage.php" class="navbar-brand text-white bg-danger d-inline px-3 curved-end">HowTo <i
          class="fa fa-question"></i></a>

      <button class="navbar-toggler" data-target="#collapseNavbar" data-toggle="collapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="collapseNavbar">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item m-1 active pl-1">
            <a href="LoginPage.php" class="nav-link">LOGIN</a>
          </li>

          <li class="nav-item m-1">
            <a href="AdminLoginPage.php" class="nav-link">ADMIN</a>
          </li>
          
          <li class="nav-item m-1">
            <a href="SignupPage.php" class="nav-link">SIGNUP</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>


  <!-- LOGIN -->

  <div class="container-fluid bgform">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-2 col-xs-12"></div>
            <div class="col-lg-4 col-md-6 col-sm-8 col-xs-12">
                <div style="background-image: url(Login-Background-Images/Background-image-2.jpg); background-size: cover; box-shadow: 0px 0px 10px 2px; border-radius: 25px; margin-top: 15vh;">
                    <div class=" text-white pt-5 text-center">
                        <h5>Welcome to <label class="bg-danger curved-end d-inline py-2 px-3">HowTo</label></h5>
                    </div>
                
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="padding: 10px 50px;">
                        <div class="form-group">
                            <label for="Email"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;Email</label>
                            <input type="email" style="border-radius: 15px;" placeholder="Email" name="email" class="form-control ">
                            <?php
                                if(isset($_GET['email'])){
                                    if($_GET['email'] === 'empty'){
                                        echo "<p class = 'text-danger '> Email is Empty</p>";
                                    }
                                    elseif($_GET['email'] === 'wrongemail'){
                                        echo "<p class = 'text-danger '> Not A Valid Email Address</p>";
                                    }
                                    elseif($_GET['email'] === 'notfound'){
                                        echo "<p class = 'text-danger '> Email Not Found. Please Signup</p>";
                                    }
                                }
                                                        
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="Password"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Password</label>
                            <input type="password" style="border-radius: 15px;" name="password" placeholder="Password" class="form-control">
                            <?php
                                if(isset($_GET['password'])){
                                    if($_GET['password'] === 'empty'){
                                        echo "<p class = 'text-danger '>Password Is Empty</p>";
                                    }
                                    elseif($_GET['password'] === 'incorrect'){
                                        echo "<p class = 'text-danger '>Not A Valid Password</p>";
                                    }
                                    elseif($_GET['password'] === 'pd_char8'){
                                        echo "<p class = 'text-danger '>Password length should be between 1-8 and only Numbers are allowed</p>";
                                    }
                                }
                                                        
                            ?>
                        </div>
                        <h6 class="text-center"><a href="ForgotPasswordPage.php">Forgot Password?</a> </h6>
                        <div class="form-group text-center">
                            <button class="btn btn-danger curved-end px-5 py-2" type="submit" name="logsubmit">LOGIN</button>
                        </div>
                        <div>
                            <h6 class="px-3">Already have an account? <a href="SignupPage.php">SIGNUP HERE</a> </h6>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-2 col-xs-12"></div>
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