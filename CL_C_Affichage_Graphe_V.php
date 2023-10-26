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

<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "project");
$query = "SELECT * FROM donnees_pv_finale";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ date_time:'".$row["date_time"]."', tension_c:".$row["tension_c"]."}, ";   
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to use Morris.js chart with PHP & Mysql</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
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
          <center><h2>Partie Consommation</h2></center>
  </div>

  <div class="container" style="width:900px; margin: 0 auto;color: #0c6980">
   <h2 align="center">Affichage de Courbe de la Tension</h2>
   <br> </br>  
   <div id="chart"></div>
  </div>

          <script>
Morris.Line({
  element: 'chart',
  data: [<?php echo $chart_data; ?>],
  xkey: 'date_time',
  ykeys: ['tension_c'],
  labels: ['tension_c'],
  hideHover: 'auto',
  stacked: true,
  lineColors: ['#0c6980']  // Couleur rouge
});
          </script>

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
</html>