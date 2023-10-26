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
    <title>ISESE </title>
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
            <h2>Partie Production</h2>
        </center>
    </div>


    <div style="display: grid;grid-template-columns: repeat(3,1fr);grid-template-rows: repeat(1,1fr);margin-top:7rem;width:60rem;margin-left:10rem">
        <!------------------------------------------------->
        <div style="border-radius: 10px;width: 16rem;color: white;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;
">
                    <center>Valeur Actuelle</center>
                </h3>
            </div>

            <div style="padding:1rem; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(6,1fr);gap:.6rem;text-align: center;">
                
            
                <div id="courant_p-value" style="margin-left:-1.4rem;position:relative">
                    <span style="color: darkgoldenrod;"> <i class="fa-solid fa-bolt"></i> Courant(I) : </span> 
                    <span id="courant_p" style="margin-left: 3.3rem;color:black; padding-left: 15px;"><span style="padding-right:1.3rem;margin-left:-.5rem;"> {{ get_latest_courant_p  }}  </span> A</span>
                </div>

                <div id="tension_p-value" style="margin-left:-1rem;position:relative">
                    <span style="color: blueviolet;margin-left:-.1rem"> <i class="fa-solid fa-charging-station"></i> Tension(V) : </span>
                    <span id="tension_p" style="margin-left: 3.4rem;color:black"><span style="padding-right:1.2rem;margin-left:-.5rem;"> {{ get_latest_tension_p  }} </span> V</span>
                </div>

                <div id="puissance_p-value" style="margin-left:-1rem;position:relative">
                    <span style="color: cornflowerblue;margin-left:-7rem"> <i class="fa-brands fa-superpowers"></i> Puissance(P) : </span>
                    <span id="puissance_p" style="margin-left: 1.7rem;color:black;margin-left:1.6rem;position:absolute "><span style="padding-right:1.2rem;margin-left:1rem;">{{ get_latest_puissance_p }} </span> W</span>
                </div>


                <div id="temperature-value" style="margin-left:-.4rem">
                    <span style="color:coral;margin-left:-.4rem"> <i class="fa-solid fa-temperature-half"></i> Température(T) :</span>
                    <span id="temperature" style="margin-left: 1rem;color:black"><span style="padding-right:1.2rem">{{ get_latest_temperature }}</span> °C</span>
                </div>

                
                <div id="humidity-value" style="margin-left:-1rem">
                    <span style="color:blue"> <i class="fa-solid fa-droplet"></i> Hummidity(H) : </span>
                    <span id="humidity" style="color: black; padding-left: 35px;"> <span style="margin-left:1.5rem" >{{ get_latest_hummidity }}</span> %</span>
                </div>


                <div id="eclairage-value" style="text-align: center;">
                    <div style="color: darkcyan;"><i class="fa-regular fa-lightbulb" style="color: darkcyan;margin-right: -5px;margin-left: -5px;"></i>
                        <span style="margin-left: 5px; color: darkcyan;">luminosité(Lux) :</span>
                        <span id="eclairage" style="color: black; padding-left: 12px;"> <span style="margin-left:1.5rem"> {{ get_latest_eclairage }} </span>Lux</span> 
                    </div>
                </div>


            </div>
        </div>

        <!------------------------------------------------->
        <div style="border-radius: 10px;color: white;width: 16rem;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;
">
                    <center>Base de données</center>
                </h3>
            </div>
            <div style="padding:1rem ; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(4,1fr);gap:1.5rem;">


                <div style="text-align: center;">
                    <span style="color: darkgoldenrod;"> I/V : </span><span style="margin-left: 3rem;">
                        <a href="Ad_P_Affichage_BD_I_V.php"><button>Ouvrier la table</button> </a> </span>
                </div>


                <div style="text-align: center;">
                    <span style="color:blue"> P : </span><span style="margin-left: 3.7rem;"><a href="Ad_P_Affichage_BD_P.php"><button>Ouvrier la table</button> </a> </span>
                </div>

                <div style="text-align: center;">
                    <span style="color:coral"> T/H : </span><span style="margin-left: 2.6rem;">
                        <a href="Ad_P_Affichage_BD_T_H.php"><button>Ouvrier la table</button> </a> </span>
                </div>





                <div style="text-align: center;">
                    <span style="color:darkcyan"> Lux : </span><span style="margin-left: 2.7rem;">
                        <a href="Ad_P_Affichage_BD_Lux.php"><button>Ouvrier la table</button> </a> </span>
                </div>


            </div>
        </div>



        <!------------------------------------------------->
        <div style="border-radius: 10px;color: white;width: 16rem;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                    <center>Graphes</center>
                </h3>
            </div>

            <div>
                <div style="padding:1rem; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(7,1fr);gap:.4rem;">
                    <div style="text-align: center;">
                        <span style="color: darkgoldenrod;"> <i class="fa-solid fa-bolt"></i> Courrant(I) : </span>
                        <span style="margin-left: 4.8rem;">
                            <a href="Ad_P_Affichage_Graphe_I.php"><button>Btn</button> </a></span>
                    </div>

                    <div style="text-align: center;">
                        <span style="color: blueviolet;"> <i class="fa-solid fa-charging-station"></i> Tension(V) :
                        </span><span style="margin-left: 4.6rem;">
                            <a href="Ad_P_Affichage_Graphe_V.php"><button>Btn</button> </a></span>
                    </div>

                    <div style="text-align: center;">
                        <span style="color: cornflowerblue;"> <i class="fa-brands fa-superpowers"></i>  Puissance(P) : </span><span style="margin-left: 4.2rem;">
                            <a href="Ad_P_Affichage_Graphe_P.php"><button>Btn</button> </a></span>
                    </div>

                    <div style="text-align: center;">
                        <span style="color:coral"> <i class="fa-solid fa-temperature-half"></i> Température(T) :
                        </span><span style="margin-left: 3rem;"> <a href="Ad_P_Affichage_Graphe_T.php"><button>Btn</button> </a></span>
                    </div>

                    <div style="text-align: center;">
                        <span style="color:blue"> <i class="fa-solid fa-droplet"></i> Hummidity(H) : </span><span style="margin-left: 3.2rem;"> <a href="Ad_P_Affichage_Graphe_H.php"><button>Btn</button> </a></span>
                    </div>

                    <div style="text-align: center;">
                        <span style="color:darkcyan">
                            <i class="fa-regular fa-lightbulb" style="color: darkcyan;margin-right: -2px;"></i>
                            luminosité(Lux) : </span>
                        <span style="margin-left: 2.9rem;">
                            <a href="Ad_P_Affichage_Graphe_Lux.php">
                                <button>Btn</button>
                            </a>
                        </span>
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



    <!-- code____js ___valeur_______________actuelle -->
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
    function getLatestCourant_P() {
      $.ajax({
        url: 'get_latest_courant_p.php',
        success: function(data) {
          $('#courant_p').html(data + ' A');
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