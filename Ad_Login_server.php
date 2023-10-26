<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $key_Client = mysqli_real_escape_string($db, $_POST['key_Client']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }
// ___________________________________________________________________
// Récupérer les noms de toutes les tables de la base de données
// $tablesQuery = $db->query("SHOW TABLES");
// $tables = $tablesQuery->fetchAll(PDO::FETCH_COLUMN);

// // Parcourir les tables pour trouver une correspondance de clé
// $tableFound = false;
// foreach ($tables as $table) {
//   if ($table == `user" . $key_Client . "`){

//   $query = "INSERT INTO `user" . $key_Client . "` (username, email, password) 
//   VALUES('$username', '$email', '$password') ";
//   mysqli_query($db, $query); 
//     // Vérifier si la clé existe dans la table
//     // $query = $db->prepare("SELECT * FROM $table WHERE `key_Client` = ?");
//     // $query->execute([$key_Client]);

//     // if ($query->rowCount() > 0) {
//     //     // Clé trouvée, ajouter l'utilisateur à la table correspondante
//     //     $insertQuery = $db->prepare("INSERT INTO "table".$key_Client ( `id`,`password`,`username`, `email`, `key_Client`) VALUES (?, ?, ?, ?, ?)");
//     //     $insertQuery->execute([$id, $password, $username, $email, $key_Client]);

//     //   // mysqli_query($db, $query); 
//     //     // Indiquer que la table a été trouvée
//     //     $tableFound = true;
//     //     // Sortir de la boucle car la correspondance de clé a été trouvée
//     //     break;
//     // }
//   }
// }
// if($tableFound == false){
//   echo "La clé entrée n'est pas valide. Veuillez réessayer.";
// }
// // Vérifier si une table correspondante a été trouvée
// if ($tableFound) {
//     echo "Utilisateur ajouté avec succès à la table correspondante.";
// } else {
//     echo "La clé entrée n'est pas valide. Veuillez réessayer.";
// }

  // ________________________________________________________________________________________
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    // $tablesQuery = $db->$query("SELECT * FROM user_keys");
    // $query1 = $tablesQuery->fetchAll(PDO::FETCH_COLUMN);
    // $bool  = true;
    // $query = $db->prepare("SELECT * FROM user_keys WHERE `id_key` = ?");
    // $query->execute([$key_Client]);
    // if ($query->rowCount() > 0){

    //   $query = "INSERT INTO users (username, email, password) 
    // VALUES('$username', '$email', '$password') ";
    // mysqli_query($db, $query); 
    // }else{
    //   echo "Invalide key";
    // }

    // ...

$query = $db->prepare("SELECT * FROM key_valide WHERE `key` = ?");
$query->bind_param("s", $key_Client);
$query->execute();
$result = $query->get_result();

if ($result->num_rows > 0) {
  $query = "INSERT INTO users (username, email, password) 
    VALUES('$username', '$email', '$password') ";
  mysqli_query($db, $query); 




  $user_check_query1 = "SELECT * FROM users WHERE username='$username' AND email='$email' LIMIT 1";
  $result1 = mysqli_query($db, $user_check_query1);
  $user1 = mysqli_fetch_assoc($result1);
  

 

  $user_id = $user1["id_user"]; // Récupérer la valeur de la clé primaire

  if (!empty($user_id)) { // Vérifier si la valeur n'est pas nulle
    $query1 = "INSERT INTO user_keys (`key`, fg) 
      VALUES('$key_Client', '$user_id') ";
    mysqli_query($db, $query1); 

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

   


   
  } else {
   array_push($errors, "Invalid user ID");
  }
} else {
   array_push($errors, "Invalid key");
}
  }
}
// ___________________________________________________________________________________________
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $key=0;
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
  	$results = mysqli_query($db, $query);
    $user1 = mysqli_fetch_assoc($results);


  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "";
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
      $results = mysqli_query($db, $query);
      $user1 = mysqli_fetch_assoc($results);
      $key=$user1['Type'];
      if($key==0){
        header("Location: Ad_Page_0.php");
      }
      else{
         header("Location:CL_Page_0.php");
      }

  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>