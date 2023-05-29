<?php
    require_once 'auth1.php';
    if (!$userid = checkAuth()) exit;

    deck();

    function deck() {
        global $dbconfig, $userid;

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        
        # Costruisco la query
        $userid = mysqli_real_escape_string($conn, $userid);
        $nome = mysqli_real_escape_string($conn, $_GET['nome']);
        $cod = mysqli_real_escape_string($conn, $_GET['cod']);
        $price = mysqli_real_escape_string($conn, $_GET['price']);
        $rarity = mysqli_real_escape_string($conn, $_GET['rarity']);
        $immagine = mysqli_real_escape_string($conn, $_GET['immagine']);

        # Eseguo
        $query = "INSERT INTO elenco (user ,cod, content)
        VALUES('$userid','$cod', JSON_OBJECT( 'name', '$nome','cod', '$cod', 'rarity', '$rarity', 'price', '$price','image','$immagine'))";
        error_log($query);
        # Se corretta, ritorna un JSON con {ok: true}
        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }