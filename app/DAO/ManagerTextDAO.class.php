<?php
	/**
	* 
	*/
	class ManagerTextDAO extends DAO {

		public static function get_texts(){
			
			if(self::$connect){

				$getTextos = self::$connect->prepareStatement("SELECT * FROM textos");
				$getTextos->execute();

				return $getTextos->fetchObj();

			}

			return NULL;
		}	


		public static function change_texts($textos){
			if(self::$connect){
				$up = self::$connect->prepareStatement("UPDATE textos SET texto_topo=?");
				return $up->execute(array($textos['texto_topo']));
			}
		}	

}
