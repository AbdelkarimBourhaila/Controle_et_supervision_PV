<?php

  require 'CL_database.php';
  if (!empty($_POST)) {
    
    $id = $_POST['id'];
    $led_01 = $_POST['led_01'];
    $led_02 = $_POST['led_02'];
    $id_key;
    $board = $_POST['id'];
    $found_empty = false;
    
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO controle_pv_finale (id,LED_01,LED_02) values(?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($id,$led_01,$led_02,$tm,$dt));
    Database::disconnect();
  }

?>