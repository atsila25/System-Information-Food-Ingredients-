<?php
session_start();
include "Connection.php";

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}
$userID = $_SESSION['user_id'];
$usn = $_SESSION['username'];
$psw = $_SESSION['password'];

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

    <title>Food Ingredients - Account</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Preview container -->
    <style>
        .preview-container {
            margin-top: 20px;
        }

        .preview-container img {
            max-width: 100%;
            height: auto;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- OCR -->
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js@v2.1.4/dist/tesseract.min.js"></script>
</head>

<!-- api
<script>
    function loadCities() {
        var provinceId = document.getElementById("province").value;
        console.log(provinceId);
        if (provinceId) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get_cities.php?province_id=" + provinceId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("city").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        } else {
            document.getElementById("city").innerHTML = '<option value="">--Pilih Kota--</option>';
        }
    }
</script> -->

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
                        <li><a class="" href="foodRecipes.php">Food Recipes</a></li>
                        <li class="active"><a class="page-scroll" href="editAcc.php">Account</a></li>
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
                            You Edit or Take a Look<br />
                            Your Profile here<br />
                            <p>Food Ingredients System Information.</p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="img/landing/accHead.png" alt="basket" />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one">
                    <img src="img/landing/Foodheader.png" alt="header" />
                </div>
            </div>
        </div>
    </div>

    <div class="navy-line"></div>
    <div class="wrapper gray-bg" style="min-height: auto;">
        <section class="user">
            <div class="navy-line"></div>
            <div class="wrapper wrapper-content">
                <div class="row animated fadeInRight">
                    <div class="col-md-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>User Profile</h5>
                            </div>
                            <div class="ibox-content">
                                <form action="aksi_user.php?action=profile" method="post">
                                    <input type="hidden" name="user_id" value="<?php echo $userID; ?>">

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" disabled class="form-control" name="username" value="<?php echo $usn; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" disabled class="form-control" name="password" value="<?php echo $psw; ?>">
                                    </div>

                                    <div class="form-group mt-4">
                                        <label>Avoid Ingredients Nutrition</label>
                                        <input type="text" class="form-control" name="avIN" value="<?php echo $row['avoidingredients']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control m-b" name="gender" value="<?php echo $row['gender']; ?>" readonly>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input type="text" class="form-control" name="weight" value="<?php echo $row['weight']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Height</label>
                                        <input type="text" class="form-control" name="height" value="<?php echo $row['height']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" class="form-control" name="prov" value="<?php echo $row['provinsi']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input type="text" class="form-control" name="kota" value="<?php echo $row['kota']; ?>" readonly>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- User Favorites Recipe -->
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>User Favourites Recipes</h5>
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
                                <div class="row features-block">
                                    <div class="col-lg-12 features-text wow fadeInLeft">
                                        <!-- Resepnya disini -->
                                        <div class="row">
                                            <?php
                                            $no = 1;
                                            $query = "SELECT * FROM favorites, recipes WHERE favorites.recipe_id = recipes.recipe_id AND favorites.profile_id = '$profileID'";
                                            $dt_query = $koneksi->query($query);
                                            while ($fav = $dt_query->fetch_array()) {
                                            ?>
                                                <div class="col-md-6">
                                                    <div class="ibox">
                                                        <div class="ibox-content product-box">
                                                            <div class="product-desc">
                                                                <span class="product-price">
                                                                    <?php echo $fav['recipe_name']; ?>
                                                                </span>
                                                                <div>
                                                                    <img alt="image" src="recipeUp/<?php echo $fav['recipe_file']; ?>" style="width: 300px;">
                                                                </div>
                                                                <div class="m-t text-right">
                                                                    <a href="recipeUp/<?php echo $fav['recipe_file']; ?>" download class="btn btn-success btn-sm demo2">Download Recipe</a>
                                                                    <a href="aksi_user.php?fav_id=<?php echo $fav['fav_id']; ?>&&action=unFav" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this recipe?');">Remove Recipe</a>
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
                        </div>
                        <!-- Scanner -->
                        <div class="ibox float-e-margins">
                            <div class="row">
                                <!-- Scan Ingredient -->
                                <div class="col-md-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Scan Ingredients</h5>
                                            <?php
                                            $sql = "SELECT avoidingredients FROM user_profile WHERE profile_id = $profileID";
                                            $result = $koneksi->query($sql);
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $avoidIngredients = $row['avoidingredients'];
                                            } else {
                                                echo "<alert>none</alert>";
                                            }
                                            // Encode the array to JSON and pass it to JavaScript
                                            $avoidIngredientsJson = json_encode($avoidIngredients);
                                            ?>
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
                                            <form class="m-t" action="aksi_user.php?action=scan" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="userProfile" value="<?php echo $profileID; ?>">
                                                <div class="preview-container" id="previewContainer">
                                                    <!-- Preview image will be displayed here -->
                                                </div>
                                                <label>Nutrition File</label>
                                                <input type="file" id="fileInput" class="form-control" name="scFile" accept=".jpg, .jpeg, .png">
                                                <div id="output"></div>
                                                <div>
                                                    <input type="text" class="form-control" onclick="compareText()" id="comparisonResult" placeholder="Comparison Result" name="result" readonly>
                                                </div>
                                                <div class="text-center">
                                                    <br /><button class="btn btn-success btn-sm demo2" type="submit">Add to history</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Scan History -->
                                <div class="col-md-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Scan History</h5>
                                            <div class="ibox-tools">
                                                <a class="collapse-link">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                                <a class="close-link">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Tabel History -->
                                        <div class="ibox-content">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Image File</th>
                                                        <th>Output</th>
                                                        <th> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $query = "SELECT * FROM scanner, user_profile WHERE scanner.profile_id = user_profile.profile_id AND user_profile.profile_id = '$profileID'";
                                                    $dt_query = $koneksi->query($query);
                                                    while ($scan = $dt_query->fetch_array()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td> <?php if ($scan['imageFile']) { ?>
                                                                    <img src="scan/<?php echo $scan['imageFile']; ?>" alt="Nutrition Image" style="width: 100px;">
                                                                <?php } else { ?>
                                                                    No Image
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo $scan['output']; ?> </td>
                                                            <td><a href="aksi_user.php?scan_id=<?php echo $scan['scan_id']; ?>&&action=delHis" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this scan history?');">Delete History</a></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- TIP -->
                    <div class="col-md-6">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>User Tip</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- form tip -->
                            <div class="ibox-content">
                                <form method="POST" class="form-inline" action="aksi_user.php?action=tip" enctype="multipart/form-data">
                                    <input type="hidden" name="userProfile" value="<?php echo $profileID; ?>">
                                    <table class="table">
                                        <tr>
                                            <td><label>Tittle</label></td>
                                            <td><input type="text" class="form-control" placeholder="Tips Tittle" name="judul"></td>
                                        </tr>
                                        <tr>
                                            <td><label>Created</label></td>
                                            <td><input type="date" class="form-control" placeholder="Date" name="tanggal"></td>
                                        </tr>
                                        <tr>
                                            <td><label>Upload your Tip</label></td>
                                            <td><input type="file" class="form-control" placeholder="Upload your file here" name="isi"></td>
                                        </tr>
                                    </table>
                                    <div class="text-center">
                                        <div class="navy-line"></div>
                                        <button class="btn btn-success btn-sm demo2" type="submit">Upload Tip</button>
                                    </div>
                                </form>
                            </div>
                            <!-- tabel -->
                            <div class="ibox-content">
                                <div class="social-feed-separated">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = "SELECT * FROM user_profile, tip WHERE user_profile.profile_id = tip.profile_id AND user_profile.profile_id = '$profileID'";
                                        $dt_query = $koneksi->query($query);
                                        while ($rows = $dt_query->fetch_array()) {
                                        ?>
                                            <tr>
                                                <div class="hidden">
                                                    <td><?php echo $no++; ?></td>
                                                </div>
                                                <div class="social-avatar">
                                                    <a href="">
                                                        <img alt="image" src="img/user.png">
                                                    </a>
                                                </div>
                                                <div class="social-feed-box">
                                                    <div class="social-avatar">
                                                        <a><?php echo $usn; ?></a>
                                                        <small class="text-muted">DATE <?php echo $rows['created']; ?></small>
                                                    </div>
                                                    <div class="social-body">
                                                        <p>
                                                            TIP TITTLE: <?php echo $rows['tittle']; ?>
                                                        </p>
                                                        <div>
                                                            <?php if ($rows['contentFile']) { ?>
                                                                <img src="tip/<?php echo $rows['contentFile']; ?>" alt="Nutrition Image" style="width: 300px;">
                                                            <?php } else { ?>
                                                                No Image
                                                            <?php } ?>
                                                        </div>
                                                        <div class="btn-group">
                                                            <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                                                            <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                                                            <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                                                            <a href="aksi_user.php?tip_id=<?php echo $rows['tip_id']; ?>&&action=delTip" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tip?');">Delete</a>
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
                    </div>
                </div>
            </div>
        </section>
    </div>

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

    <!-- toolbox -->
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

    <!-- Image Prev -->
    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('previewContainer');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Clear any existing content
                    previewContainer.innerHTML = '';

                    // Create an image element
                    const img = document.createElement('img');
                    img.src = e.target.result;

                    // Append the image to the container
                    previewContainer.appendChild(img);
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            } else {
                // Clear the preview container if no file is selected
                previewContainer.innerHTML = '';
            }
        });
    </script>

    <!-- OCR -->
    <script>
        let ocrOutput = '';

        document.getElementById('fileInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const img = new Image();
                    img.src = reader.result;
                    img.onload = function() {
                        Tesseract.recognize(img, 'eng', {
                            logger: m => console.log(m)
                        }).then(({
                            data: {
                                text
                            }
                        }) => {
                            ocrOutput = text;
                            document.getElementById('output').textContent = text;
                            compareText();
                        });
                    };
                };
                reader.readAsDataURL(file);
            }
        });

        function compareText() {
            const avoidIngredients = <?php echo $avoidIngredientsJson; ?>;
            if (ocrOutput.includes(avoidIngredients)) {
                document.getElementById('comparisonResult').value = 'Produk tidak aman dikonsumsi';
            } else {
                document.getElementById('comparisonResult').value = 'Produk aman dikonsumsi';
            }
        }
    </script>


</body>

</html>