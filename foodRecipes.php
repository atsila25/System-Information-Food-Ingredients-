<?php
session_start();
include "Connection.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}
$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM user_profile WHERE user_id = '$userID'";
$result = $koneksi->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $profileID = $row['profile_id'];
} else {
    $profileID = null;
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

    <title>Food Ingredients - Food Recipe</title>

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
                        <li><a class="" href="ingredients.php">Ingredients</a></li>
                        <li class="active"><a class="page-scroll" href="foodRecipes.php">Food Recipes</a></li>
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
                            Let's Explore<br />
                            Some Food Recipe<br />
                            <p>Food Ingredients System Information.</p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="img/landing/RecipeHead.png" alt="basket" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one">
                    <img src="img/landing/Foodheader.png" alt="header" />
                </div>
            </div>
        </div>
    </div>

    <section class="recipeCat">
        <div class="navy-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div>
                                <img alt="image" src="img/Appetizer.png">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Appetizer
                                </span>
                                <small class="text-muted">Recipes Category</small>
                                <a href="#" class="product-name"> Appetizer</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#Appetizer" class="btn btn-xs btn-outline btn-primary">More Info </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div>
                                <img alt="image" src="img/Main Course.png">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Main Course
                                </span>
                                <small class="text-muted">Recipes Category</small>
                                <a href="#" class="product-name"> Main Course</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#MainCourse" class="btn btn-xs btn-outline btn-primary">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div>
                                <img alt="image" src="img/Side Dish.png">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Side Dishes
                                </span>
                                <small class="text-muted">Recipes Category</small>
                                <a href="#" class="product-name"> Side Dishes</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#SideDishes" class="btn btn-xs btn-outline btn-primary">More Info </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div>
                                <img alt="image" src="img/Dessert.png">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Dessert
                                </span>
                                <small class="text-muted">Recipes Category</small>
                                <a href="#" class="product-name"> Dessert</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#Dessert" class="btn btn-xs btn-outline btn-primary">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div>
                                <img alt="image" src="img/Beverages.png">
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Beverages
                                </span>
                                <small class="text-muted">Recipes Category</small>
                                <a href="#" class="product-name"> Beverages</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">
                                    <a href="#Beverages" class="btn btn-xs btn-outline btn-primary">More Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <section id="Appetizer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>APPETIZER RECIPES</h1>
                    <p>Appetizer Recipe to make your cooking activity easier.</p>
                </div>
            </div>
            <!-- Resepnya disini -->
            <div class="row features-block">
                <div class="col-md-6">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM recipes, recipe_categories WHERE recipe_categories.rcategory_id = recipes.rcategory_id AND recipes.recipe_id = 20";
                        $dt_query = $koneksi->query($query);
                        while ($app = $dt_query->fetch_array()) {
                        ?>
                            <tr>
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="hidden">
                                            <td><?php echo $no++; ?></td>
                                        </div>
                                        <div>
                                            <img alt="image" src="recipeUp/<?php echo $app['recipe_file']; ?>" style="width: 500px;">
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $app['recipe_name']; ?>
                                            </span>
                                            <small class="text-muted">Recipes Category</small>
                                            <a href="#" class="product-name"> <?php echo $app['rcat_name']; ?></a>
                                            <div class="small m-t-xs">
                                                <?php echo $app['rcat_description']; ?>
                                            </div>
                                            <div class="m-t text-right">
                                                <form method="post" action="aksi_user.php?action=favorite">
                                                    <input type="hidden" name="recipe_id" value="<?php echo $app['recipe_id']; ?>">
                                                    <input type="hidden" name="userProfile" value="<?php echo $profileID ?>">
                                                    <a href="https://natashaskitchen.com/avocado-cucumber-shrimp-appetizers/">Recipe Link</a>
                                                    <button type="submit" class="btn btn-warning btn-sm demo2">Add to Favourite</button>
                                                    <a href="recipeUp/<?php echo $app['recipe_file']; ?>" download class="btn btn-success btn-sm demo2">Download Recipe</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </div>
            </div>
        </div>
    </section>

    <section id="MainCourse">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>MAIN COURSE RECIPES</h1>
                    <p>Main Course Recipe to make your cooking activity easier.</p>
                </div>
            </div>
            <!-- Resepnya disini -->
            <div class="row features-block">
                <div class="col-md-6">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM recipes, recipe_categories WHERE recipe_categories.rcategory_id = recipes.rcategory_id AND recipes.recipe_id = 18";
                        $dt_query = $koneksi->query($query);
                        while ($app = $dt_query->fetch_array()) {
                        ?>
                            <tr>
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="hidden">
                                            <td><?php echo $no++; ?></td>
                                        </div>
                                        <div>
                                            <img alt="image" src="recipeUp/<?php echo $app['recipe_file']; ?>" style="width: 500px;">
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $app['recipe_name']; ?>
                                            </span>
                                            <small class="text-muted">Recipes Category</small>
                                            <a href="#" class="product-name"> <?php echo $app['rcat_name']; ?></a>
                                            <div class="small m-t-xs">
                                                <?php echo $app['rcat_description']; ?>
                                            </div>
                                            <div class="m-t text-right">
                                                <form method="post" action="aksi_user.php?action=favorite">
                                                    <input type="hidden" name="recipe_id" value="<?php echo $app['recipe_id']; ?>">
                                                    <input type="hidden" name="userProfile" value="<?php echo $profileID ?>">
                                                    <a href="https://resepkoki.id/resep/resep-nasi-goreng-oriental/">Recipe Link</a>
                                                    <button type="submit" class="btn btn-warning btn-sm demo2">Add to Favourite</button>
                                                    <a href="recipeUp/<?php echo $app['recipe_file']; ?>" download class="btn btn-success btn-sm demo2">Download Recipe</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </div>
            </div>
        </div>
    </section>

    <section id="SideDishes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>SIDE DISHES RECIPES</h1>
                    <p>Side Dishes Recipe to make your cooking activity easier.</p>
                </div>
            </div>
            <!-- Resepnya disini -->
            <div class="row features-block">
                <div class="col-md-6">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM recipes, recipe_categories WHERE recipe_categories.rcategory_id = recipes.rcategory_id AND recipe_categories.rcategory_id = 5";
                        $dt_query = $koneksi->query($query);
                        while ($app = $dt_query->fetch_array()) {
                        ?>
                            <tr>
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="hidden">
                                            <td><?php echo $no++; ?></td>
                                        </div>
                                        <div>
                                            <img alt="image" src="recipeUp/<?php echo $app['recipe_file']; ?>" style="width: 500px;">
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $app['recipe_name']; ?>
                                            </span>
                                            <small class="text-muted">Recipes Category</small>
                                            <a href="#" class="product-name"> <?php echo $app['rcat_name']; ?></a>
                                            <div class="small m-t-xs">
                                                <?php echo $app['rcat_description']; ?>
                                            </div>
                                            <div class="m-t text-right">
                                                <form method="post" action="aksi_user.php?action=favorite">
                                                    <input type="hidden" name="recipe_id" value="<?php echo $app['recipe_id']; ?>">
                                                    <input type="hidden" name="userProfile" value="<?php echo $profileID ?>">
                                                    <a href="https://resepkoki.id/resep/resep-sambal-bawang/">Recipe Link</a>
                                                    <button type="submit" class="btn btn-warning btn-sm demo2">Add to Favourite</button>
                                                    <a href="recipeUp/<?php echo $app['recipe_file']; ?>" download class="btn btn-success btn-sm demo2">Download Recipe</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </div>
            </div>
        </div>
    </section>

    <section id="Dessert">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>DESSERT RECIPES</h1>
                    <p>Dessert Recipe to make your cooking activity easier.</p>
                </div>
            </div>
            <!-- Resepnya disini -->
            <div class="row features-block">
                <div class="col-md-6">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM recipes, recipe_categories WHERE recipe_categories.rcategory_id = recipes.rcategory_id AND recipes.recipe_id = 14";
                        $dt_query = $koneksi->query($query);
                        while ($app = $dt_query->fetch_array()) {
                        ?>
                            <tr>
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="hidden">
                                            <td><?php echo $no++; ?></td>
                                        </div>
                                        <div>
                                            <img alt="image" src="recipeUp/<?php echo $app['recipe_file']; ?>" style="width: 500px;">
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $app['recipe_name']; ?>
                                            </span>
                                            <small class="text-muted">Recipes Category</small>
                                            <a href="#" class="product-name"> <?php echo $app['rcat_name']; ?></a>
                                            <div class="small m-t-xs">
                                                <?php echo $app['rcat_description']; ?>
                                            </div>
                                            <div class="m-t text-right">
                                                <form method="post" action="aksi_user.php?action=favorite">
                                                    <input type="hidden" name="recipe_id" value="<?php echo $app['recipe_id']; ?>">
                                                    <input type="hidden" name="userProfile" value="<?php echo $profileID ?>">
                                                    <a href="https://www.yummy.co.id/resep/puding-keju-saus-strowberry">Recipe Link</a>
                                                    <button type="submit" class="btn btn-warning btn-sm demo2">Add to Favourite</button>
                                                    <a href="recipeUp/<?php echo $app['recipe_file']; ?>" download class="btn btn-success btn-sm demo2">Download Recipe</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </div>
            </div>
        </div>
    </section>

    <section id="Beverages">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="navy-line"></div>
                    <h1>BEVERAGES RECIPES</h1>
                    <p>Beverages Recipe to make your cooking activity easier.</p>
                </div>
            </div>
            <!-- Resepnya disini -->
            <div class="row features-block">
                <div class="col-md-6">
                    <thead>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM recipes, recipe_categories WHERE recipe_categories.rcategory_id = recipes.rcategory_id AND recipes.recipe_id = 21";
                        $dt_query = $koneksi->query($query);
                        while ($app = $dt_query->fetch_array()) {
                        ?>
                            <tr>
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="hidden">
                                            <td><?php echo $no++; ?></td>
                                        </div>
                                        <div>
                                            <img alt="image" src="recipeUp/<?php echo $app['recipe_file']; ?>" style="width: 500px;">
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $app['recipe_name']; ?>
                                            </span>
                                            <small class="text-muted">Recipes Category</small>
                                            <a href="#" class="product-name"> <?php echo $app['rcat_name']; ?></a>
                                            <div class="small m-t-xs">
                                                <?php echo $app['rcat_description']; ?>
                                            </div>
                                            <div class="m-t text-right">
                                                <form method="post" action="aksi_user.php?action=favorite">
                                                    <input type="hidden" name="recipe_id" value="<?php echo $app['recipe_id']; ?>">
                                                    <input type="hidden" name="userProfile" value="<?php echo $profileID ?>">
                                                    <a href="https://resepkoki.id/resep/resep-teh-susu-telur-talua-khas-medan/">Recipe Link</a>
                                                    <button type="submit" class="btn btn-warning btn-sm demo2">Add to Favourite</button>
                                                    <a href="recipeUp/<?php echo $app['recipe_file']; ?>" download class="btn btn-success btn-sm demo2">Download Recipe</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
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