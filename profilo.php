<?php 
    require_once 'auth1.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
<?php 
        // Carico le informazioni dell'utente loggato per visualizzarle nella sidebar (mobile)
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM users WHERE id = $userid";
		$query1= "SELECT SUM(JSON_VALUE(content,'$.price')) as somma FROM deck;";
        $res_1 = mysqli_query($conn, $query);
		$res_2 = mysqli_query($conn, $query1);
        $userinfo = mysqli_fetch_assoc($res_1);   
		$totale =mysqli_fetch_assoc($res_2);
	
	?>


	<head>
		<title>Yu-Gi-World</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="profilo.css"/> 
		<script src="profilo.js" defer="true"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/core.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/md5.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	</head>
	

	<body>
		<h1 id=yu> <img src="./assets/pngegg.png"><img src="./assets/pngegg.png"> <img src="./assets/pngegg.png">  <img src="./assets/pngegg.png"> <img src="./assets/pngegg.png">  </h1>
		
		<header   >
			<div id="overlay">

				<nav id="barra">
					<a href=hw.php> <button id="home"> Home</button> </a>
					<a href="https://www.yugioh-card.com/eu/it/neuigkeiten/"><button> News </button> </a>
					<button id="deck">Deck</button> 
					<button id="database">Database</button>
					<div id="separator"></div> 
					<a href=gestione.php> <button id="gestione">Info utente</button> </a>
					<div id=user> <?php echo $userinfo['username'] ?> </div>
					<a  href='logout.php' class='button'> <button id="accedi"> Logout</button></a>
				</nav>

		</div>
		</header>	
	
		 <div class="prezzo">  </div> 
		<div id="view">

			

</div>
<form >
<main>

<p id="righe">

</p>

			</main>
			</form>
	
		<article id="modale" class="hidden"> 
		
		</article>
	
		<div id="footer">
    Giuliano Sicali | Viale Andrea Doria, 6, 95125 Catania CT ITALIA| C.F. SCLGLN98L18C351E | N.Matricola 1000014800 <br>
		  <a class="e-mail" href="https://www.google.com/intl/it/gmail/about/">	uni389533@studium.unict</a> | 
      <span>+39 327 9326610</span>
      <div class="social-cont">        
    	  <div class="floatstop"></div>
		  </div>
      <div class="credits">
        <a class="logoUniCT" target="_blank" href="https://www.unict.it/"></a>  
    	</div>
    </div>
	</body>

</html>