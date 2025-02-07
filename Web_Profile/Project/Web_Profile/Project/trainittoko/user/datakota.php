<?php

$id_provinsi_terpilih = $_POST["id_provinsi"];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: cc67c7abf1184c3ef10dc1479df69999"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $array_response = json_decode($response, TRUE);
    $data_kota = $array_response["rajaongkir"]["results"];

    echo "<option value=''>--Pilih Kota--</option>";

    foreach ($data_kota as $tiap_kota) {
        echo "<option value='' 
                id_kota='" . $tiap_kota["city_id"] . "'
                nama_provinsi='" . $tiap_kota["province"] . "'
                nama_kota='" . $tiap_kota["city_name"] . "'
                tipe_kota='" . $tiap_kota["type"] . "'
                kodepos='" . $tiap_kota["postal_code"] . "'>";
        echo $tiap_kota["type"] . " " . $tiap_kota["city_name"];
        echo "</option>";
    }
}
?>