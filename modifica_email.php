<?php
    require_once 'auth1.php';
/*
    if (checkAuth()) {
        header("Location: hw.php");
        exit;
    }   
*/
    // Verifica l'esistenza di dati POST
    if (!empty($_POST["email"]) && !empty($_POST["nuovo"]))
    {
        
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $userid=$_SESSION['_agora_user_id'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $nuovo = mysqli_real_escape_string($conn, $_POST['nuovo']);

         # EMAIL
         if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$nuovo'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }
        $query = "SELECT email FROM users WHERE email = '$email' and id = $userid ";
        $res = mysqli_query($conn, $query) ;
        # if song is already present, do nothing
        if(mysqli_num_rows($res) !=1 ) {
            $error[] = "Email non coincide con quello attuale";
          }


        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
           
             $query = "UPDATE users set email = '$nuovo' where  id=$userid";
             
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: gestione.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>


<html>

    <head>
        <link rel='stylesheet' href='aggiorna_nome.css'>
        <script src='aggiorna_nome.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta charset="utf-8">

        <title>Modifica Username </title>
    </head>
    <body>
        <div id="logo">
            Yu-Gi-World
        </div>
        <div id="sfondo">
        <div id="overlay">
        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Modifica Email</h1>
          
            <form name='login' method='post' >
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                <div class="email">
                    <label for='email'> Email corrente:</label>
                    <input id='email' type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <div><img src="./assets/x-octagon-fill.svg"/><span></span></div>
                </div>

                <div class="nuovo">
                    <label for='nuovo'> Email nuova:</label>
                    <input id='nuovo' type='text' name='nuovo' <?php if(isset($_POST["nuovo"])){echo "value=".$_POST["nuovo"];} ?>>
                    <div><img src="./assets/x-octagon-fill.svg"/><span></span></div>
                </div>
                    <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><img src='./assets/x-octagon-fill.svg'/><span>".$err."</span></div>";
                    }
                } ?>
                <div class="submit">
                    <input type='submit' value="Modifica" id="submit">
                </div>
            </form>
        </section>
        </main>
        </div>
        </div>
    </body>
</html>