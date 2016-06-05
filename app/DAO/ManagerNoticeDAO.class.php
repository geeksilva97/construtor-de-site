<?php
	/**
	* 
	*/
	class ManagerNoticeDAO extends DAO
	{
		
		public static function get_actives(){
			$noticias = array();
			if(self::$connect){
				$get = self::$connect->prepareStatement("SELECT * FROM noticias WHERE flg_ativo=?");
				$get->execute(array(1));

				while($row = $get->fetchObj()){
					$noticias[] = $row;
				}
			}

			return $noticias;
		}

		public static function get_disabled(){
			$noticias = array();
			if(self::$connect){
				$get = self::$connect->prepareStatement("SELECT * FROM noticias WHERE flg_ativo=?");
				$get->execute(array(0));

				while($row = $get->fetchObj()){
					$noticias[] = $row;
				}
			}

			return $noticias;
		}


		public static function disable($id_noticia){
			if(self::$connect){
				$up = self::$connect->prepareStatement("UPDATE noticias SET flg_ativo=? WHERE id_noticia=?");
				return $up->execute(array(
					0,
					$id_noticia
				));
			}
		}

		public static function enable($id_noticia){
			if(self::$connect){
				$up = self::$connect->prepareStatement("UPDATE noticias SET flg_ativo=? WHERE id_noticia=?");
				return $up->execute(array(
					1,
					$id_noticia
				));
			}
		}

		public static function delete($id_noticia){
			if(self::$connect){
				$delete = self::$connect->prepareStatement("DELETE FROM noticias WHERE id_noticia=?");
				return $delete->execute(array($id_noticia));
			}
		}

		public static function add($titulo, $conteudo){
			if(self::$connect){
				$add = self::$connect->prepareStatement("INSERT INTO noticias VALUES (?, ?, ?, ?)");
				return $add->execute(array(
					0,
					$titulo,
					$conteudo,
					1
				));
			}
		}
		
	}