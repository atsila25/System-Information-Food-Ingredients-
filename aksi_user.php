<?php
session_start();
include "Connection.php";
$act = $_GET['action'];

if ($act == "profile") {
    $user = $_SESSION['user_id'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $pro = $_POST['prov'];
    $city = $_POST['kota'];
    $avIN = $_POST['avIN'];

    // Insert into user profile
    $sql = "UPDATE user_profile SET avoidingredients = '$avIN', weight = '$weight', height = '$height' WHERE user_id = '$user'";
    $koneksi->query($sql);

    header("location:editAcc.php");
} elseif ($act == "scan") {
    $profID = $_POST['userProfile'];
    $output = $_POST['result'];

    //Upload File Handling
    if (isset($_FILES['scFile']) && $_FILES['scFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['scFile'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = array('jpg','jpeg', 'png');
        
        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                $fileNewName = uniqid('', true) . "." . $fileExt;
                $fileDestination = 'scan/' . $fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);

                $sql = "INSERT INTO scanner (profile_id, imageFile, output) VALUES ('".$profID."', '".$fileNewName."', '".$output."')";
                $a = $koneksi->query($sql);
                if ($a === true) {
                    header("location:editAcc.php");
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
}elseif ($act=="delHis") {
    $scanId = $_GET['scan_id'];
    $sql = "DELETE FROM scanner WHERE scan_id = '$scanId'";
    $a = $koneksi->query($sql);
    if ($a===true){
        header("location:editAcc.php");
    }
}elseif ($act=="tip"){
    $profID = $_POST['userProfile'];
    $tittle = $_POST['judul'];
    $date = $_POST['tanggal'];
    $PHOTO = $_FILES['isi'];

    if (isset($PHOTO) ) {
        $file = $_FILES['isi'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = array('jpg', 'jpeg', 'png');
        
        if (in_array($fileExt, $allowed)) {
                $fileNewName = uniqid('', true) . "." . $fileExt;
                $fileDestination = 'tip/' . $fileNewName;
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    
                    // Insert into database
                    $sql = "INSERT INTO tip (profile_id, tittle, created, contentFile) VALUES ('".$profID."', '".$tittle."', '".$date."', '".$fileNewName."')";
                    $a = $koneksi->query($sql);
                    if ($a === true) {
                        header("location:editAcc.php");
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
}elseif ($act=="delTip") {
    $tipId = $_GET['tip_id'];
    $sql = "DELETE FROM tip WHERE tip_id = '$tipId'";
    $a = $koneksi->query($sql);
    if ($a===true){
        header("location:editAcc.php");
    }
}elseif ($act == "favorite"){
    $profID = $_POST['userProfile'];
    $recipe = $_POST['recipe_id'];
    $sql = "INSERT INTO favorites (profile_id, recipe_id) VALUES ('".$profID."', '".$recipe."')";
    $koneksi->query($sql);
    header("location:foodRecipes.php");
}elseif ($act=="unFav") {
    $favId = $_GET['fav_id'];
    $sql = "DELETE FROM favorites WHERE fav_id = '$favId'";
    $a = $koneksi->query($sql);
    if ($a===true){
        header("location:editAcc.php");
    }
}
