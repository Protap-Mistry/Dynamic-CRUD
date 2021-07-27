<?php
	
include 'config.php';

	class databaseClass
	{

		private static $pdo;

		public static function dbConnection()
		{		
			if(!isset(self::$pdo))
			{
				try{
					self::$pdo= new PDO('mysql: host='.db_host.'; dbname='.db_name, db_user, db_pass);
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}
			return self::$pdo;
		}

		public static function ourPrepareMethod($query)
		{
			return self::dbConnection()->prepare($query); //$result= $pdo->prepare($query)
		}
	}

?>