<?php 

require_once 'auth1.php';

if (!checkAuth()) exit;

header('Content-Type: application/json');

spotify();

function spotify() {
    $query = urlencode($_GET["race"]);
    $curl  = curl_init();
    $url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?race='.$query;
    curl_setopt($curl, CURLOPT_URL, $url );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    $json = json_decode($result, true);
    curl_close($curl);
    echo $result;
}
?>