<?php
	
	class View{

		static $pathViews = 'app/view/';
		static $container='container.view';
		static $view;
		static $attributesView;
		static $cssView;
		static $jsView;
		static $metaTagsView;

		protected function __construct(){}

		public static function view($view, array $attr=array()){
			self::$view=$view;
			self::$attributesView=$attr;
			self::$cssView = (isset($attr['css'])) ? $attr['css'] : array();
			self::$jsView = (isset($attr['js'])) ? $attr['js'] : array();
			self::$metaTagsView = (isset($attr['meta'])) ? $attr['meta'] : array();
		}

		static function addPath($path){
			self::$pathViews .= explode('/',$path)[0].'/';
		}

		public static function load(){
			$load = FALSE;
			$src = self::$pathViews.self::$container.'.php';
			if(file_exists($src)){
				$load = TRUE;
				
			}else{
				$src = self::$pathViews.self::$container.'.html';

				if(file_exists($src)){
					$load=TRUE;
				}else{
					throw new Exception("A View container.view, não foi encontrada");
				}
			}


			$content_source = self::$pathViews.self::$view.'.php';
			$content='';

				if(file_exists($content_source)){
					$content = $content_source;
				}else{
					$content_source = self::$pathViews.self::$view.'.html';
					$content = ( file_exists($content_source) ) ? $content_source : '';
				}

			$attr = self::$attributesView;

			$css = self::$cssView;
			$javascript = self::$jsView;
			$meta=self::$metaTagsView;

				include $src;

		}

		

	}

?>
