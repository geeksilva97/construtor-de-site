<?php
	/**
	* 
	*/
	class ManagerLinks extends Manager{
	
		public function __construct(){}

		public function getActiveLinks(){
			$this->checkConn();

			return ManagerLinksDAO::get_active_links();			
		}

		public function getDisabledLinks(){
			$this->checkConn();

			return ManagerLinksDAO::get_disabled_links();
		}

		public function disable($id_link){
			$this->checkConn();
			return ManagerLinksDAO::disable($id_link);
		}

		public function enable($id_link){
			$this->checkConn();
			return ManagerLinksDAO::enable($id_link);
		}

		private function checkConn(){
			if(!ManagerLinksDAO::$connect){
				ManagerLinksDAO::$connect = &$this->conn;
			}
		}

	}