<?php
  include 'Ad_database.php';
  include 'CL_database.php';
  
  if (!empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];
    
    $myObj = (object)array();
    
    //........................................ 
    $pdo = Database::connect();
    // replace_with_your_table_name, on this project I use the table name 'esp32_table_dht11_leds_update'.
    // This table is used to store DHT11 sensor data updated by ESP32. 
    // This table is also used to store the state of the LEDs, the state of the LEDs is controlled from the "home.php" page. 
    // To store data, this table is operated with the "UPDATE" command, so this table contains only one row.
    $sql = 'SELECT * FROM controle_pv_finale ';
    foreach ($pdo->query($sql) as $row) {
      $date_x = date_create($row['date_x']);
      $dateFormat = date_format($date_x,"d-m-Y");
      
      $myObj->id = $row['id'];
      // $myObj->temperature = $row['temperature'];
      // $myObj->humidity = $row['humidity'];
      // $myObj->status_read_sensor_dht11 = $row['status_read_sensor_dht11'];
      $myObj->LED_01 = $row['LED_01'];
      $myObj->LED_02 = $row['LED_02'];
      $myObj->ls_time_x = $row['time_x'];
      $myObj->ls_date_x = $dateFormat;
      
      $myJSON = json_encode($myObj);
      
      echo $myJSON;
    }
    Database::disconnect();
    
  } 
?>


<!-- 
Ce code PHP effectue une requête SELECT à partir d'une base de données MySQL à l'aide de la classe "Database" pour récupérer des données spécifiques d'une table. Voici le rôle de chaque partie du code :

La ligne "include 'database.php';" inclut le fichier "database.php", qui contient la classe "Database" utilisée pour la connexion à la base de données. Cela permet d'utiliser la fonctionnalité de connexion définie dans ce fichier.

Le code vérifie si la variable $_POST est non vide, ce qui signifie que des données ont été envoyées via une méthode POST à ce script PHP.

Si des données sont présentes dans $_POST, le code extrait la valeur de la clé 'id' à partir des données postées.

Une instance de l'objet $myObj est créée en tant qu'objet vide.

La connexion à la base de données est établie en utilisant la méthode statique "connect()" de la classe "Database" et l'instance de connexion est stockée dans la variable $pdo.

Une requête SELECT est exécutée pour récupérer les données correspondant à l'identifiant 'id' spécifié dans la table 'esp32_table_dht11_leds_update'.

Une boucle foreach est utilisée pour parcourir les résultats de la requête. Pour chaque ligne, les valeurs des colonnes de la table sont assignées aux propriétés de l'objet $myObj.

La date est formatée à l'aide des fonctions date_create() et date_format() pour obtenir le format 'd-m-Y'.

L'objet $myObj est converti en une chaîne JSON à l'aide de la fonction json_encode().

La chaîne JSON est renvoyée comme réponse du script PHP en utilisant la fonction echo.

La méthode statique "disconnect()" de la classe "Database" est appelée pour fermer la connexion à la base de données.

En résumé, ce code PHP récupère les données correspondant à un identifiant 'id' spécifique dans une table de la base de données, formate ces données en JSON, puis renvoie la réponse JSON.
 -->
