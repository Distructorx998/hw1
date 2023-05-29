<?php
    require_once 'auth1.php';
    // Verifica l'esistenza di dati POST
    if (!empty($_POST["password"]) && !empty($_POST["nuovo"]))
    {
        
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $userid=$_SESSION['user_id'];

        if (strlen($_POST["nuovo"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 

        $query = "SELECT * FROM users WHERE id = $userid";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        $entry = mysqli_fetch_assoc($res);
        if (password_verify($_POST['password'], $entry['password'])){
        

         if (password_verify($_POST["password"], $entry['password']) &&$_POST["password"]===$_POST["nuovo"] ){
            $error[] = "Password gia usata";

            }
           

        # REGISTRAZIONE NEL DATABASE
        if (count($error) == 0) {
            $userid=$_SESSION['user_id'];
            $nuovo = mysqli_real_escape_string($conn, $_POST['nuovo']);
           
            $nuovo= password_hash($nuovo, PASSWORD_BCRYPT);

           
             $query = "UPDATE users set password = '$nuovo' where  id=$userid";
             
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: gestione.php");
                exit;
                } else {
                $error[] = "Errore di connessione al Database";
                }
            }
        }
        else {
            $error[] = "La password corrente non corrisponde";
        }

        mysqli_close($conn);
    }
    else if (isset($_POST["password"])) {
        $error = array("Riempi tutti i campi");
    }

?>


<html>

    <head>
        <link rel='stylesheet' href='aggiorna_nome.css'>
        <script src='modifica_password.js' defer></script>

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
            <h1>Modifica password</h1>

            <form name='login' method='post' >
                        
                <div class="password">
                    <label for='password'> Password corrente:</label>
                    <input type='text' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <div><img src="./assets/x-octagon-fill.svg"/><span></span></div>
                </div>

                <div class="nuovo">
                    <label for='nuovo'> Nuova password:</label>
                    <input id= "nuovo" type='text' name='nuovo'<?php if(isset($_POST["nuovo"])){echo "value=".$_POST["nuovo"];} ?>>
                    <div><img src="./assets/x-octagon-fill.svg"/><span>Inserisci almeno 8 lettere</span></div>
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