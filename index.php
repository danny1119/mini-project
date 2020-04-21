<!DOCTYPE html>
<html>
<?php
session_start();
require 'connection.php';
$conn = Connect();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarX Rental</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation" style="color: black">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                   CarX RENTAL </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                if(isset($_SESSION['login_client'])){
            ?>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="entercar.php">Add Car</a></li>
              <li> <a href="enterdriver.php"> Add Driver</a></li>
              <li> <a href="clientview.php">View</a></li>

            </ul>
            </li>
          </ul>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>

            <?php
                }
                else if (isset($_SESSION['login_customer'])){
            ?>
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_customer']; ?></a>
                    </li>
                    <ul class="nav navbar-nav">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Garagge <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="prereturncar.php">Return Now</a></li>
              <li> <a href="mybookings.php"> My Bookings</a></li>
            </ul>
            </li>
          </ul>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>

            <?php
            }
                else {
            ?>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="clientlogin.php">Admin</a>
                    </li>
                    <li>
                        <a href="customerlogin.php">Customer</a>
                    </li>
                    <li>
                        <a href="faq/index.php"> FAQ </a>
                    </li>
                </ul>
            </div>
                <?php   }
                ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="bgimg-1">
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading" style="color: white">CARX RENTAL</h1>
                            <p class="intro-text">
                                Online car rental service
                            </p>
                            <a href="#sec2" class="btn btn-circle page-scroll blink">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Currently Available Cars</h3>
<br>
        <section class="menu-content">
            <?php
            $sql1 = "SELECT * FROM cars WHERE car_availability='yes'";
            $result1 = mysqli_query($conn,$sql1);

            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $ac_price = $row1["ac_price"];
                    $ac_price_per_day = $row1["ac_price_per_day"];
                    $non_ac_price = $row1["non_ac_price"];
                    $non_ac_price_per_day = $row1["non_ac_price_per_day"];
                    $car_img = $row1["car_img"];

                    ?>
            <a href="booking.php?id=<?php echo($car_id) ?>">
            <div class="sub-menu">


            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
            <h5> <?php echo $car_name; ?> </h5>
            <h6> AC Fare: <?php echo ("$" . $ac_price . "/km & $" . $ac_price_per_day . "/day"); ?></h6>
            <h6> Non-AC Fare: <?php echo ("$" . $non_ac_price . "/km & $" . $non_ac_price_per_day . "/day"); ?></h6>
            </div>
            </a>
            <?php }}
            else {
                ?>
                    <h1> No cars available :( </h1>
                <?php
            }
            ?>
        </section>

    </div>
    <div class="bgimg-2">
        <div class="caption">
            <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
        </div>
    </div>

    <hr>

    <div class="container">
    <div class="row">
        <h2 style="text-align: center">Our Agents</h2>
        <h4 style="text-align: center">Our team of agents are ready to help you reach your car renting goals by making your needs our number one priority</h4>
        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="img/agent1.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        Carolyn McGill
                    </div>
                    <div class="desc">Support Manager</div>
                </div>
                <div class="bottom">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;</a>
                    <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i>&nbsp;&nbsp;&nbsp;</a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i>&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="img/agent2.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        Martin Smith
                    </div>
                    <div class="desc">Chief of Engineer</div>
                </div>
                <div class="bottom">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;</a>
                    <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i>&nbsp;&nbsp;&nbsp;</a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i>&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="img/agent3.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        Michelle Nelson
                    </div>
                    <div class="desc">Manager</div>
                </div>
                <div class="bottom">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;</a>
                    <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i>&nbsp;&nbsp;&nbsp;</a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i>&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>

        </div>
        <div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="img/agent4.jpg">
                </div>
                <div class="info">
                    <div class="title">
                        Brandon Miller 
                    </div>
                    <div class="desc">Store Manager</div>
                </div>
                <div class="bottom">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook">&nbsp;&nbsp;&nbsp;</i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter">&nbsp;&nbsp;&nbsp;</i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram">&nbsp;&nbsp;&nbsp;</i></a>
                </div>
            </div>

        </div>

    </div>
</div>
    
    <div class="bgimg-2">
        <div class="caption">
            <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
        </div>
    </div>
    
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <h5>© 2020 CarX Rental</h5>
                </div>

                <div class="col-sm-4">
                    <h5><a href="https://www.youtube.com/">Youtube Link</a></h5>
                    <h5><a href="faq/index.php">Frequently Asked Questions</a></h5>
                </div>
                <div class="col-sm-4 social-icons">
                    <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
</body>

</html>