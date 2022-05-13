<?php

// $pengirim   = "154"; // Jakarta Timur
$pengirim   = "444"; // Kota Surabaya
$ekspedisi  = $_POST['ekspedisi'];
$distrik    = $_POST['distrik'];
$berat      = $_POST['berat'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$pengirim&destination=$distrik&weight=$berat&courier=$ekspedisi",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    // Silahkan gunakan api key masing masing dari raja ongkir
    "key: 1b445e8be72e3c7d8b36246e7a6b0683"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
  
  // Dijadikan ke array
  $array_response = json_decode($response, TRUE);
  
  $paket = $array_response['rajaongkir']['results']['0']['costs'];

  // echo "<pre>";
  // print_r($paket);
  // echo "</pre>";

  echo "<option value=''>--Pilih Jenis Pengiriman--</option>";

  foreach($paket as $key => $tiap_paket){
    echo "<option paket='".$tiap_paket['service']."' ongkir='".$tiap_paket['cost']['0']['value']."' etd='".$tiap_paket['cost']['0']['etd']."'>";
    echo $tiap_paket['service']." ";
    echo "Rp".number_format($tiap_paket['cost']['0']['value'],0,',','.').",00 - [Durasi Pengiriman: ";
    echo $tiap_paket['cost']['0']['etd']."]";
    echo "</option>";
  }

}