<?php
session_start();
include "Connection.php";
$act = $_GET['action'];

if ($act == "register") {
    $user = $_POST['username'];
    $psw = $_POST['password'];
    $role = $_POST['role'];

    if ($role == 'admin') {
        $sql = "INSERT INTO register (username, password, role) VALUES ('" . $user . "', '" . $psw . "','" . $role . "')";
        $query = $koneksi->query($sql);
        if ($query === true) {
            header('location: login.php');
        } else {
            echo "Error";
        }
    } else {
        $sql = "INSERT INTO register (username, password, role) VALUES ('" . $user . "', '" . $psw . "','" . $role . "')";
        $query = $koneksi->query($sql);
        $sqluser = "SELECT * FROM register WHERE username = '" . $user . "'";
        $query = $koneksi->query($sqluser);
        $data = $query->fetch_array();
        
        $_SESSION['user_id'] = $data['user_id'];
        header('location: formregister.php');
    }
} elseif ($act == "userRegister") {
    $user = $_POST['user_id'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $pro = $_POST['prov'];
    $city = $_POST['kota'];
    $avIN = $_POST['avIN'];

    // Insert into user profile
    $sql = "INSERT INTO user_profile (user_id, avoidingredients, gender, weight, height, provinsi, kota) VALUES ('" . $user . "','" . $avIN . "', '" . $gender . "', '" . $weight . "', '" . $height . "', '" . $pro . "', '" . $city . "')";
    $query = $koneksi->query($sql);

    if ($query === true) {
        header('location: login.php');
    } else {
        echo "Error";
    }
}
