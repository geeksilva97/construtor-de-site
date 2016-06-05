<?php
	/**
	* 
	*/
	class ManagerLinksDAO extends DAO
	{
		
		public static function get_active_links(){
			$links = array();
			if(self::$connect){
				$getLinks = self::$connect->prepareStatement("SELECT * FROM links WHERE flg_ativo=?");
				$getLinks->execute(array(1));

				while($row=$getLinks->fetchObj()){
					$links[] = $row;
				}
			}

			return $links;
		}

		public static function get_disabled_links(){
			$links = array();
			if(self::$connect){
				$getLinks = self::$connect->prepareStatement("SELECT * FROM links WHERE flg_ativo=?");
				$getLinks->execute(array(0));

				while($row=$getLinks->fetchObj()){
					$links[] = $row;
				}
			}

			return $links;
		}

		public static function disable($id_link){
			if(self::$connect){
				$dis = self::$connect->prepareStatement("UPDATE links SET flg_ativo=? WHERE id_link=?");
				return $dis->execute(array(
					0,
					$id_link
				));
			}
		}

		public static function enable($id_link){
			if(self::$connect){
				$dis = self::$connect->prepareStatement("UPDATE links SET flg_ativo=? WHERE id_link=?");
				return $dis->execute(array(
					1,
					$id_link
				));
			}
		}
	}