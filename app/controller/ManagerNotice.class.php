<?php
	/**
	* 
	*/
	class ManagerNotice extends Manager
	{
		

		public function __construct(){}

		public function getActives(){
			$this->checkConn();
			return ManagerNoticeDAO::get_actives();
		}

		public function getDisabled(){
			$this->checkConn();
			return ManagerNoticeDAO::get_disabled();
		}

		public function disable($id_notice){
			$this->checkConn();

			return ManagerNoticeDAO::disable($id_notice);
		}

		public function enable($id_notice){
			$this->checkConn();

			return ManagerNoticeDAO::enable($id_notice);
		}

		public function delete($id_notice){
			$this->checkConn();
			return ManagerNoticeDAO::delete($id_notice);
		}

		public function add($titulo, $conteudo){
			$this->checkConn();
			return ManagerNoticeDAO::add($titulo, $conteudo);
		}

		private function checkConn(){
			if(!ManagerNoticeDAO::$connect){
				ManagerNoticeDAO::$connect = &$this->conn;
			}
		}

	}