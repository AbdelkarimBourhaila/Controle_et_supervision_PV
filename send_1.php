<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

//$IB = 3;

//établir une conexion à la BD
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connexion failed " .mysqli_connect_error());
}
echo "Connexion établie à la base de donnée ";

if(isset($_POST["courant_p"]) && isset($_POST["tension_p"]) && isset($_POST["courant_c"])) {
    $courant_p = $_POST["courant_p"];
    $tension_p = $_POST["tension_p"];
    $courant_c = $_POST["courant_c"];
    $tension_c = $_POST["tension_c"];
    $puissance_p = $_POST["puissance_p"];
    $puissance_c = $_POST["puissance_c"];
    $temperature = $_POST["temperature"];
    $humidity = $_POST["humidity"];
    $eclairage = $_POST["eclairage"];
    
    $sql = "INSERT INTO donnees_pv_finale (courant_p, tension_p, courant_c, tension_c, puissance_p, puissance_c, temperature, humidity, eclairage) VALUES ('$courant_p', '$tension_p', '$courant_c', '$tension_c', '$puissance_p', '$puissance_c', '$temperature', '$humidity', '$eclairage')";
    if(mysqli_query($conn,$sql)){
        echo "Nouvelle donnée est recue";
    }
    else{
        echo "ERREUR : Donnée n'est pas reçue" . $sql ."<br>" . mysqli_error($conn);
    }
}
?>