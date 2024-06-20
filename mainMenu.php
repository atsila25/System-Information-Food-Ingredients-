<?php
session_start();
include "Connection.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Ingredients - Landing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top" class="landing-page no-skin-config">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="https://dribbble.com/atsila25">FISI!</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a class="page-scroll" href="mainMenu.php">Home</a></li>
                        <li><a class="" href="ingredients.php">Ingredients</a></li>
                        <li><a class="" href="foodRecipes.php">Food Recipes</a></li>
                        <li><a class="" href="editAcc.php">Account</a></li>
                        <li><a class="" href="logout.php">Log Out</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <div class="navy-line"></div>
                        <h1>FISI!<br />
                            We Provide <br />
                            Food Ingredients Information<br />
                            and Some Recipe for You.<br />
                            <p>Food Ingredients System Information.</p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="img/landing/ShBas.png" alt="basket" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one">
                    <img src="img/landing/Foodheader.png" alt="header" />
                </div>
            </div>
        </div>
    </div>

    <section class="ingredients">
        <div class="navy-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>FOOD INGREDIENTS</h1>
                    <p>Want to know some information about ingredients?</p>
                </div>
            </div>
            <div class="row features-block">
                <div class="col-lg-6 text-left m-t-n-lg wow zoomIn">
                    <img src="img/landing/ingredients.png" class="img-responsive" alt="dashboard">
                </div>
                <div class="col-lg-5 features-text text-right wow fadeInRight">
                    <h2>More Detail About Ingredients: </h2>
                    <p>Want to know more about ingredients?<br />
                        There is a lot of ingredients categorization<br />
                        Detailing about each categories and the ingredients from that categories<br />
                        Also, you can look the nutrition facts from the ingredient.</p>
                    <a href="ingredients.php" class="btn btn-success btn-sm demo2">Explore More About Ingredients Here!</a>
                </div>
            </div>
        </div>
    </section>

    <section class="foodRecipe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>FOOD RECIPES</h1>
                    <p>Food Recipe to make your cooking activity easier.</p>
                </div>
            </div>
            <div class="row features-block">
                <div class="col-lg-6 features-text text-left wow fadeInLeft">
                    <h2>More Detail About Recipes: </h2>
                    <p>Food recipes are detailed guides that help individuals prepare and cook various dishes.
                        They provide step-by-step instructions, ingredient lists, and cooking techniques to ensure a successful culinary outcome. <br />
                        Whether you're a beginner in the kitchen or an experienced chef, recipes are invaluable tools for creating delicious and diverse meals.</p>
                    <a href="foodRecipes.php" class="btn btn-success btn-sm demo2">Explore Food Recipes here:</a>
                </div>
                <div class="col-lg-6 text-right m-t-n-lg wow zoomIn">
                    <img src="img/landing/FoodRecipes.png" class="img-responsive" alt="dashboard">
                </div>
            </div>
        </div>
    </section>

    <section id="About Us" class="gray-section contact">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>About Us</h1>
                    <p>Made by Informatics Engineering Student For Website Programming Subject.</p>
                </div>
            </div>
            <div class="row m-b-lg">
                <div class="col-lg-12 col-lg-offset-3">
                    <address>
                        <strong><span class="navy">Project Website Programming, Inc.</span></strong><br />
                        Laudza Atsila/220605110144<br />
                        Malang, 2024<br />
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="https://informatika.uin-malang.ac.id/" class="btn btn-primary">Our Campus Site</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                    <p><strong>Website Programming &copy; 2024 </strong></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/wow/wow.min.js"></script>


    <script>
        $(document).ready(function() {

            $('body').scrollspy({
                target: '.navbar-fixed-top',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function(event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function() {
            var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;

            function init() {
                window.addEventListener('scroll', function(event) {
                    if (!didScroll) {
                        didScroll = true;
                        setTimeout(scrollPage, 250);
                    }
                }, false);
            }

            function scrollPage() {
                var sy = scrollY();
                if (sy >= changeHeaderOn) {
                    $(header).addClass('navbar-scroll')
                } else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }

            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }
            init();

        })();

        // Activate WOW.js plugin for animation on scrol
        new WOW().init();
    </script>

</body>

</html>