<?php /** @noinspection PhpIncludeInspection */
require_once (File::build_path(array('model','ModelAccueil.php')));
require_once (File::build_path(array('model','ModelChambre.php')));
	
	class ControllerAccueil{

		public static function build_default() {
            $description = ModelAccueil::getDescription();
            $image1 = ModelAccueil::getImage1();
            $image2 = ModelAccueil::getImage2();
            $image3 = ModelAccueil::getImage3();
            $tab_page = ModelChambre::getAll();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
	        else{
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
    	}
	}
			
?>