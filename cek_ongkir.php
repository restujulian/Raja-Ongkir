<?php
	$asal = $_POST['asal'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "originType=city&origin=501&destinationType=city&destination={$id_kabupaten}&weight=1000&courier=jne",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key: 75f538ed88e26297a2fabed240ed8bf0"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  /*echo $response;*/
	  $json = json_decode($response);
/*	  $diskon = $json->rajaongkir->results[0]->costs[0]->cost[0]->value - ($json->rajaongkir->results[0]->costs[0]->cost[0]->value * 0.3);
	  echo $diskon;*/
	  echo $json->rajaongkir->results[0]->costs[0]->cost[0]->value;
		/*echo $json->rajaongkir->results[0]->name;*/
	}
	
?>