<?php
include "Connection.php";
$act = $_GET['act'];
if ($act == "addRC") {
    $categories = $_POST['rcatName'];
    $sub = $_POST['rcatDesc'];
    $sql = "INSERT INTO recipe_categories (rcat_name, rcat_description) VALUES ('" . $categories . "','" . $sub . "')";
    $a = $koneksi->query($sql);
    if ($a === true) {
        header("location:menuAdmin.php");
    }
}elseif ($act=="delCat") {
    $idR = $_GET['rcategory_id'];
    $sql = "DELETE FROM recipe_categories WHERE rcategory_id = '$idR'";
    $a = $koneksi->query($sql);
    if ($a===true){
        header("location:menuAdmin.php");
    }
} elseif ($act == "addR") {
    $categories = $_POST['reCat'];
    $name = $_POST['reName'];
    $ingre = $_POST['reIn'];

    //Upload File Handling
    if (isset($_FILES['reFile']) && $_FILES['reFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['reFile'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = array('jpg', 'png');
        
        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                $fileNewName = uniqid('', true) . "." . $fileExt;
                $fileDestination = 'recipeUp/' . $fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                $_array = [];
                foreach ($ingre as $key => $value) {
                    $_array[] = "('$categories', '$value', '$name', '$fileNewName')";
                }
                $values = implode(",", $_array);
                $sql = "INSERT INTO recipes (rcategory_id, ingredients_id, recipe_name, recipe_file) VALUES $values";
                $a = $koneksi->query($sql);
                if ($a === true) {
                    header("location:menuAdmin.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $koneksi->error;
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    } else {
        echo "File not uploaded or an error occurred during file upload!";
    }
}elseif ($act == "multiDelR") {
    if (isset($_POST['recipe_ids'])) {
        $recipe_ids = $_POST['recipe_ids'];
        foreach ($recipe_ids as $recipe_id) {
            // Hapus file terkait (jika ada)
            $sql = "SELECT recipe_file FROM recipes WHERE recipe_id = '$recipe_id'";
            $result = $koneksi->query($sql);
            if ($result && $row = $result->fetch_assoc()) {
                $file = $row['recipe_file'];
                if ($file && file_exists('recipeUp/' . $file)) {
                    unlink('recipeUp/' . $file);
                }
            }

            // Hapus data dari database
            $sql = "DELETE FROM recipes WHERE recipe_id = '$recipe_id'";
            $koneksi->query($sql);
        }
        header("location:menuAdmin.php");
    } else {
        echo "No recipes selected for deletion!";
    }
}