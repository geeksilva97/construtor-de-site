<?php
	
		/**
		* 
		*/
		class Conn
		{
			
			static $is_conected;
			static $conn;

			private function __construct(){}

			public static function get(){
				if(!self::$is_conected){
					//setando drive de banco de dados
					Drive::set('mysql');
					self::$conn = Drive::getConnection('localhost', 'proj_jp', 'root', '');
					// self::$conn = Drive::getConnection('localhost', 'u150123366_json', 'u150123366_json', 'qwe123');
				}

				return self::$conn;
			}

		}
