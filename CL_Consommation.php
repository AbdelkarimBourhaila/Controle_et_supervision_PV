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
font-size:16px;
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
font-size:16px;
margin:  0px auto;
border: 2px solid black;
margin-top: 40px;
border-radius: 10px;
} 

p {font-size: 1.2rem;}
      h4 {font-size: 0.8rem;}
      body {margin: 0;}
      .content {padding: 5px; }
      .card {background-color: white; box-shadow: 0px 0px 10px 1px rgba(140,140,140,.5); border: 1px solid #0c6980; border-radius: 15px;}
      .card.header {background-color: #0c6980; color: white; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 12px; border-top-left-radius: 12px;}
      .cards {max-width: 700px; margin: 0 auto; display: grid; grid-gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));}
      .reading {font-size: 1.3rem;}
      .packet {color: #bebebe;}
      .temperatureColor {color: #fd7e14;}
      .humidityColor {color: #1b78e2;}
      .statusreadColor {color: #702963; font-size:12px;}
      .LEDColor {color: #183153;}

      /* ----------------------------------- Toggle Switch */
      .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
      }

      .switch input {display:none;}

      .sliderTS {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #D3D3D3;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
      }

      .sliderTS:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: #f7f7f7;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
      }

      input:checked + .sliderTS {
        background-color: #00878F;
      }

      input:focus + .sliderTS {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .sliderTS:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      .sliderTS:after {
        content:'OFF';
        color: white;
        display: block;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 70%;
        font-size: 10px;
        font-family: Verdana, sans-serif;
      }

      input:checked + .sliderTS:after {  
        left: 25%;
        content:'ON';
      }

      input:disabled + .sliderTS {  
        opacity: 0.3;
        cursor: not-allowed;
        pointer-events: none;
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
        <div style="border-radius: 10px;width: 16rem;color: white;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                    <center>Valeur Actuelle</center>
                </h3>
                <br> 
            </div>
            

            <div style="padding:1rem; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(1,1fr);gap:2.8rem;text-align: center;">
                
            
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
       
        <!------------------------------------------------->
        <div style="border-radius: 10px;color: white;width: 16rem;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;
">
                    <center>Controle</center>
                </h3>
            </div>
            <div style="padding:.1rem ;text-align: center; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(1,1fr);gap:-1.5rem;">


     


<div style="margin-top:-1rem">
<br><br>
             <!-- Buttons for controlling the LEDs on Slave 2. ************************** -->
          <!-- <h4 class="LEDColor"><i class="fas fa-lightbulb"></i> Lampe</h4>
          <label class="switch">
            <input type="checkbox" id="ESP32_01_TogLED_01" onclick="GetTogBtnLEDState('ESP32_01_TogLED_01')">
            <div class="sliderTS"></div>
          </label>
          </div>

          <div>  <h4 class="LEDColor"><i class="fas fa-lightbulb"></i>Chargeur USB</h4>
          <label class="switch">
            <input type="checkbox" id="ESP32_01_TogLED_02" onclick="GetTogBtnLEDState('ESP32_01_TogLED_02')">
            <div class="sliderTS"></div>
          </label>
          </div>
          <div>
          <br><br><br> -->

          <h4 class="LEDColor"><i class="fas fa-lightbulb"></i> Charge_1</h4>
    <button onclick="updateDatabase(0, 'LED_02')">Éteindre</button>
    <button onclick="updateDatabase(1, 'LED_02')">Allumer</button>

    <h4 class="LEDColor"><i class="fas fa-lightbulb"></i> Charge_2</h4>
    <button onclick="updateDatabase(0, 'LED_02')">Éteindre</button>
    <button onclick="updateDatabase(1, 'LED_02')">Allumer</button>
     <!-- PLUS LED3 66666666666666666666666666-->

          </div>



            </div>
        </div>




        <!------------------------------------------------->
        <div style="border-radius: 10px;width: 16rem;color: white;box-shadow: .1rem .1rem 1rem black;border:1px solid blue">
            <div style="margin-top: -1.2rem;">
                <h3 style="background-color:#0c6980;text-shadow: 2px 0 0 black, 0 2px 0 black, 0 -2px 0 black, -2px 0 0 black, 2px 2px 0 black, 2px -2px 0 black, -2px 2px 0 black, -2px -2px 0 black;padding: .6rem 0;border-top-left-radius: 10px;border-top-right-radius: 10px;">
                    <center>Graphes</center>
                </h3>
                <br> 
            </div>
            

            <div style="padding:1rem; display: grid;grid-template-columns: repeat(1,1fr);grid-template-rows: repeat(1,1fr);gap:2.8rem;text-align: center;">
                <div style="margin-left:-1.4rem;position:relative">
                <span style="color: darkgoldenrod;"> <i class="fa-solid fa-bolt"></i> Courrant(I) : </span>
                        <span style="margin-left: 3.8rem;">
                            <a href="CL_C_Affichage_Graphe_I.php"><button>Btn</button> </a></span>
                </div>


                <div style="margin-left:-1.4rem;position:relative">
                <span style="color: blueviolet;"> <i class="fa-solid fa-charging-station"></i> Tension(V) : </span>
                        <span style="margin-left: 3.5rem;">
                            <a href="CL_C_Affichage_Graphe_V.php"><button>Btn</button> </a></span>
                </div>


                <div style="margin-left:-1.4rem;position:relative">
                <span style="color: cornflowerblue;"> <i class="fa-brands fa-superpowers"></i> Puissance(P) : </span>
                        <span style="margin-left: 3.0rem;">
                            <a href="CL_C_Affichage_Graphe_P.php"><button>Btn</button> </a></span>
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

function updateDatabase(value, ledName) {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("Mise à jour effectuée avec succès !");
                }
            };

            xhttp.open("GET", "update_led.php?value=" + value + "&led=" + ledName, true);
            xhttp.send();
        }

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
    function getLatestTension_c() {
      $.ajax({
        url: 'get_latest_tension_c.php',
        success: function(data) {
          $('#tension_c').html(data + ' V');
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
        url: 'get_latest_puissance_c.php',
        success: function(data) {
          $('#puissance_c').html(data + ' W');
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