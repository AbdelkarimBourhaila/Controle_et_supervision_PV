<?php


  // Connexion à la base de données MySQL
  $conn = mysqli_connect('localhost', 'root', '', 'project');

  // Requête pour récupérer la dernière valeur de la température
  $query = "SELECT puissance_c FROM donnees_pv_finale ORDER BY time_x DESC LIMIT 1";
  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    $puissance_c = $row['puissance_c'];
    echo $puissance_c;
  }

  // Fermer la connexion à la base de données
  mysqli_close($conn);


?>
