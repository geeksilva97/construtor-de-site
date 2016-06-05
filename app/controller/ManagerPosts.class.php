<?php
	/**
	* 
	*/
	class ManagerPosts extends Manager
	{
		
		public function __construct(){}

		public function getActives(){
			$this->checkConn();
			return ManagerPostsDAO::get_actives();
		}

		public function getDisabled(){
			$this->checkConn();
			return ManagerPostsDAO::get_disabled();
		}

		public function enable($id_post){
			$this->checkConn();
			return ManagerPostsDAO::enable($id_post);
		}

		public function disable($id_post){
			$this->checkConn();
			return ManagerPostsDAO::disable($id_post);
		}

		public function add(){
			$this->checkConn();
			return ManagerPostsDAO::add($this);
		}

		private function checkConn(){
			if(!ManagerPostsDAO::$connect){
				ManagerPostsDAO::$connect = &$this->conn;
			}
		}

	}