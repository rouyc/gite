<?php /** @noinspection PhpIncludeInspection */

	require_once (File::build_path(array('model','ModelChambre.php')));
	require_once (File::build_path(array('model','ModelReservation.php')));


	
	class ControllerChambre{

		public static function build_chambre() {
	        $description = ModelChambre::getDescription($_GET["id"]);
	        $image1 = ModelChambre::getImage1($_GET["id"]);
            $image2 = ModelChambre::getImage2($_GET["id"]);
            $image3 = ModelChambre::getImage3($_GET["id"]);
	        $tarifChambre = ModelChambre::getTarif($_GET["id"]);
	        $tab_page = ModelChambre::getAll();
	        $tab_reservation = ModelReservation::getReservationValide($_GET["id"]);
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','tarifChambre.php'));
                require File::build_path(array('view','planningReservation.php'));
                require File::build_path(array('view','formulaireReservation.php'));
                require File::build_path(array('view','footer.html'));
            }
	        else{
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','tarifChambre.php'));
                require File::build_path(array('view','planningReservation.php'));
                require File::build_path(array('view','formulaireReservation.php'));
                require File::build_path(array('view','footer.html'));
            }
    	}

    	public static function addRes() {
		    $date1 = new DateTime($_POST['datedebut']);
		    $date2 = new DateTime($_POST['datefin']);
            $tab_reservation = ModelReservation::getReservationValide($_GET["id"]);
            $date = $date1;
            $res = 1;
            while ($date <= $date2 && $res == 1) {
                foreach ($tab_reservation as $reservation) {
                    $dateDebut = new DateTime($reservation->getDateDebut());
                    $dateFin = new DateTime($reservation->getDateFin());
                    if ($date>=$dateDebut && $date<=$dateFin) {
                        $res = 0;
                    }
                }
                $date->modify('+1 day');
            }
		    if ($res==0){
		        ControllerChambre::build_chambre();
            } else {
		        
                    ModelChambre::AddRese($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["datedebut"], $_POST["datefin"]);
                    ControllerChambre::build_chambre();

            }

        }
	}
			
?>