<?php /** @noinspection PhpIncludeInspection */
require_once (File::build_path(array('model','ModelChambre.php')));
	
	class ControllerContact{

		public static function build() {
            $tab_page = ModelChambre::getAll();
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            require File::build_path(array('view','formulaireContact.php'));
            require File::build_path(array('view','footer.html'));       
    	}
	}
			
?>