<?php 
    require_once 'auth1.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
<?php 
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM users WHERE id = $userid";
        $res_1 = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res_1);   
    ?>
	<head>
		<title>Yu-Gi-World</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="hw.css"/> 
		<script src="a.js" defer="true"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/core.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/md5.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	</head>
	

	<body>
		<h1 id=yu> <img src="./assets/pngegg.png"><img src="./assets/pngegg.png""> <img src="./assets/pngegg.png">  <img src="./assets/pngegg.png"> <img src="./assets/pngegg.png">  </h1>
		
		<header   >
			<div id="overlay">

				<nav id="barra">
					<a  href='hw.php'> <button id="home"> Home</button> </a>
					<button id="about"> About</button>
					<a href="https://www.youtube.com/@TeamSamuraiX1"><button> Tips </button> </a>
					<a href="https://www.yugioh-card.com/eu/it/neuigkeiten/"><button> News </button> </a>
					<a href="https://www.yugioh-card.com/en/limited/"><button>Bannlist</button> </a>
					<div id="separator"></div>
					<a  href='profilo.php'> <button> Profilo</button></a>
                    <a  href='logout.php' class='button'> <button id="accedi"> Logout</button></a>
				</nav>
		
				</div>
		</header>	
			
		


		<div id="view">
			<h1> Yu-Gi-World </h1>
		Benvenuto nel sito web dedicato agli appassionati di Yu-Gi-Oh! Se sei un giocatore di lunga data o un nuovo arrivato nel mondo dei duelli, questo è il posto perfetto per te. Qui potrai trovare un database online che ti permette di salvare tutte le tue carte preferite in un unico luogo, rendendo più facile tenere traccia della tua collezione e organizzare il tuo deck personalizzato.
<br> <br>
Il nostro sito offre una vasta gamma di funzionalità che ti consentono di esplorare, cercare e aggiungere le carte che desideri alla tua raccolta. Potrai cercare le carte per nome, tipo, attributo, livello, archetipo, e molti altri parametri. Ogni carta ha una scheda dettagliata che fornisce tutte le informazioni necessarie, inclusa la descrizione, gli effetti e le statistiche. Puoi anche visualizzare immagini ad alta risoluzione delle carte per ammirarne la bellezza e il design.
<br> <br>
Una delle caratteristiche più interessanti del nostro sito è la possibilità di creare il tuo deck personalizzato. Potrai selezionare le carte dalla tua raccolta salvata nel database e assemblarle in un deck strategico e unico. Potrai sperimentare diverse combinazioni di carte, testare le tue strategie e condividere i tuoi deck con altri giocatori della community.
<br> <br>
Inoltre, il nostro sito offre una sezione dedicata alle ultime notizie, aggiornamenti sul gioco, suggerimenti e guide utili per aiutarti a migliorare le tue abilità di duellante. Potrai partecipare alle discussioni sulla nostra community, condividere le tue esperienze di gioco e ricevere consigli da altri appassionati.
<br> <br>
Che tu sia un giocatore competitivo o un collezionista, il nostro sito ti offre una piattaforma pratica e divertente per gestire le tue carte e creare i tuoi deck personalizzati. Inizia subito a esplorare il nostro database, organizza la tua collezione e preparati per dei duelli emozionanti!
			

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