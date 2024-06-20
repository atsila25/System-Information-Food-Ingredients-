<?php
session_start();
include "Connection.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['username'])) {
    die("Anda belum login");
}
$usn = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Ingredients - Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top" class="landing-page no-skin-config">
    <div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                    <a class="navbar-brand" href="logout.php">Helo <?php echo $usn ?></a>
                </div>
            </div>
        </nav>
    </div>
    <div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><br />
                            Manage FISI!<br />
                            from here!<br />
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one">
                    <img src="img/landing/Foodheader.png" alt="header" />
                </div>
            </div>
        </div>
    </div>
    <section class="ingredientsCategories wrapper wrapper-content animated fadeInUp">
        <div class="container">
            <div class="ibox float-e-margins">
                <div class="navy-line"></div>
                <div class="ibox-title">
                    <h5>Ingredients Categories</h5>
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
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Add new ingredients categories</h5>
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
                                    <form method="POST" class="form-inline" action="aksi_ingredients.php?action=addIC">
                                        <table class="table">
                                            <tr>
                                                <td><label>Ingredients Categories</label></td>
                                                <td> <select class="form-control m-b" name="categories">
                                                        <option value="hewani">Hewani</option>
                                                        <option value="nabati">Nabati</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td><label>Ingredients Sub Categories</label></td>
                                                <td><input type="text" class="form-control" placeholder="Ingredients Sub Categories" name="subJenis"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Ingredients Description</label></td>
                                                <td><input type="textarea" class="form-control" placeholder="Ingredients Description" name="inDesc"></td>
                                            </tr>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn btn-success btn-sm demo2" type="submit">Add Ingredients Categories</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Ingredients Categories Table</h5>
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
                                                <th>No</th>
                                                <th>Categories</th>
                                                <th>Sub Categories</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = "SELECT * FROM ingredients_categories";
                                            $dt_query = $koneksi->query($query);
                                            while ($inCat = $dt_query->fetch_array()) {
                                                $idIncat = $inCat['icategories_id'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?> </td>
                                                    <td><?php echo $jenis = $inCat['jenis_bahan']; ?> </td>
                                                    <td><?php echo $inCat['sub_jenis']; ?></td>
                                                    <td><?php echo $inCat['ingredients_description']; ?></td>
                                                    <td><?php
                                                        if ($jenis == "Nabati") {
                                                        ?>
                                                            <a href="aksi_ingredients.php?icategories_id=<?php echo $idIncat; ?>&&action=updateCat&&jenis_bahan=Hewani" class="btn btn-warning btn-sm demo2">Update Jenis: Hewani</a>
                                                        <?php
                                                        } elseif ($jenis == "Hewani") {
                                                        ?>
                                                            <a href="aksi_ingredients.php?icategories_id=<?php echo $idIncat; ?>&&action=updateCat&&jenis_bahan=Nabati" class="btn btn-warning btn-sm demo2">Update Jenis: Nabati</a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <!-- <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</a> -->
                                                        <a href="aksi_ingredients.php?icategories_id=<?php echo $idIncat; ?>&&action=delCat" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                    </td>
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
        </div>

    </section>
    <section class="ingredientsItem wrapper wrapper-content animated fadeInUp">
        <div class="container">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Ingredients Item</h5>
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Add new ingredients</h5>
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
                                    <form method="POST" class="form-inline" action="aksi_ingredients.php?action=addIngredient">
                                        <table class="table">
                                            <tr>
                                                <td><label>Ingredients Categories</label></td>
                                                <td>
                                                    <select class="form-control m-b" name="ingredientsCat">
                                                        <?php
                                                        include "Connection.php";
                                                        $a = "SELECT * FROM ingredients_categories";
                                                        $aq = $koneksi->query($a);
                                                        while ($data = $aq->fetch_array()) {
                                                        ?>
                                                            <option value="<?php echo $data['icategories_id']; ?>"><?php echo $data['jenis_bahan'] . ' || ' . $data['sub_jenis']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Ingredients Name</label></td>
                                                <td><input type="text" class="form-control" placeholder="Ingredients Name" name="inName"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Ingredients Characteristic</label></td>
                                                <td><input type="textarea" class="form-control" placeholder="Ingredients Characteristic" name="inDesc"></td>
                                            </tr>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn btn-success btn-sm demo2" type="submit">Add Ingredient</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Ingredients Table</h5>
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
                                    <form id="multiDeleteForm" action="aksi_ingredients.php?action=multiDel" method="post">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>All<input type="checkbox" id="selectAll"></th>
                                                    <th>No</th>
                                                    <th>Ingredients Categories</th>
                                                    <th>Ingredients Sub Categories</th>
                                                    <th>Ingredients</th>
                                                    <th>Characteristic</th>
                                                    <!-- <th> </th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $query = "SELECT * FROM ingredients, ingredients_categories WHERE ingredients.icategories_id = ingredients_categories.icategories_id";
                                                $dt_query = $koneksi->query($query);
                                                while ($ingredient = $dt_query->fetch_array()) {
                                                    $idIn = $ingredient['ingredients_id'];
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="selectedIds[]" value="<?php echo $idIn; ?>"></td>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $ingredient['jenis_bahan']; ?></td>
                                                        <td><?php echo $ingredient['sub_jenis']; ?></td>
                                                        <td><?php echo $ingredient['ingredients_name']; ?></td>
                                                        <td><?php echo $ingredient['characteristic']; ?></td>
                                                        <!-- <td><a data-toggle="modal" class="btn btn-secondary" href="#staticBackdrop">Update</a></td> -->
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger btn-center" onclick="return confirm('Are you sure you want to delete selected items?');">Delete Selected</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <!-- <form method="post" action="aksi_recipe.php?action=updateIn">
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Update</h1>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tr>
                                    <td><label>Ingredients Categories</label></td>
                                    <td>
                                        <select class="form-control m-b" name="ingredientsCat">
                                            <?php
                                            include "Connection.php";
                                            $a = "SELECT * FROM ingredients_categories";
                                            $aq = $koneksi->query($a);
                                            while ($data = $aq->fetch_array()) {
                                            ?>
                                                <option value="<?php echo $data['icategories_id']; ?>"><?php echo $data['jenis_bahan'] . ' || ' . $data['sub_jenis']; ?></option>
                                            <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <tr>
                                    <input type="hidden" name="ingredients_id" value="<?php echo $ingredient['ingredients_id']; ?>">
                                    <td><label>Ingredients Name</label></td>
                                    <td><input type="text" class="form-control" placeholder="Ingredients Name" name="inName" value="<?php echo $ingredient['ingredients_id']; ?>"?></td>
                                </tr>
                                <tr>
                                    <td><label>Ingredients Characteristic</label></td>
                                    <td><input type="textarea" class="form-control" placeholder="Ingredients Characteristic" name="inDesc"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form> -->
    </section>
    <section class="nutrition wrapper wrapper-content animated fadeInUp">
        <div class="container">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Nutrition</h5>
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Add Data Nutrition</h5>
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
                                    <form method="POST" class="form-inline" action="aksi_ingredients.php?action=addNutrition">
                                        <table class="table">
                                            <tr>
                                                <td><label>Ingredients</label></td>
                                                <td>
                                                    <select class="form-control m-b" name="ingredient">
                                                        <?php
                                                        include "Connection.php";
                                                        $a = "SELECT * FROM ingredients";
                                                        $aq = $koneksi->query($a);
                                                        while ($data = $aq->fetch_array()) {
                                                        ?>
                                                            <option value="<?php echo $data['ingredients_id']; ?>"><?php echo $data['ingredients_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Carbohidrate</label></td>
                                                <td><input type="number" class="form-control" placeholder="carbo/gram" name="carb"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Calories</label></td>
                                                <td><input type="number" class="form-control" placeholder="calories/kkal" name="cal"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Protein</label></td>
                                                <td><input type="number" class="form-control" placeholder="protein/gram" name="pro"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Sodium</label></td>
                                                <td><input type="number" class="form-control" placeholder="sodium/gram" name="sod"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Natrium</label></td>
                                                <td><input type="number" class="form-control" placeholder="natrium/gram" name="nat"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Sugar</label></td>
                                                <td><input type="number" class="form-control" placeholder="sugar/gram" name="sgr"></td>
                                            </tr>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn btn-success btn-sm demo2" type="submit">Add Nutrition</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
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
                                                <th>No</th>
                                                <th>Ingredients</th>
                                                <th>Carbohidrate</th>
                                                <th>Calories</th>
                                                <th>Protein</th>
                                                <th>Sodium</th>
                                                <th>Natrium</th>
                                                <th>Sugar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = "SELECT * FROM ingredients, nutrition WHERE ingredients.ingredients_id = nutrition.ingredients_id";
                                            $dt_query = $koneksi->query($query);
                                            while ($ingredient = $dt_query->fetch_array()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $ingredient['ingredients_name']; ?></td>
                                                    <td><?php echo $ingredient['calories']; ?> kkal</td>
                                                    <td><?php echo $ingredient['carbohidrate']; ?> gr</td>
                                                    <td><?php echo $ingredient['protein']; ?> gr</td>
                                                    <td><?php echo $ingredient['sodium']; ?> gr</td>
                                                    <td><?php echo $ingredient['natrium']; ?> gr</td>
                                                    <td><?php echo $ingredient['sugar']; ?> gr</td>
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
        </div>
    </section>
    <section class="recipeCategories wrapper wrapper-content animated fadeInUp">
        <div class="container">
            <div class="ibox float-e-margins">
                <div class="navy-line"></div>
                <div class="ibox-title">
                    <h5>Recipes Categories</h5>
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Add new recipes categories</h5>
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
                                    <form method="POST" class="form-inline" action="aksi_recipe.php?act=addRC">
                                        <table class="table">
                                            <tr>
                                                <td><label>Recipes Categories</label></td>
                                                <td><input type="text" class="form-control" placeholder="Recipes Categories" name="rcatName"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Recipes Description</label></td>
                                                <td><input type="textarea" class="form-control" placeholder="Recipes Description" name="rcatDesc"></td>
                                            </tr>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn btn-success btn-sm demo2" type="submit">Add Recipes Categories</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Recipes Categories Table</h5>
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
                                                <th>No</th>
                                                <th>Recipes Categories</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $query = "SELECT * FROM recipe_categories";
                                            $dt_query = $koneksi->query($query);
                                            while ($rCat = $dt_query->fetch_array()) {
                                                $idR = $rCat['rcategory_id'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $rCat['rcat_name']; ?></td>
                                                    <td><?php echo $rCat['rcat_description']; ?></td>
                                                    <td><a href="aksi_recipe.php?rcategory_id=<?php echo $idR; ?>&&act=delCat" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
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
        </div>
    </section>
    <section class="recipe wrapper wrapper-content animated fadeInUp">
        <div class="container">
            <div class="ibox float-e-margins">
                <div class="navy-line"></div>
                <div class="ibox-title">
                    <h5>Recipes</h5>
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Add new recipes</h5>
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
                                    <form method="POST" class="form-inline" action="aksi_recipe.php?act=addR" enctype="multipart/form-data">
                                        <table class="table">
                                            <tr>
                                                <td><label>Recipe Categories</label></td>
                                                <td>
                                                    <select class="form-control m-b" name="reCat">
                                                        <?php
                                                        include "Connection.php";
                                                        $a = "SELECT * FROM recipe_categories";
                                                        $aq = $koneksi->query($a);
                                                        while ($data = $aq->fetch_array()) {
                                                        ?>
                                                            <option value="<?php echo $data['rcategory_id']; ?>"><?php echo $data['rcat_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Recipe Name</label></td>
                                                <td><input type="text" class="form-control" placeholder="Recipe Name" name="reName"></td>
                                            </tr>
                                            <tr>
                                                <td><label>Ingredients</label></td>
                                                <td>
                                                    <table>
                                                        <?php
                                                        include "Connection.php";
                                                        $a = "SELECT * FROM ingredients";
                                                        $aq = $koneksi->query($a);
                                                        while ($data = $aq->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" class="btn-check" id="btncheck<?php echo $data['ingredients_id']; ?>" autocomplete="off" value="<?php echo $data['ingredients_id']; ?>" name="reIn[]">
                                                                    <label class="btn btn-outline-primary" for="btncheck<?php echo $data['ingredients_id']; ?>">
                                                                        <?php echo $data['ingredients_name']; ?>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Recipe File</label></td>
                                                <td><input type="file" class="form-control" name="reFile" accept=".jpg, .png"></td>
                                            </tr>
                                        </table>

                                        <div class="text-center">
                                            <button class="btn btn-success btn-sm demo2" type="submit">Add Recipe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Recipes Table</h5>
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
                                    <form id="deleteForm" action="aksi_recipe.php?act=multiDelR" method="post">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>No</th>
                                                    <th>Recipe Categories</th>
                                                    <th>Recipe name</th>
                                                    <th>Ingredients</th>
                                                    <th>File</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $query = "SELECT * FROM recipes, recipe_categories, ingredients WHERE recipe_categories.rcategory_id = recipes.rcategory_id AND ingredients.ingredients_id = recipes.ingredients_id";
                                                $dt_query = $koneksi->query($query);
                                                while ($ingredient = $dt_query->fetch_array()) {
                                                ?>
                                                    <tr>
                                                        <td><input type="checkbox" name="recipe_ids[]" value="<?php echo $ingredient['recipe_id']; ?>"></td>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $ingredient['rcat_name']; ?></td>
                                                        <td><?php echo $ingredient['recipe_name']; ?></td>
                                                        <td><?php echo $ingredient['ingredients_name']; ?></td>
                                                        <td> <?php if ($ingredient['recipe_file']) { ?>
                                                                <img src="recipeUp/<?php echo $ingredient['recipe_file']; ?>" alt="Recipe Image" style="width: 100px;">
                                                            <?php } else { ?>
                                                                No Image
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete selected items?');">Delete Selected</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function() {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<!-- Delete Selected -->
<script>
    document.getElementById('selectAll').addEventListener('change', function(e) {
        const checkboxes = document.querySelectorAll('input[name="selectedIds[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
    });
</script>

</html>