<?php

    require_once (File::build_path(array('model','ModelAccueil.php')));
	require_once (File::build_path(array('model','ModelAdmin.php')));
    require_once (File::build_path(array('model','ModelReservation.php')));
    require_once (File::build_path(array('lib','Security.php')));
    require_once File::build_path(array('model','ModelUtilisateur.php'));
    require_once File::build_path(array('model','ModelChambre.php'));

	
	class ControllerAdmin{

        // Page des satistiques //
		public static function build() {
            $tab_page = ModelChambre::getAll();
            if (isset($_SESSION['login'])){
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                $description = ModelAccueil::getDescription();
                $image1 = ModelAccueil::getImage1();
                $image2 = ModelAccueil::getImage2();
                $image3 = ModelAccueil::getImage3();
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
        }

        //  Pages de modification des pages //
        public static function build_admin() {
            $id = $_GET['id'];
            $tab_resEnAttente = ModelReservation::getReservationEnAttente($id);
            $tab_reservation = ModelReservation::getReservationValide($id);
            $tab_resRefusee = ModelReservation::getReservationRefusee($id);
	        $description = ModelChambre::getDescription($id);
            $image1 = ModelChambre::getImage1($id);
            $image2 = ModelChambre::getImage2($id);
            $image3 = ModelChambre::getImage3($id);
            $tab_page = ModelChambre::getAll();
            $nom = ModelChambre::getNom($id);
            $tarif = ModelChambre::getTarif($id);
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view', 'head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view', 'menuAdmin.php'));
                require File::build_path(array('view', 'planningReservationAdmin.php'));
                require File::build_path(array('view', 'reservations.php'));
                require File::build_path(array('view', 'modifNom.php'));
                require File::build_path(array('view', 'modifDescription.php'));
                require File::build_path(array('view','modifTarif.php'));
                require File::build_path(array('view', 'modifImage.php'));
                require File::build_path(array('view', 'supprimerChambre.php'));
                require File::build_path(array('view', 'footer.html'));
            }
            else {
                $description = ModelAccueil::getDescription();
                $image1 = ModelAccueil::getImage1();
                $image2 = ModelAccueil::getImage2();
                $image3 = ModelAccueil::getImage3();
                $tab_page = ModelChambre::getAll();
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
    	}

        public static function build_adminAccueil() {
		    $id = $_GET['id'];
            $description = ModelAccueil::getDescription();
            $image1 = ModelAccueil::getImage1();
            $image2 = ModelAccueil::getImage2();
            $image3 = ModelAccueil::getImage3();
            $tab_page = ModelChambre::getAll();
             if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                 require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','modifDescription.php'));
                require File::build_path(array('view','modifImage.php'));
                require File::build_path(array('view','footer.html'));
             }
             else{
                 $description = ModelAccueil::getDescription();
                 $image1 = ModelAccueil::getImage1();
                 $image2 = ModelAccueil::getImage2();
                 $image3 = ModelAccueil::getImage3();
                 $tab_page = ModelChambre::getAll();
                 require File::build_path(array('view','head.html'));
                 require File::build_path(array('view','menu.php'));
                 require File::build_path(array('view','carrousel.php'));
                 require File::build_path(array('view','description.php'));
                 require File::build_path(array('view','localisation.html'));
                 require File::build_path(array('view','footer.html'));
             }
        }

        public static function build_ajoutChambre() {
            $tab_page = ModelChambre::getAll();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','formulaireAjoutChambre.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                $description = ModelAccueil::getDescription();
                $image1 = ModelAccueil::getImage1();
                $image2 = ModelAccueil::getImage2();
                $image3 = ModelAccueil::getImage3();
                $tab_page = ModelChambre::getAll();
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
        }

        public static function build_formulaire_update() {
            $tab_page = ModelChambre::getAll();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','Update.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                $description = ModelAccueil::getDescription();
                $image1 = ModelAccueil::getImage1();
                $image2 = ModelAccueil::getImage2();
                $image3 = ModelAccueil::getImage3();
                $tab_page = ModelChambre::getAll();
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
        }

        // Ajouter une chambre //
        public static function build_connexion() {
            $u = ModelUtilisateur::getInfos();

           if (ModelUtilisateur::connexion($_POST['nom'],$_POST['mdp'])==true) {
               $_SESSION['login'] = $_POST['nom'];
               ControllerAdmin::build();
           } else {
               ControllerAdmin::build_formulaire_connexion_error();
           }
        }

        public static function deconnexion(){
            $description = ModelAccueil::getDescription();
            $image1 = ModelAccueil::getImage1();
            $image2 = ModelAccueil::getImage2();
            $image3 = ModelAccueil::getImage3();
            $tab_page = ModelChambre::getAll();
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            require File::build_path(array('view','carrousel.php'));
            require File::build_path(array('view','description.php'));
            require File::build_path(array('view','localisation.html'));
            require File::build_path(array('view','footer.html'));
            session_destroy();
        }

        public static function build_formulaire_connexion() {
            $tab_page = ModelChambre::getAll();
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            require File::build_path(array('view','connect.php'));
            require File::build_path(array('view','footer.html'));
        }

        public static function build_formulaire_connexion_error() {
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','connect.php'));
            require File::build_path(array('view','erreurConnexion.php'));
            require File::build_path(array('view','footer.html'));
        }

        public static function build_statistique() {
            $tab_page = ModelChambre::getAll();
            $tab_reservation_valide = ModelReservation::getReservationAccepte();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','menuStat.php'));
                require File::build_path(array('view','Diagramme1.php'));
                require File::build_path(array('view','Diagramme2.php'));
                require File::build_path(array('view','Diagramme4.1.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                $description = ModelAccueil::getDescription();
                $image1 = ModelAccueil::getImage1();
                $image2 = ModelAccueil::getImage2();
                $image3 = ModelAccueil::getImage3();
                $tab_page = ModelChambre::getAll();
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
        }

        public static function build_statistique2() {
            $anneeC = $_GET['Annee'];
            $tab_page = ModelChambre::getAll();
            $tab_reservation_valide = ModelReservation::getReservationAccepte();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','menuStat.php'));
                $t = "Jours réservés par mois de $anneeC";

                require File::build_path(array('view','Diagramme3.php'));

                require File::build_path(array('view','footer.html'));
            }
            else{
                $description = ModelAccueil::getDescription();
                $image1 = ModelAccueil::getImage1();
                $image2 = ModelAccueil::getImage2();
                $image3 = ModelAccueil::getImage3();
                $tab_page = ModelChambre::getAll();
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
        }

        public static function build_statistiqueT() {
		    $anneeC = $_GET['Annee'];
            $tab_page = ModelChambre::getAll();
            $tab_reservation_valide = ModelReservation::getReservationAccepte();
            if (isset($_SESSION['login'])) {
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menuConnecte.php'));
                require File::build_path(array('view','menuAdmin.php'));
                require File::build_path(array('view','menuStat.php'));
                $t = "Montant des réservations de $anneeC";
                require File::build_path(array('view','Diagramme4.php'));
                require File::build_path(array('view','footer.html'));
            }
            else{
                $description = ModelAccueil::getDescription();
                $image1 = ModelAccueil::getImage1();
                $image2 = ModelAccueil::getImage2();
                $image3 = ModelAccueil::getImage3();
                $tab_page = ModelChambre::getAll();
                require File::build_path(array('view','head.html'));
                require File::build_path(array('view','menu.php'));
                require File::build_path(array('view','carrousel.php'));
                require File::build_path(array('view','description.php'));
                require File::build_path(array('view','localisation.html'));
                require File::build_path(array('view','footer.html'));
            }
        }


        // Modification du nom //
        public static function modifNom() {
            $id = $_GET['id'];
            ModelAdmin::modifNom($_POST["nom"],$id);
            ControllerAdmin::build_admin();
        }

        // Modification de la description //
    	public static function modifDesc() {
            $id = $_GET['id'];
            if ($id==1) {
                ModelAccueil::modifDesc($_POST["description"],$id);
                ControllerAdmin::build_adminAccueil();
            } else {
                ModelAdmin::modifDesc($_POST["description"],$id);
                ControllerAdmin::build_admin();
            }
    	}

        public static function modifTarif() {
            $id = $_GET['id'];
            ModelAdmin::modifTarif($_POST["tarif"],$id);
            ControllerAdmin::build_admin();
        }

        // Modification de l'image //
    	public static function modifImage1() {
            $id = $_GET['id'];

    		if ($id==1) {
    		    ModelAccueil::modifImage1($_POST["file"],$id);
    		    ControllerAdmin::build_adminAccueil();
            } else {
                ModelAdmin::modifImage1($_POST["file"],$id);
                ControllerAdmin::build_admin();
            }

    	}
        public static function modifImage2() {
            $id = $_GET['id'];
            if ($id==1) {

                ModelAccueil::modifImage2($_POST["file"],$id);
                
                ControllerAdmin::build_adminAccueil();
            } else {
                ModelAdmin::modifImage2($_POST["file"],$id);
                ControllerAdmin::build_admin();
            }

        }
        public static function modifImage3() {
            $id = $_GET['id'];

            if ($id==1) {
                ModelAccueil::modifImage3($_POST["file"],$id);
                ControllerAdmin::build_adminAccueil();
            } else {
                ModelAdmin::modifImage3($_POST["file"],$id);
                ControllerAdmin::build_admin();
            }
        }

        // Refuser Réservation //
        public static function refRes() {
            $idres = $_GET['idR'];
            $email = $_GET["email"];
            ModelReservation::refRes($idres,$email);
            ControllerAdmin::build_admin();
        }

        // Validé Réservation //
        public static function valRes() {
            $idres = $_GET['idR'];
            $email = $_GET["email"];
            ModelReservation::valRes($idres,$email);
            ControllerAdmin::build_admin();
        }

        // Ajouter une chambre //
        public static function addChambre() {
            ModelChambre::addChambre($_POST["nom"],$_POST["description"],$_POST["tarif"]);
            ControllerAdmin::build_ajoutChambre();
        }

        // Ajouter une chambre //
        public static function updateNU() {
            ModelAdmin::update($_POST["nom"],$_POST["mdp1"],$_POST["mdp2"]);
            ControllerAdmin::build_formulaire_update();
        }

// Supprimer une chambre //
        public static function supprimerChambre() {
            $id = $_GET['id'];
            ModelChambre::supprimerChambre($id);
            ControllerAdmin::build();
        }
	}
			
?>			