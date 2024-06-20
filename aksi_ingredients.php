<?php
include "Connection.php";
$act = $_GET['action'];

if ($act == "addIC") {
    $categories = $_POST['categories'];
    $sub = $_POST['subJenis'];
    $idesc = $_POST['inDesc'];
    $sql = "INSERT INTO ingredients_categories (jenis_bahan, sub_jenis, ingredients_description) VALUES ('" . $categories . "','" . $sub . "','" . $idesc . "')";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
} elseif ($act == "addIngredient") {
    $inCat = $_POST['ingredientsCat'];
    $inName = $_POST['inName'];
    $inChar = $_POST['inDesc'];
    $sql = "INSERT INTO ingredients (icategories_id, ingredients_name, characteristic) VALUES ('" . $inCat . "','" . $inName . "','" . $inChar . "')";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
} elseif ($act == "addNutrition") {
    $ingredient = $_POST['ingredient'];
    $calories = $_POST['cal'];
    $carbo = $_POST['carb'];
    $protein = $_POST['pro'];
    $sodium = $_POST['sod'];
    $natrium = $_POST['nat'];
    $sugar = $_POST['sgr'];
    $sql = "INSERT INTO nutrition (ingredients_id, carbohidrate, calories, protein, sodium, natrium, sugar) VALUES ('" . $ingredient . "','" . $carbo . "','" . $calories . "','" . $protein . "','" . $sodium . "','" . $natrium . "','" . $sugar . "')";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
} elseif ($act == "updateCat") {
    $catId = $_GET['icategories_id'];
    $jenis = $_GET['jenis_bahan'];
    $sql = "UPDATE ingredients_categories SET jenis_bahan = '$jenis' WHERE icategories_id = '$catId'";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
} elseif ($act == "delCat") {
    $catId = $_GET['icategories_id'];
    $sql = "DELETE FROM ingredients_categories WHERE icategories_id = '$catId'";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
} elseif ($act == "updateCat") {
    $catId = $_GET['icategories_id'];
    $categories = $_POST['categories'];
    $sub = $_POST['subJenis'];
    $idesc = $_POST['inDesc'];
    $sql = "UPDATE ingredients_categories SET jenis_bahan = '$categories', sub_jenis = '$sub', ingredients_description = '$idesc' WHERE icategories_id = '$catId'";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
} elseif ($act == "updateIn") {
    $inId = $_GET['ingredients_id'];
    $inCat = $_POST['ingredientsCat'];
    $inName = $_POST['inName'];
    $inChar = $_POST['inDesc'];
    $sql = "UPDATE ingredients SET ingredientsCat = '$inCat', inName = '$inName', inDesc = '$inChar' WHERE icategories_id = '$inId'";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
} elseif ($act == "multiDel") {
    if (isset($_POST['selectedIds'])) {
        $selectedIds = $_POST['selectedIds'];
        $ids = implode(",", $selectedIds);
        $sql = "DELETE FROM ingredients WHERE ingredients_id IN ($ids)";
        $a = $koneksi->query($sql);
        if ($a === true) {
            header("location:menuAdmin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "No items selected";
    }
}
