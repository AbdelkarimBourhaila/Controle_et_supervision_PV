<?php
	class Database {
		private static $dbName = 'project'; // Example: private static $dbName = 'myDB';
		private static $dbHost = 'localhost'; // Example: private static $dbHost = 'localhost';
		private static $dbUsername = 'root'; // Example: private static $dbUsername = 'myUserName';
		private static $dbUserPassword = ''; // // Example: private static $dbUserPassword = 'myPassword';
		 
		private static $cont  = null;
		 
		public function __construct() {
			die('Init function is not allowed');
		}
		 
		public static function connect() {
      // One connection through whole application
      if ( null == self::$cont ) {     
        try {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        } catch(PDOException $e) {
          die($e->getMessage()); 
        }
      }
      return self::$cont;
		}
		 
		public static function disconnect() {
			self::$cont = null;
		}
	}
?>
<!-- 

Ce code représente une classe PHP nommée "Database" qui facilite la connexion à une base de données MySQL. Voici le rôle de chaque partie du code :

La classe "Database" est définie avec des propriétés statiques qui contiennent les informations de connexion à la base de données, telles que le nom de la base de données, l'hôte, le nom d'utilisateur et le mot de passe.

Le constructeur de la classe est défini pour empêcher l'initialisation de la classe. Il affiche un message d'erreur et termine l'exécution du script en utilisant la fonction "die()". Cela garantit que la classe ne peut pas être instanciée accidentellement.

La méthode statique "connect()" est définie pour établir une connexion à la base de données. Elle utilise la classe PDO (PHP Data Objects) pour créer une instance de connexion PDO avec les informations fournies. La connexion est établie une seule fois grâce à une vérification de la variable statique "$cont". Si la variable est nulle, la connexion est créée, sinon la connexion existante est renvoyée. Si une exception PDOException est levée lors de la tentative de connexion, l'erreur est affichée à l'aide de la méthode "getMessage()" de l'exception et le script est arrêté avec "die()".

La méthode statique "disconnect()" est définie pour fermer la connexion à la base de données. Elle met simplement la variable statique "$cont" à null, ce qui permet de libérer les ressources de la connexion.

Ce code permet donc d'établir une connexion à une base de données MySQL en utilisant la classe "Database" et la méthode statique "connect()". La connexion peut être utilisée pour exécuter des requêtes SQL et interagir avec la base de données.
 -->
