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

<!DOCTYPE HTML>
<html>
  <head>
    <title> ISESE </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
      html {font-family: time-new-roman; display: inline-block; text-align: center;}
      p {font-size: 1.2rem;}
      h4 {font-size: 0.8rem;}
      body {margin: 0;}
      /* ----------------------------------- TABLE STYLE */
      .styled-table {
        border-collapse: collapse;
        margin-left: auto; 
        margin-right: auto;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        border-radius: 0.5em;
        overflow: hidden;
        width: 90%;
      }

      .styled-table thead tr {
        background-color: #0c6980;
        color: white;
        text-align: left; 
      }

      .styled-table th {
        padding: 12px 15px;
        text-align: left;
        text-align: center;
      }

      .styled-table td {
        padding: 12px 15px;
        text-align: left;
      }

      .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }

      .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #0c6980;
      }

      .bdr {
        border-right: 1px solid white;
        border-left: 1px solid #e3e3e3;       
      }
      
      td:hover {background-color: rgba(12, 105, 128, 0.21);}
      tr:hover {background-color: rgba(12, 105, 128, 0.15);}
      .styled-table tbody tr:nth-of-type(even):hover {background-color: rgba(12, 105, 128, 0.15);}
      
      .btn-group .button {
        background-color: #0c6980; /* Green */
        border: 1px solid #e3e3e3;
        color: white;
        padding: 5px 8px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        float: center;
      }

      .btn-group .button:not(:last-child) {
        border-right: none;
      }

      .btn-group .button:hover {
        background-color: #094c5d;
      }

      .btn-group .button:active {
        background-color: #0c6980;
        transform: translateY(1px);
      }

      .btn-group .button:disabled,
      .button.disabled{
        color:#fff;
        background-color: #a0a0a0; 
        cursor: not-allowed;
        pointer-events:none;
      }

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
left: 1070px;
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
    </style>

  </head>
  
  <body>
      <div class="topnav">
        <center><h2>Partie Production</h2></center>
      </div>     <br>

    <h2 style="color: #0c6980;">Affichage de l'Intensité Lumineuse</h2>
    
    <table class="styled-table" id= "table_id">
      <thead>
        <tr>
          <th>ID</th>
          <!-- <th>ID</th> -->
          <th>CARTE</th>
          <th>LUMINOSITÉ (LUX)</th>
          <th>ÉTAT DE CAPTEUR LDR</th>
          <th>HEURE</th>
          <th>DATE </th>   
        </tr>

      </thead>
      <tbody id="tbody_table_record">

       <!-- -- Code PHP----------------------------------------------------------- -->

        <?php
          include 'Ad_database.php';
          $num = 0;
          $pdo = Database::connect();
        
          $sql = 'SELECT * FROM esp32_table_dht11_leds_record ORDER BY date DESC, time DESC';
          
          // CETT FONCTION récupère les valeurs des colonnes, formate la date, incrémente un numéro de ligne et affiche les données dans un tableau HTML.

          foreach ($pdo->query($sql) as $row) {
            $date = date_create($row['date']);
            $dateFormat = date_format($date,"d-m-Y");
            $num++;
            echo '<tr>';
            echo '<td>'. $num . '</td>';
            // echo '<td class="bdr">'. $row['id'] . '</td>';
            echo '<td class="bdr">'. $row['board'] . '</td>';
            echo '<td class="bdr">'. $row['temperature'] . '</td>';
  
            echo '<td class="bdr">'. $row['status_read_sensor_dht11'] . '</td>';
            // echo '<td class="bdr">'. $row['LED_01'] . '</td>';
            // echo '<td class="bdr">'. $row['LED_02'] . '</td>';
            echo '<td class="bdr">'. $row['time'] . '</td>';
            echo '<td>'. $dateFormat . '</td>';
            echo '</tr>';
          }
          Database::disconnect();
        ?>

