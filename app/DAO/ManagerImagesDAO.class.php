<?php
	/**
	* 
	*/
	class ManagerImagesDAO extends DAO
	{
		
		public function get_actives(){
			$images=array();
			if(self::$connect){
				$get = self::$connect->prepareStatement("SELECT * FROM images WHERE flg_ativo=?");
				$get->execute(array(1));

				while($row = $get->fetchObj()){
					$images[] = $row;
				}
			}

			return $images;
		}


		public function add($obj){
			if(self::$connect){
				$add = self::$connect->prepareStatement("INSERT INTO images VALUES (?, ?, ?, ?)");
				return $add->execute(array(
					0,
					$obj->src,
					$obj->descricao,
					1
				));
			}

			return 0;
		}
		
	}