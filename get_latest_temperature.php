<?php
  // Connexion à la base de données MySQL
  $conn = mysqli_connect('localhost', 'root', '', 'project');

  // Requête pour récupérer la dernière valeur de la température
  $query = "SELECT temperature FROM donnees_pv_finale ORDER BY time_x DESC LIMIT 1";
  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    $temperature = $row['temperature'];
    echo $temperature;
  }

  // Fermer la connexion à la base de données
  mysqli_close($conn);
?>
