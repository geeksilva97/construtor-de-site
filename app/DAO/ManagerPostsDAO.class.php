<?php
	/**
	* 
	*/
	class ManagerPostsDAO extends DAO
	{
		
		public static function get_actives(){
			$posts = array();
			if(self::$connect){
				$get = self::$connect->prepareStatement("SELECT * FROM post WHERE flg_ativo=?");
				$get->execute(array(1));

				while($row = $get->fetchObj()){
					$posts[] = $row;
				}
			}

			return $posts;
		}

		public static function get_disabled(){
			$posts = array();
			if(self::$connect){
				$get = self::$connect->prepareStatement("SELECT * FROM post WHERE flg_ativo=?");
				$get->execute(array(0));

				while($row = $get->fetchObj()){
					$posts[] = $row;
				}
			}

			return $posts;
		}

		public static function enable($id_post){
			if(self::$connect){
				$up = self::$connect->prepareStatement("UPDATE post SET flg_ativo=? WHERE id_post=?");
				return $up->execute(array(
					1,
					$id_post
				));
			}
		}

		public static function disable($id_post){
			if(self::$connect){
				$up = self::$connect->prepareStatement("UPDATE post SET flg_ativo=? WHERE id_post=?");
				return $up->execute(array(
					0,
					$id_post
				));
			}
		}

		public static function add($object){
			
			if(self::$connect){
				
				$add = self::$connect->prepareStatement("INSERT INTO post (id_post, titulo, sub_titulo, conteudo, descricao, chave, flg_ativo) VALUES (?, ?, ?, ?, ?, ?, ?)");

				return $add->execute(array(
					0,
					$object->titulo,
					$object->sub_titulo,
					$object->conteudo,
					$object->descricao,
					$object->chave,
					$object->flg_ativo
				));

			}

			return 0;
		}



	}