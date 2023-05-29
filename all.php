<?php 
require_once 'auth1.php';

// Se la sessione è scaduta, esco
if (!checkAuth()) exit;

// Imposto l'header della risposta
header('Content-Type: application/json');

spotify();

function spotify() {
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php';
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}
?>