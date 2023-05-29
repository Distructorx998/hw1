<?php
    require_once 'auth1.php';

    if (!$userid = checkAuth()) exit;

    deck();

    function deck() {
        global $dbconfig, $userid,$id;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        # Costruisco la query
        $userid = mysqli_real_escape_string($conn, $userid);
      
     

        # Eseguo
        $query = "DELETE FROM deck WHERE user=$userid";
        error_log($query);

        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }
    