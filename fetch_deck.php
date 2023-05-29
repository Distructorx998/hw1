<?php 
    require_once 'auth1.php';
    if (!$userid = checkAuth()) exit;

    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $userid = mysqli_real_escape_string($conn, $userid);


     $query = "SELECT user,id,content from deck where user = $userid order by content";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    $deckArray = array();
    while($entry = mysqli_fetch_assoc($res)) {

        $deckArray[] = array('user' => $entry['user'],'id' => $entry['id'],                                
                            'content' => json_decode($entry['content']));
    }
    echo json_encode($deckArray);
    
    exit;


?>