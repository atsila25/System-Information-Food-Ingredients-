<?php

include 'api.php';

if (isset($_GET['province_id'])) {
    $provinceId = $_GET['province_id'];
    $cities = getCities($provinceId);

    if ($cities !== null) {
        foreach ($cities as $city) {
            echo '<option value="' . $city['city_name'] . '">' . $city['city_name'] . '</option>';
        }
    } else {
        echo '<option value="">--Pilih Kota--</option>';
    }
} else {
    echo '<option value="">--Pilih Kota--</option>';
}
?>
