<?php 
    require_once 'auth1.php';
    if (!$userid = checkAuth()) {
        header("Location: profilo.php");
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
		<link rel="stylesheet" href="gestione.css"/> 
		<script src="gestione.js" defer="true"></script>
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
                    <a href=profilo.php> <button id="profilo"> Profilo</button> </a>									
					<a  href='logout.php' class='button'> <button class="accedi"> Logout</button></a>
				</nav>
		

                <div id=view>
                   <p id=info>Informazioni Utente:</p> 
                    <div id="flex"> <div class="a"> Nome Utente </div>
                        <div class="b"> <?php echo $userinfo['name']." ".$userinfo['surname'] ?>  </div> 
                        <div class ="c">   </div>
                    </div>

                    <div id="flex"> <div class="a"> User-ID </div>
                        <div class="b" id="id"> <?php echo $userinfo['id'] ?>  </div> 
                        <div class ="c">  </div>
                    </div>
                    
                    <div id="flex"> <div class="a"> Username </div>
                        <div class="b" id="username"> <?php echo $userinfo['username'] ?>  </div> 
                        <div class ="c"><a href="aggiorna_nome.php"> <img id= "usernameID" src="./assets/caret-right.svg">   </img> </a> </div>
                    </div>
              

                    <div id="flex"> <div class="a"> Email </div>
                        <div class="b"> <?php echo $userinfo['email'] ?>  </div> 
                        <div class ="c"> <a href="modifica_email.php"><img  src="./assets/caret-right.svg"> </a> </div>
                    </div>
              
                    <div id="flex"> <div class="a"> Password </div>
                        <div class="b"> <img  src="./assets/three-dots.svg"><img  src="./assets/three-dots.svg"><img  src="./assets/three-dots.svg">  </div> 
                        <div class ="c"> <a href="modifica_password.php"><img  src="./assets/caret-right.svg"> </a> </div>
                    </div>
              
                    <div id="flex"> <div class="d"> Elimina Utente </div>
                    <div class="b">   </div> 
                    <div class ="c"><button id="accedi"> Elimina </button>   </div>

                    </div>
            </div>
		</div>
       
		</header>	

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