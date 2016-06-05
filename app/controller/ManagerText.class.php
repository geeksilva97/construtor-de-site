<?php
	/**
	* 
	*/
	class ManagerText extends Manager
	{

		public $textos;
		
		public function __construct(){
			$this->textos=array();
		}

		public function getTextos(){
			$this->checkConn();

			return ManagerTextDAO::get_texts();			
		}

		public function changeTexts(){
			$this->checkConn();
			return ManagerTextDAO::change_texts($this->textos);
		}

		private function checkConn(){
			if(!ManagerTextDAO::$connect){
				ManagerTextDAO::$connect = &$this->conn;
			}
		}

		
	}