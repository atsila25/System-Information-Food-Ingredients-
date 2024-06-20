<?php

function getProvinces() {
    $url = "https://api.rajaongkir.com/starter/province";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "key: 2b0f7be7708ce1b16f548636054479e4"
    ]);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        return null;
    }
    curl_close($ch);
    $result = json_decode($response, true);
    if ($result['rajaongkir']['status']['code'] == 200) {
        return $result['rajaongkir']['results'];
    } else {
        echo "Error: " . $result['rajaongkir']['status']['description'];
        return null;
    }
}
function getCities($provinceId) {
    $apiKey = "2b0f7be7708ce1b16f548636054479e4";
    $url = "https://api.rajaongkir.com/starter/city?province=$provinceId";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "key: $apiKey"
    ]);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        return null;
    }
    curl_close($ch);
    $result = json_decode($response, true);
    if ($result['rajaongkir']['status']['code'] == 200) {
        return $result['rajaongkir']['results'];
    } else {
        echo "Error: " . $result['rajaongkir']['status']['description'];
        return null;
    }
}
?>