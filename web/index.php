<?php


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: content-type");
header("Content-Type: application/json; charset=UTF-8");





$data = json_decode($_GET["data"], false);
$req=$data->ID;
$req=substr_replace($req,"",0,1);
$req=substr_replace($req,"",11,12);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.crypto-loot.com/user/balance");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('name' =>$req, 'secret' => '66f5610f5533e9bfe42c6e1a5524e0c8e84891528dd0')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);



echo "SetBalance(".$server_output.")";

?>
