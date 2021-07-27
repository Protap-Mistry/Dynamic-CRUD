<?php
	
	class Session{

		public static function inSession(){

			if(version_compare(phpversion(),'5.4.0', '<')){

				if(session_id()==''){

					session_start();
				}

			}
			else{
				
				if(session_status()==PHP_SESSION_NONE){

					session_start();
				}	
			}
		}

		public static function setSession($key, $val){

			$_SESSION['$key']= $val;
		}

		public static function getSession(){
			
			if(isset($_SESSION['$key'])){

				return $_SESSION['$key'];

			}else{

				return false;
			}
		}
	}

?>