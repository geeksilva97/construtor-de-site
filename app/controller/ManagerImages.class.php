<?php
	/**
	* 
	*/
	class ManagerImages extends Manager
	{
		
		public $path;

		public function __construct(){
			$this->path = 'http://localhost/proj-jp/public/img';
		}

		public function getActives(){
			$this->checkConn();
			return ManagerImagesDAO::get_actives();
		}

		public function add($obj){
			$this->checkConn();
			return ManagerImagesDAO::add($obj);
		}	

		private function checkConn(){
			if(!ManagerImagesDAO::$connect){
				ManagerImagesDAO::$connect = &$this->conn;
			}
		}

	}