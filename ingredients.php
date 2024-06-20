<?php
session_start();
include "Connection.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}
// $userID = $_SESSION['user_id'];
// $sql = "SELECT * FROM user_profile WHERE user_id = '$userID'";
// $result = $koneksi->query($sql);
// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $profileID = $row['profile_id'];
// } else {
//     $profileID = null;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Ingredients - Ingredients</title>

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
                        <li><a class="" href="mainMenu.php">Home</a></li>
                        <li class="active"><a class="page-scroll" href="ingredients.php">Ingredients</a></li>
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
                            Let's Explore <br />
                            Food Ingredients Information<br />
                            <p>Food Ingredients System Information.</p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="img/landing/IngredientsHead.png" alt="basket" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one">
                    <img src="img/landing/Foodheader.png" alt="header" />
                </div>
            </div>
        </div>
    </div>
    <section class="ingredientsCat">
        <div class="navy-line"></div>
        <div class="container">
            <div class="navy-line"></div>
            <div class="row">
                <div class="navy-line"></div>
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div>
                                <img alt="image" src="img/Hewani.png">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    HEWANI
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="https://www.gramedia.com/literasi/bahan-pangan-hewani/" class="product-name"> Hewani</a>
                                <div class="small m-t-xs">
                                    Bahan makanan hewani adalah sumber makanan yang dihasilkan dari hewan yang dapat dikonsumsi oleh manusia.
                                    <br />Bahan pangan hewani dikenal sebagai sumber protein dan lemak.
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#hewani" class="btn btn-xs btn-outline btn-primary">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div>
                                <img alt="image" src="img/Nabati.png">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    NABATI
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="https://www.gramedia.com/literasi/bahan-pangan-nabati/" class="product-name"> Nabati</a>
                                <div class="small m-t-xs">
                                    Bahan pangan nabati adalah bahan pangan yang dihasilkan oleh tumbuhan yang dapat dikonsumsi oleh manusia.
                                    Bahan pangan nabati dapat dikonsumsi setelah diolah ataupun dikonsumsi secara langsung.
                                    Bahan pangan jenis ini mengandung berbagai gizi yang diperlukan bagi tubuh manusia, seperti vitamin, mineral, serat, karbohidrat, kalsium, zat besi, dan protein.
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#nabati" class="btn btn-xs btn-outline btn-primary">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hewani">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>BAHAN PANGAN HEWANI</h1>
                    <p>Animal Based Ingredient for your recipe.</p>
                </div>
            </div>
            <div class="row features-block">
                <div class="col-lg-12 features-text wow fadeInLeft">
                    <!-- Resepnya disini -->
                    <div class="row">
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM ingredients, ingredients_categories WHERE ingredients_categories.icategories_id = ingredients.icategories_id AND ingredients_categories.jenis_bahan = 'Hewani'";
                        $dt_queryy = $koneksi->query($query);
                        while ($ing = $dt_queryy->fetch_array()) {
                        ?>
                            <div class="col-md-6">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $ing['sub_jenis']; ?>
                                            </span>
                                            <small class="text-muted">Recipes Category</small>
                                            <a href="#" class="product-name"> <?php echo $ing['ingredients_name']; ?></a>
                                            <div class="small m-t-xs">
                                                <?php echo $ing['characteristic']; ?>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="ibox float-e-margins">
                                                    <div class="ibox-title">
                                                        <h5>Nutrition Table per Sajian</h5>
                                                        <div class="ibox-tools">
                                                            <a class="collapse-link">
                                                                <i class="fa fa-chevron-down"></i>
                                                            </a>
                                                            <a class="close-link">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="ibox-content">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ingre</th>
                                                                    <th>Carbo</th>
                                                                    <th>Cal</th>
                                                                    <th>Pro</th>
                                                                    <th>Sodium</th>
                                                                    <th>Nat</th>
                                                                    <th>Sugar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                $inTer = $ing['ingredients_id'];
                                                                $query = "SELECT * FROM ingredients, nutrition WHERE ingredients.ingredients_id = nutrition.ingredients_id AND nutrition.ingredients_id = '$inTer'";
                                                                $dt_query = $koneksi->query($query);
                                                                while ($ingredient = $dt_query->fetch_array()) {
                                                                ?>
                                                                    <tr>
                                                                        <td hidden><?php echo $no++; ?></td>
                                                                        <td><?php echo $ingredient['ingredients_name']; ?></td>
                                                                        <td><?php echo $ingredient['calories']; ?></td>
                                                                        <td><?php echo $ingredient['carbohidrate']; ?></td>
                                                                        <td><?php echo $ingredient['protein']; ?></td>
                                                                        <td><?php echo $ingredient['sodium']; ?></td>
                                                                        <td><?php echo $ingredient['natrium']; ?></td>
                                                                        <td><?php echo $ingredient['sugar']; ?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-t text-right">
                                                <a href="https://www.gramedia.com/literasi/bahan-pangan-hewani/">More Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="nabati">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>BAHAN PANGAN NABATI</h1>
                    <p>Vegetable Based Ingredient for your recipe.</p>
                </div>
            </div>
            <div class="row features-block">
                <div class="col-lg-12 features-text wow fadeInLeft">
                    <!-- Resepnya disini -->
                    <div class="row">
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM ingredients, ingredients_categories WHERE ingredients_categories.icategories_id = ingredients.icategories_id AND ingredients_categories.jenis_bahan = 'Nabati'";
                        $dt_queryr = $koneksi->query($query);
                        while ($ing = $dt_queryr->fetch_array()) {
                        ?>
                            <div class="col-sm-6">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $ing['sub_jenis']; ?>
                                            </span>
                                            <small class="text-muted">Recipes Category</small>
                                            <a href="#" class="product-name"> <?php echo $ing['ingredients_name']; ?></a>
                                            <div class="small m-t-xs">
                                                <?php echo $ing['characteristic']; ?>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="ibox float-e-margins">
                                                    <div class="ibox-title">
                                                        <h5>Nutrition Table per Sajian</h5>
                                                        <div class="ibox-tools">
                                                            <a class="collapse-link">
                                                                <i class="fa fa-chevron-up"></i>
                                                            </a>
                                                            <a class="close-link">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="ibox-content">
                                                     <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Ingre</th>
                                                                    <th>Carbo</th>
                                                                    <th>Cal</th>
                                                                    <th>Pro</th>
                                                                    <th>Sodium</th>
                                                                    <th>Nat</th>
                                                                    <th>Sugar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                $inTer = $ing['ingredients_id'];
                                                                $query = "SELECT * FROM ingredients, nutrition WHERE ingredients.ingredients_id = nutrition.ingredients_id AND nutrition.ingredients_id = '$inTer'";
                                                                $dt_query = $koneksi->query($query);
                                                                while ($ingredient = $dt_query->fetch_array()) {
                                                                ?>
                                                                    <tr>
                                                                        <td hidden><?php echo $no++; ?></td>
                                                                        <td><?php echo $ingredient['ingredients_name']; ?></td>
                                                                        <td><?php echo $ingredient['calories']; ?></td>
                                                                        <td><?php echo $ingredient['carbohidrate']; ?></td>
                                                                        <td><?php echo $ingredient['protein']; ?></td>
                                                                        <td><?php echo $ingredient['sodium']; ?></td>
                                                                        <td><?php echo $ingredient['natrium']; ?></td>
                                                                        <td><?php echo $ingredient['sugar']; ?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table> 
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="m-t text-right">
                                                <a href="https://www.gramedia.com/literasi/bahan-pangan-nabati/">More Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row">
                        
                    </div>
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