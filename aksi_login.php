<?php
session_start();
include "connection.php";
$user = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if($op == "in"){
    $sql = "SELECT * FROM register WHERE username='$user' AND password='$psw'";
    $query = $koneksi->query($sql);
    if(mysqli_num_rows($query) == 1){
        $data = $query->fetch_array();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['role'] = $data['role'];
        if($data['role'] =="Admin") {
            header("Location: menuAdmin.php");
        } elseif($data['role'] == "User") {
            header("Location: mainMenu.php");
        } else{
            die("Password Incorrect <a href=\"javascript:history.back()\">kembali</a>");
        }
    }else if($op == "out"){
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        header("Location: login.php");
    }
}
?>