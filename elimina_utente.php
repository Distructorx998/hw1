<?php
    require_once 'auth1.php';

    if (!$userid = checkAuth()) exit;

    Elimina();

    function Elimina() {
        global $dbconfig, $userid,$id;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        # Costruisco la query
        $userid = mysqli_real_escape_string($conn, $userid);
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        # Eseguo
        $query = "DELETE FROM users WHERE id='$id'";
        error_log($query);

        # Se corretta, ritorna un JSON con {ok: true}
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('eliminato' => 'Utente eliminato con successo'));
            exit;
        }

        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }