<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Récupération des valeurs depuis l'URL
$value = $_GET['value'];
$ledName = $_GET['led'];

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Requête SQL pour mettre à jour la colonne correspondante à la LED
$sql = "UPDATE controle_pv_finale SET $ledName = $value";

if ($conn->query($sql) === TRUE) {
    echo "Mise à jour de $ledName effectuée avec succès !";
} else {
    echo "Erreur lors de la mise à jour de $ledName : " . $conn->error;
}

// Fermeture de la connexion
$conn->close();
?>
