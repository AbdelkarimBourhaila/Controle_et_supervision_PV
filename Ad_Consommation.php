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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISESE </title>
    <script src="https://kit.fontawesome.com/c384c2e227.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c384c2e227.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style>
        body {
            padding: 0;
            margin: 0;
        }

        .topnav {
            overflow: hidden;
            background-color: #0c6980;
            color: white;
            font-size: 1.2rem;
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

    </style>

</head>

<body>
    <div class="topnav">
        <center>
            <h2>Partie Consommation</h2>
        </center>
    </div>


    <div style="display: grid;grid-template-columns: repeat(3,1fr);grid-template-rows: repeat(1,1fr);margin-top:7rem;width:60rem;margin-left:10rem;">
        <!------------------------------------------------->
        <div style="border-radius: 10px;width: 16rem;color: white;box-shadow: .1rem .1rem 1rem black;border:1px solid blue;height:15rem">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                    <center>Valeur Actuelle</center>
                </h3>
                <br> 
            </div>

            <div style="padding:1rem; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(6,1fr);gap:1rem;text-align: center;">
               
            
            <div id="courant_c-value" style="margin-left:-1.4rem;position:relative">
                    <span style="color: darkgoldenrod;"> <i class="fa-solid fa-bolt"></i> Courant(I) : </span> 
                    <span id="courant_c" style="margin-left: 3.3rem;color:black; padding-left: 15px;"><span style="padding-right:1.3rem;margin-left:-.5rem;"> {{ get_latest_courant_c  }}  </span> A</span>
                </div>

                <div id="tension_c-value" style="margin-left:-1rem;position:relative">
                    <span style="color: blueviolet;margin-left:-.1rem"> <i class="fa-solid fa-charging-station"></i> Tension(V) : </span>
                    <span id="tension_c" style="margin-left: 3.4rem;color:black"><span style="padding-right:1.2rem;margin-left:-.5rem;"> {{ get_latest_tension_c  }} </span> V</span>
                </div>

                <div id="puissance_c-value" style="margin-left:-1rem;position:relative">
                    <span style="color: cornflowerblue;margin-left:-7rem"> <i class="fa-brands fa-superpowers"></i> Puissance(P) : </span>
                    <span id="puissance_c" style="margin-left: 1.7rem;color:black;margin-left:1.6rem;position:absolute "><span style="padding-right:1.2rem;margin-left:1rem;">{{ get_latest_puissance_c }} </span> W</span>
                </div>
            </div>
        </div>

        <!------------------------------------------------->
        <div style="border-radius: 10px;color: white;height:15rem;width: 16rem;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                    <center>Base de données</center>
                </h3>
<br>
            </div>
            <div style="padding:1rem ; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(4,1fr);gap:1rem;">


                <div style="text-align: center;">
                    <span style="color: darkgoldenrod;"> I : </span><span style="margin-left: 3.99rem;">
                        <a href="Ad_C_Affichage_BD_I.php"><button>Ouvrier la table</button> </a> </span>
                </div>

                <div style="text-align: center;">
                    <span style="color:blueviolet"> V : </span><span style="margin-left: 3.7rem;">
                        <a href="Ad_C_Affichage_BD_V.php"><button>Ouvrier la table</button> </a> </span>
                </div>


                <div style="text-align: center;">
                    <span style="color:cornflowerblue"> P : </span><span style="margin-left: 3.7rem;"><a href="Ad_C_Affichage_BD_P.php"><button>Ouvrier la table</button> </a> </span>
                </div>

            </div>
        </div>



        <!------------------------------------------------->
        <div style="border-radius: 10px;height:15rem;color: white;width: 16rem;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
            
                <h3 style="background-color:#0c6980;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                    <center>Graphes</center>
                </h3>
            </div>
<br>
            <div>
                <div style="padding:1rem; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(7,1fr);gap:1rem;">
                    <div style="text-align: center;">
                        <span style="color: darkgoldenrod;"> <i class="fa-solid fa-bolt"></i> Courrant(I) : </span>
                        <span style="margin-left: 4.8rem;">
                            <a href="Ad_C_Affichage_Graphe_I.php"><button>Btn</button> </a></span>
                    </div>

                    <div style="text-align: center;">
                        <span style="color: blueviolet;"> <i class="fa-solid fa-charging-station"></i> Tension(V) :
                        </span><span style="margin-left: 4.6rem;">
                            <a href="Ad_C_Affichage_Graphe_V.php"><button>Btn</button> </a></span>
                    </div>

                    <div style="text-align: center;">
                        <span style="color: cornflowerblue;"> <i class="fa-brands fa-superpowers"></i> Puissance(P) : </span><span style="margin-left: 4.2rem;">
                            <a href="Ad_C_Affichage_Graphe_P.php"><button>Btn</button> </a></span>
                    </div>

                    <div></div>

                </div>
            </div>
        </div>


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


    <script>
  $(document).ready(function() {
    function getLatestTemperature() {
      $.ajax({
        url: 'get_latest_temperature.php',
        success: function(data) {
          $('#temperature').html(data + ' °C');
        }
      });
    }

    setInterval(getLatestTemperature, 5000);
  });

  $(document).ready(function() {
    function getLatestHumidity() {
      $.ajax({
        url: 'get_latest_humidity.php',
        success: function(data) {
          $('#humidity').html(data + ' %');
        }
      });
    }

    setInterval(getLatestHumidity, 5000);
  });

  $(document).ready(function() {
    function getLatestCourant_c() {
      $.ajax({
        url: 'get_latest_courant_c.php',
        success: function(data) {
          $('#courant_c').html(data + ' A');
        }
      });
    }

    setInterval(getLatestCourant_P, 5000);
  });

  $(document).ready(function() {
    function getLatestCourant_C() {
      $.ajax({
        url: 'get_latest_courant_c.php',
        success: function(data) {
          $('#courant_c').html(data + ' A');
        }
      });
    }

    setInterval(getLatestCourant_C, 5000);
  });

  $(document).ready(function() {
    function getLatestTension_P() {
      $.ajax({
        url: 'get_latest_tension_p.php',
        success: function(data) {
          $('#tension_p').html(data + ' V');
        }
      });
    }

    setInterval(getLatestTension_P, 5000);
  });

  $(document).ready(function() {
    function getLatestTension_C() {
      $.ajax({
        url: 'get_latest_tension_c.php',
        success: function(data) {
          $('#tension_c').html(data + ' V');
        }
      });
    }

    setInterval(getLatestTension_C, 5000);
  }); 
  
  $(document).ready(function() {
    function getLatestPuissance_P() {
      $.ajax({
        url: 'get_latest_puissance_p.php',
        success: function(data) {
          $('#puissance_p').html(data + ' W');
        }
      });
    }

    setInterval(getLatestPuissance_P, 5000);
  }); 

  $(document).ready(function() {
    function getLatestPuissance_C() {
      $.ajax({
        url: 'get_latest_puissance_c.php',
        success: function(data) {
          $('#puissance_c').html(data + ' W');
        }
      });
    }

    setInterval(getLatestPuissance_C, 5000);
  }); 

  $(document).ready(function() {
    function getLatestEclairage() {
      $.ajax({
        url: 'get_latest_eclairage.php',
        success: function(data) {
          $('#eclairage').html(data + ' Lux');
        }
      });
    }

    setInterval(getLatestEclairage, 5000);
  });
</script>



</body>


</html>