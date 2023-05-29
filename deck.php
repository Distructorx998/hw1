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
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $price = mysqli_real_escape_string($conn, $_GET['price']);
        $rarity = mysqli_real_escape_string($conn, $_GET['rarity']);
        $immagine = mysqli_real_escape_string($conn, $_GET['immagine']);
        
        
        $query = "SELECT * FROM deck WHERE JSON_VALUE(content,'$.name') = '$nome' and user= $userid ";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if(mysqli_num_rows($res) >= 3) {
            echo json_encode(array('errore' => 'Hai raggiunto il limite di copie per questa carta'));
            exit ;   }

            $query = "SELECT * FROM deck WHERE  user= $userid ";
            $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if(mysqli_num_rows($res) >= 60) {
                echo json_encode(array('errore' => 'Deck gia al completo'));
                exit ;   }    

        $query = "INSERT INTO deck (user, id ,cod , content)
        VALUES('$userid','$id','$cod', JSON_OBJECT( 'name', '$nome','cod', '$cod', 'rarity', '$rarity', 'price', '$price','image','$immagine'))";
        error_log($query);

        if(mysqli_query($conn, $query) or die(mysqli_error($conn))) {
            echo json_encode(array('ok' => true));
            exit;
        }

        mysqli_close($conn);
        echo json_encode(array('ok' => false));
    }