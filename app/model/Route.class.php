<?php
	

	class Route{

		static $routes=array();
		static $CURRENT_VIEW='';

		private function __construct(){}

		public static function set($key, $view){
			self::$routes[$key] = $view;
		}

		public static function get($key){
			if(!isset(self::$routes[$key])){
				return '';
			}

			return self::$routes[$key];
		}

	}
