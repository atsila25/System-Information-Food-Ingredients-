<?php
session_start();
include "Connection.php";
include "api.php";
$provinsi = getProvinces();
$userID = $_SESSION['user_id'];
$sql = "SELECT * FROM register WHERE user_id = '$userID'";
$result = $koneksi->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ID = $row['user_id'];
} else {
    $ID = null;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FoodIngredientsSI | User Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<!-- api -->
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
</script>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInUp">
        <div class="col-md-12">
            <div>
                <h1 class="logo-name">FISI!</h1>
            </div>
            <h3>Register to Food Ingredients</h3>
            <p>Create your account to start everything.</p>

            <form class="m-t" action="aksi_register.php?action=userRegister" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row['username'] ?>" readonly>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $row['password'] ?>;" readonly>
                </div>
                <label class="col-sm-4 control-label">ROLE:</label>
                <div class="col-lg-8 text-center form-group">
                    <input type="text" class="form-control" name="role" value="User" readonly>
                </div>

                <table>
                    <tr>
                        <td><label>Avoid Ingredients</label></td>
                        <td><input type="text" class="form-control" name="avIN"></td>
                    </tr>
                    <tr>
                        <td><label>Gender</label></td>
                        <td>
                                <select class="form-control m-b" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Weight</label></td>
                        <td> <input type="text" class="form-control" name="weight"> </td>
                    </tr>
                    <tr>
                        <td><label>Height</label></td>
                        <td><input type="text" class="form-control" name="height"></td>
                    </tr>
                    <tr>
                        <td><label>Provinsi</label></td>
                        <td>
                                <select name="prov" class="" id="province" onchange="loadCities()">
                                    <option value="">Pilih Provinsi</option>
                                    <?php
                                    if ($provinsi !== null) {
                                        foreach ($provinsi as $province) {
                                            $selected = ($province['province_id'] == $selectedProvince) ? 'selected' : '';
                                            echo '<option value="' . $province['province_id'] . '" ' . $selected . '>' . $province['province'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Kota</label></td>
                        <td>
                            <div class="col-lg-8 text-center form-group">
                                <select name="kota" id="city">
                                    <option value="">--Pilih Kota--</option>
                            </div>
                        </td>
                    </tr>
                </table>
                    <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
            </form>
            <div>
                <p class="m-t"><small>Food Ingredients, Website Programming &copy; 2024</small> </p>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
</body>

</html>