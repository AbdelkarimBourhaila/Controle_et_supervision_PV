<?php
	class Database 
	{
		private static $dbName = 'project'; // Example: private static $dbName = 'myDB';
		private static $dbHost = 'localhost'; // Example: private static $dbHost = 'localhost';
		private static $dbUsername = 'root'; // Example: private static $dbUsername = 'myUserName';
		private static $dbUserPassword = ''; // // Example: private static $dbUserPassword = 'myPassword';
		 
		private static $cont  = null; // stocker l'objet de connexion PDO.
		 //__________________________________________________________________________
		public function __construct() {
			die('Init function is not allowed');
		}
		 
		//__________________________________________________________________________

		public static function connect() {
      // One connection through whole application
      if ( null == self::$cont ) {     
        try {  		// instancier un nouvel objet PDO 
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        } catch(PDOException $e) {
          							die($e->getMessage()); 
        							}
      }
      return self::$cont;
		}

		//__________________________________________________________________________

		public static function disconnect() {
			self::$cont = null;
		}
		//__________________________________________________________________________
	
	}
?>