<?php
    session_start();

    if(!isset($_SESSION['username'])){
        echo "You're Logged Out";
        header("location:LoginPage.php");
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
                    <li class="nav-item m-1">
                        <a href="Home.php" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item m-1">
                        <a href="Explore.php" class="nav-link">Explore</a>
                    </li>

                    <li class="nav-item dropdown m-1">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown">Help Us</a>
                        <div class="dropdown-menu bg-dark">
                            <a href="Write_an_Article.php" class="dropdown-item bg-dark text-white">Write an
                                Article</a>
                            <a href="AboutUs.php" class="dropdown-item bg-dark text-white">About Us</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown m-1">
                        <!-- <a href="Logout.html" class="nav-link text-white bg-danger px-3 d-inline-block curved-end">LOGOUT</a> -->
                        <a class="nav-link text-white bg-danger px-3 d-inline-block curved-end" data-toggle="dropdown"
                            data-target="#log"><?php echo ucwords($_SESSION['username']); ?></a>
                        <div class="dropdown-menu bg-dark" id="log">
                            <a href="Logout.php" class="dropdown-item bg-dark text-white">LOGOUT</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HOME BACKGROUND -->

    <!-- <section>

        <div class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active carousel-image">
                </div>
            </div>

    </section> -->

    <section>
        <div class="container py-3">
            <div class="row py-5">
                <div class="col-md-4 mb-2">
                    <div class="card inputcurve p-4">
                        <div class="card-body text-center">
                            <h4>We Want To Hear From You</h4>
                            <p>Want To Get In Touch? Here's How You Can Reach Us...</p>
                            <hr>
                            <h4>Address</h4>
                            <p>1001 Main st, India</p>
                            <h4>Email</h4>
                            <p>HowTo@Howto.com</p>
                            <h4>Phone</h4>
                            <p>(+91) 9234 123 421</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="card inputcurve p-4">
                            <div class="card-body">
                                <h3 class="text-center">
                                    Please fill out this form to Contact Us...
                                </h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control inputcurve" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control inputcurve" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control inputcurve" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" class="form-control inputcurve" placeholder="Contact">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" placeholder="Message"
                                                class="form-control inputcurve"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-danger btn-block inputcurve">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <div class="container-fluid bg-dark">
        <div class="row pt-2">
            <div class="col-md-4 p-2">
                <div class="p-2">
                    <p class="text-white"><b>INFORMATION</b></p>
                </div>
                <div class="p-1 ml-4">
                    <a href="Home.php" class="text-white">Home</a>
                </div>
                <div class="p-1 ml-4">
                    <a href="ContactUs.php" class="text-white"><b>Contact Us</b></a>
                </div>
                <div class="p-1 ml-4">
                    <a href="Explore.php" class="text-white">Explore</a>
                </div>
                <div class="p-1 ml-4">
                    <a href="AboutUs.php" class="text-white">About Us</a>
                </div>
                <div class="p-1 ml-4">
                    <a href="Write_an_Article.html" class="text-white">Write an Article</a>
                </div>
            </div>
            <div class="col-md-4 align-self-center">
                <div class="text-center p-3">
                    <a href="https://www.youtube.com/" class="text-white p-2"> <i class="fab fa-youtube fa-2x"></i> </a>
                    <a href="https://www.instagram.com/?hl=en" class="text-white p-2"> <i
                            class="fab fa-instagram fa-2x"></i> </a>
                    <a href="https://www.facebook.com/?hl=en" class="text-white p-2"> <i
                            class="fab fa-facebook fa-2x"></i> </a>
                    <a href="https://twitter.com/" class="text-white p-2"> <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="https://aboutme.google.com/u/0/" class="text-white p-2"><i
                            class="fab fa-google-plus-square fa-2x"></i></a>
                </div>
            </div>
            <div class="col-md-4 p-2">
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

    <!-- Year -->
    <script>
        $('#year').text(new Date().getFullYear());
    </script>
</body>

</html>