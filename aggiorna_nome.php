<?php
    require_once 'auth1.php';

    if (!empty($_POST["username"]) && !empty($_POST["nuovo"]))
    {
        
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $userid=$_SESSION['user_id'];
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['nuovo'])) {
            $error[] = "Username non valido";
        } else {
            $nuovo = mysqli_real_escape_string($conn, $_POST['nuovo']);
            $query = "SELECT username FROM users WHERE username = '$nuovo'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }

        $query = "SELECT username FROM users WHERE username = '$username' and id = $userid ";
        $res = mysqli_query($conn, $query) ;
        if(mysqli_num_rows($res) !=1 ) {
            $error[] = "Username non coincide con quello attuale";
          }


        if (count($error) == 0) {
           
             $query = "UPDATE users set username = '$nuovo' where  id=$userid";
             
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
            <h1>Modifica Username</h1>
          
            <form name='login' method='post' >
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                            i valori precedentemente inseriti -->
                <div class="username">
                    <label for='username'> Username corrente:</label>
                    <input id='username' type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    <div><img src="./assets/x-octagon-fill.svg"/><span></span></div>
                </div>

                <div class="nuovo">
                    <label for='nuovo'> Username nuovo:</label>
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