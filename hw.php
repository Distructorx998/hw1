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
		<script src="hw1.js" defer="true"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/core.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/md5.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	</head>
	

	<body>
		<h1 id=yu> <img src="./assets/pngegg.png"><img src="./assets/pngegg.png"> <img src="./assets/pngegg.png">  <img src="./assets/pngegg.png"> <img src="./assets/pngegg.png">  </h1>
		
		<header   >
			<div id="overlay">

				<nav id="barra">
					<button id="home"> Home</button>
					<a  href='about.php'><button id="about"> About</button> </a>
					<a href="https://www.youtube.com/@TeamSamuraiX1"><button> Tips </button> </a>
					<a href="https://www.yugioh-card.com/eu/it/neuigkeiten/"><button> News </button> </a>
					<a href="https://www.yugioh-card.com/en/limited/"><button>Bannlist</button> </a>
					<div id="separator"></div> 
					<a  href='profilo.php'> <button> Profilo</button></a>
                    <a  href='logout.php' class='button'> <button id="accedi"> Logout</button></a>
				</nav>
		<form name ='search_content' id='search'>
			<label>Cerca: <input type='text' name = 'content' id ='content'></label>	
			<select name = 'tipo' id='tipo'>
				<option value='nome'>Nome</option>
				<option value='tipologia'>Tipologia</option>
				<option value='tipo'>Tipo</option>
				<option value='attributo' >Attributo</option>
				<option value='lv'>LV</option>
				<option value='arche'>Archetipo</option>


			</select>
			
			<label>&nbsp;<input class="submit" type='submit'></label>
		</div>
		</header>	
			
		


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