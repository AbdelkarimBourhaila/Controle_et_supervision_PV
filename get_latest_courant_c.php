<?php
  // Connexion à la base de données MySQL
  $conn = mysqli_connect('localhost', 'root', '', 'project');

  // Requête pour récupérer la dernière valeur de la température
  $query = "SELECT courant_c FROM donnees_pv_finale ORDER BY time_x DESC LIMIT 1";
  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    $courant_c = $row['courant_c'];
    echo $courant_c;
  }

  // Fermer la connexion à la base de données
  mysqli_close($conn);
?>