<?php 
   
    require_once 'auth1.php';
    if (!$userid = checkAuth()) exit;

    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $userid = mysqli_real_escape_string($conn, $userid);


		$query= "SELECT SUM(JSON_VALUE(content,'$.price')) as somma FROM elenco where user=$userid ";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $totale = array();
    while($entry = mysqli_fetch_assoc($res)) {
        // Scorro i risultati ottenuti e creo l'elenco di post
        $totale[] = array('somma' => $entry['somma'],
                            //'content' => json_decode($entry['content'])
                        );
    }
    echo json_encode($totale);
    
    exit;


?>