<!-------------------FIN PHP------------------------------------------- -->

      </tbody>
    </table>
    
    <br>
    
    <!--groupe de boutons et d'éléments de contrôle pour la pagination et la manipulation du nombre de lignes affichées dans le tableau.-->

    <div class="btn-group">
      <button class="button" id="btn_prev" onclick="prevPage()">Précédent</button>
      <button class="button" id="btn_next" onclick="nextPage()">Suivant</button>
      <div style="display: inline-block; position:relative; border: 0px solid #e3e3e3; float: center; margin-left: 2px;;">
        <p style="position:relative; font-size: 14px;"> Tableau : <span id="page"></span></p>
      </div>
      <select name="number_of_rows" id="number_of_rows">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
      <button class="button" id="btn_apply" onclick="apply_Number_of_Rows()">Appliquer</button>
    </div> 

    <br>

    <!-- Il rest seulement le code Java script -->
    
    <script>
      //---------------------------initialisation des variable---------------------------------
      var current_page = 1;  //  nbr page actuelle 
      var records_per_page = 10;   // nbr ligne
      var l = document.getElementById("table_id").rows.length // table_id
      
      //--assure le nombre de lignes à afficher par page à partir de la liste déroulante. Elle met à jour la variable records_per_page et appelle la fonction changePage() pour afficher la page actuelle avec le nouveau nombre de lignes.
      function apply_Number_of_Rows() {
        var x = document.getElementById("number_of_rows").value;
        records_per_page = x;
        changePage(current_page);
      }
      //--------------------2 buton suivant et precedent----------------------------------------
      function prevPage() {
        if (current_page > 1) {
            current_page--;
            changePage(current_page);
        }
      }
      function nextPage() {
        if (current_page < numPages()) {
            current_page++;
            changePage(current_page);
        }
      }

      //-----------------gère l'affichage des enregistrements de la table en fonction de la page spécifiée-------------------------------------------
      //---Elle masque toutes les lignes de la table, à l'exception de la ligne d'en-tête
      //---met à jour l'affichage du numéro de page courante
      function changePage(page) {  //page :  numéro de page
        var btn_next = document.getElementById("btn_next");
        var btn_prev = document.getElementById("btn_prev");
        var listing_table = document.getElementById("table_id");
        var page_span = document.getElementById("page");
       
        // Validation de la page
        if (page < 1) page = 1;
        if (page > numPages()) page = numPages();

        [...listing_table.getElementsByTagName('tr')].forEach((tr)=>{
            tr.style.display='none'; // reset all to not display
        });
        listing_table.rows[0].style.display = ""; // display the title row

        for (var i = (page-1) * records_per_page + 1; i < (page * records_per_page) + 1; i++) {
          if (listing_table.rows[i]) {
            listing_table.rows[i].style.display = ""
          } else {
            continue;
          }
        }
          
        page_span.innerHTML = page + "/" + numPages() + " (Nombre total de lignes = " + (l-1) + ") | Nombre de lignes : ";
        
        if (page == 0 && numPages() == 0) {
          btn_prev.disabled = true;
          btn_next.disabled = true;
          return;
        }

        if (page == 1) {
          btn_prev.disabled = true;
        } else {
          btn_prev.disabled = false;
        }

        if (page == numPages()) {
          btn_next.disabled = true;
        } else {
          btn_next.disabled = false;
        }
      }

      //---------- calcule et retourne le nombre total de pages en fonction du nombre total de lignes et du nombre d'enregistrements par page --------------------------------------------------
      function numPages() {
        return Math.ceil((l - 1) / records_per_page);
      }
      //------------------------------------------------------------
      window.onload = function() {
        var x = document.getElementById("number_of_rows").value;
        records_per_page = x;
        changePage(current_page);
      };
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



<!-- Ce code HTML représente une page web qui affiche un tableau de données provenant d'une base de données MySQL. Voici le rôle de chaque partie du code :

La structure de base du document HTML est définie avec les balises <html>, <head>, et <body>.
Dans la balise <head>, le titre de la page est défini avec la balise <title>. De plus, la balise <meta> est utilisée pour spécifier la configuration de la vue sur les appareils mobiles.
Dans la balise <style>, des styles CSS sont définis pour différentes parties de la page, notamment pour la navigation, le tableau et les boutons.
Dans la balise <body>, la partie supérieure de la page est définie avec la classe CSS "topnav" pour la barre de navigation contenant le titre de la page.
Le titre principal de la page est affiché avec la balise <h3>.
Le tableau est défini avec la classe CSS "styled-table" et l'identifiant "table_id". Les en-têtes de colonnes sont spécifiés avec la balise <thead> et les données sont affichées avec la balise <tbody>.
Dans la balise <tbody>, le code PHP est utilisé pour récupérer les données de la base de données à l'aide de la classe "Database" incluse à partir du fichier "database.php". Les données sont affichées dans chaque ligne du tableau à l'aide d'une boucle foreach.
Des boutons pour naviguer entre les pages du tableau sont ajoutés avec la classe CSS "btn-group" et les identifiants "btn_prev" et "btn_next". Le nombre de lignes affichées par page peut être sélectionné à l'aide d'un menu déroulant avec l'identifiant "number_of_rows". Un bouton "Apply" avec l'identifiant "btn_apply" est utilisé pour appliquer le nombre de lignes sélectionné.
Un script JavaScript est utilisé pour gérer la pagination du tableau. Il permet de passer à la page précédente, à la page suivante, de changer le nombre de lignes par page et d'afficher le numéro de page actuel.
La fonction changePage() est utilisée pour afficher les lignes correspondant à la page sélectionnée en utilisant les propriétés style.display des éléments HTML.
La fonction numPages() calcule le nombre total de pages en fonction du nombre total de lignes.
La fenêtre onload est utilisée pour exécuter une fonction lors du chargement de la page. Dans ce cas, le nombre de lignes par page est initialisé avec la valeur sélectionnée dans le menu déroulant et la première page est affichée.
En résumé, ce code HTML génère une page web qui affiche un tableau de données récupérées à partir d'une base de données MySQL. Le tableau est paginé et les utilisateurs peuvent naviguer entre les pages et sélectionner le nombre de lignes affichées par page.
 -->
