<!-- Code php pour session et mot de pass -->

				<?php 
				session_start(); 

				if (!isset($_SESSION['username'])) {
					$_SESSION['msg'] = "You must log in first";
					header('location: Ad_login.php');
				}
				if (isset($_GET['logout'])) {
					session_destroy();
					unset($_SESSION['username']);
					header("location: Ad_login.php");
				}
				?>

<!DOCTYPE html>  

	<head>	
		<meta charset="utf-8"/>
		<title>ISESE</title>

		<style>

		body {   
		background-color:#ffffff;
		margin:auto;
		width:fit-content;
		font-size: 100% ;         
			}

		h1{
		text-align: center;
		color:#ffffff;
		background-color: #0c6980;
		border-radius: 10px;
		font-size: 2em;
		width: fit-content;
		height: 50px;
		padding: 10px 20px 10px 20px;
		margin:  0px auto;
		border: 2px solid black;
		margin-top: 40px;
		text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;
		}

		h5{
		text-align: center;
		color:white;
		margin:  0rem -10rem 0rem -10rem;
		padding: 0px 0px 10px 0px;
		font-size: 14px;
		background-color: #0c6980;
		font-size: 1rem;
		text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;
		}

		#welcome{
		position: absolute;
		top: -20px;
		left: 5px;
		text-align: center;
		color:white;
		background-color: black;
		padding: 10px 20px 10px 20px;
		margin:  0px auto;
		border: 2px solid black;
		margin-top: 40px;
		border-radius: 10px;

		}


		#logout{
		position: absolute;
		text-decoration: underline;
		top: -20px;
		left: 1090px;
		text-align: center;
		color:white;
		background-color: black;
		padding: 10px 20px 10px 20px;
		margin:  0px auto;
		border: 2px solid black;
		margin-top: 40px;
		border-radius: 10px;
		}

		.zoom{
		width: 25rem;
		height: 7rem ;
		text-align: center;
		padding-bottom: 12rem;
		background-color: rgb(240, 240, 245);
		color: rgb(0, 0, 0);
		padding:3rem 1rem;
		font-size: 30px;
		font-weight:600 ;
		border: 2px solid black;
		border-radius: 40px;
		}

		p{
		position: relative;
		top: 30%;
		left: 0%;
		}

		.zoom:hover{
		text-align: center;
		background-color: rgb#0c6980;
		color: #0c6980;
		transform: scale(1.02);
		}

		*{
		padding: 0;
		margin: 0;
		}

		a{
		text-decoration: none;
		}
		.mainContent {
		display:grid;
		grid-template-columns: repeat(2,1fr);
		grid-template-rows: repeat(1,1fr);
		gap:5rem;
		margin-top: 2.5rem;
		}

    </style>
	</head>

	<body>
	<div >
        <center>
            <h5>
				Université Hassan 1er  <br>
				Faculté des Sciences et techniques Settat <br>
				Cycle Ingénieur : Ingénierie des systèmes électriques et systèmes embarqués <br>
				Module : Développement de projets professionnels  
			</h5>
        </center>
    </div>
<br>
		<h1 > Plateforme de contrôle d'un PPV </h1>
			<div class="mainContent" >  
           <a href="Ad_Production.php" > 
				<div  class="zoom"  > <p>Production</p> </div></a>
           <a href="Ad_Consommation.php"> 
				<div class="zoom" > <p>Consommation</p></div></a>
				</div>
<!-- code de session + affichag nom utilisateur + logaut -->
		<div class="content">
			<!-- notification message -->
			<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
				<?php 
					echo $_SESSION['success']; 
					unset($_SESSION['success']);
				?>
				</h3>
			</div>
			<?php endif ?>

			<!-- logged in user information -->
			<?php  if (isset($_SESSION['username'])) : ?>
				<p id="welcome">Bienvenue <strong><?php echo $_SESSION['username']; ?></strong></p>
				<p id="logout"> <a  href="Ad_Login_index.php?logout='1'" style="color: white;">Déconnexion</a> </p>
			<?php endif ?>
		</div>
	<!-- FIIIN code de session + affichag nom utilisateur + logaut  -->
	</body>
<html>