<?php

$ekspedisi = $_POST["ekspedisi"];
$kota = $_POST["kota"];
$berat = $_POST["berat"];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=501&destination=" . $kota . "&weight=" . $berat . "&courier=" . $ekspedisi,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
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

    $paket = $array_response["rajaongkir"]["results"][0]["costs"];

    echo "<option value=''>--Pilih Paket--</option>";
    foreach ($paket as $tiap_paket) {
        echo "<option 
        paket='" . $tiap_paket['service'] . "'
        ongkir='" . $tiap_paket["cost"][0]["value"] . "'
        etd='" . $tiap_paket["cost"][0]["etd"] . "'>";

        echo $tiap_paket["service"] . " " . number_format($tiap_paket["cost"][0]["value"]) . " " . $tiap_paket["cost"][0]["etd"];
        echo "</option>";
    }
}
?>
