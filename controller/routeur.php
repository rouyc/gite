<?php /** @noinspection PhpIncludeInspection */




// Récupération de l'action dans l'URL //
// Création des pages //

// Accueil //
if (empty($_GET["action"]) or empty($_GET['controller'])) {
    require_once File::build_path(array('controller','ControllerAccueil.php'));
    ControllerAccueil::build_default();
}
else {
    $controller = $_GET['controller'];
    $controller_class = "Controller".ucfirst($controller);
    $action = $_GET["action"];
    require_once File::build_path(array('controller',$controller_class.".php"));
    if (class_exists($controller_class)) {
        $controller_class::$action();
    }
}
?>

<?php
/** @noinspection PhpIncludeInspection
		
	// Récupération de l'action dans l'URL //
		$action = $_GET["action"];
	// Création des pages //

		// Accueil //
		if (empty($action)) {
			require_once File::build_path(array('controller','ControllerAccueil.php'));
			ControllerAccueil::build_default();
		}

		// Chambre //
		if ($action == "chambre") {
			require_once File::build_path(array('controller','ControllerChambre.php'));
			ControllerChambre::build_chambre();
		}

		// Page des statistiques dans Admin //
		if ($action == "admin") {
			require_once File::build_path(array('controller','ControllerAdmin.php'));
			ControllerAdmin::build_formulaire_connexion();
		}

		// Page de modification des pages dans Admin //
		if ($action == "adminModif") {
			require_once File::build_path(array('controller','ControllerAdmin.php'));
			ControllerAdmin::build_admin($_GET["id"]);
		}

		// Page de modification de accueil dans Admin //
		if ($action == "adminModifAcc") {
			require_once File::build_path(array('controller','ControllerAdmin.php'));
			ControllerAdmin::build_adminAccueil($_GET["id"]);
		}

		// Page d'ajout de chambre //
		if ($action == "adminAjouterChambre") {
			require_once File::build_path(array('controller','ControllerAdmin.php'));
			ControllerAdmin::build_ajoutChambre();
		}

        // Page de modifications infos admin //
        if ($action == "formulaire_update") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
            ControllerAdmin::build_formulaire_update();
        }

        // Page de connexion //
        if ($action == "7895") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
            ControllerAdmin::build_formulaire_connexion();
        }

        // Page après connexion //
        if ($action == "connected") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
                ControllerAdmin::build_connexion();
        }

        // Page contact //
        if ($action == "contact") {
            require_once File::build_path(array('controller','ControllerContact.php'));
                ControllerContact::build();
        }

        // Page blog //
        if ($action == "blog") {
            require_once File::build_path(array('controller','ControllerBlog.php'));
            ControllerBlog::build();
        }

        // Page blog //
        if ($action == "adminBlog") {
            require_once File::build_path(array('controller','ControllerBlog.php'));
            ControllerBlog::buildAdmin();
        }
		
		// Page modification blog //
        if ($action == "adminModifArticle") {
            require_once File::build_path(array('controller','ControllerBlog.php'));
            ControllerBlog::buildAdminModifArticle($_GET["id"]);
        }

        // Page d'ajout d'un article //
		if ($action == "ajoutArticle") {
			require_once File::build_path(array('controller','ControllerBlog.php'));
			ControllerBlog::buildAdminAjouterArticle();
		}

        //Affiche les avis //
        if ($action == "afficherAvis"){
            require_once File::build_path(array('controller','ControllerAvis.php'));
            ControllerAvis::build();
        }


        // Page d'ajout d'avis //
        if($action == "ajouterAvis"){
            require_once File::build_path(array('controller','ControllerAvis.php'));
            ControllerAvis::ajouterAvis();
        }

        // Avis Valider //
        if ($action == "adminAvisValider") {
            require_once File::build_path(array('controller','ControllerAvis.php'));
            ControllerAvis::buildAdminAvisValider();
        }

        // Avis A valider //
        if ($action == "adminAvisAValider") {
            require_once File::build_path(array('controller','ControllerAvis.php'));
            ControllerAvis::buildAdminAvisAValider();
        }

        // Avis refuser //
        if ($action == "adminAvisRefuser") {
            require_once File::build_path(array('controller','ControllerAvis.php'));
            ControllerAvis::buildAdminAvisRefuser();
        }
        

	// Action sur la BD //

		// Modification d'une description //
		if ($action == "adminDesc") {
			require_once File::build_path(array('controller','ControllerAdmin.php'));
			ControllerAdmin::modifDesc($_GET["id"]);
		}
        if ($action == "adminTarif") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
            ControllerAdmin::modifTarif($_GET["id"]);
        }
		
		// Modification d'une image //
		if ($action == "adminImage") {
			require_once File::build_path(array('controller','ControllerAdmin.php'));
			ControllerAdmin::modifImage($_GET["id"]);
		}

		// Modification du nom //
		if ($action == "adminNom") {
			require_once File::build_path(array('controller','ControllerAdmin.php'));
			ControllerAdmin::modifNom($_GET["id"]);
		}

		// Ajout d'une réservation //
		if ($action == "addRes") {
		    require_once File::build_path(array('controller','ControllerChambre.php'));
		    ControllerChambre::addRes();
	    }

	    // Refuser une Réservation //
	    if ($action == "refRes") {
		    require_once File::build_path(array('controller','ControllerAdmin.php'));
		    ControllerAdmin::refRes($_GET["id"],$_GET["email"]);
	    }

	    // Validé une Réservation //
	    if ($action == "valRes") {
		    require_once File::build_path(array('controller','ControllerAdmin.php'));
		    ControllerAdmin::valRes($_GET["id"],$_GET["email"]);
	    }

	    // Ajout d'une page //
        if ($action == "addChambre") {
            require_once File::build_path(array('controller', 'ControllerAdmin.php'));
            ControllerAdmin::addChambre();
        }

        // modifications infos //
        if ($action == "updateNU") {
            require_once File::build_path(array('controller', 'ControllerAdmin.php'));
            ControllerAdmin::updateNU();
        }
	
		// Supprimer une chambre //
        if ($action == "supprimerChambre") {
            require_once File::build_path(array('controller', 'ControllerAdmin.php'));
            ControllerAdmin::supprimerChambre($_GET["id"]);
        }

        // Supprimer un article //
        if ($action == "supprimerArticle") {
            require_once File::build_path(array('controller', 'ControllerBlog.php'));
            ControllerBlog::supprimerArticle($_GET["id"]);
        }

        // Ajouter un article //
        if ($action == "ajoutArticle") {
            require_once File::build_path(array('controller', 'ControllerBlog.php'));
            ControllerBlog::ajoutArticle();
        }

        if ($action == "statistiques") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
            ControllerAdmin::build_statistique();
        }
        if ($action == "statistiques2") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
            ControllerAdmin::build_statistique2($_GET['Annee']);
        }
        if ($action == "statistiquesT") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
            ControllerAdmin::build_statistiqueT($_GET['Annee']);
        }

        if ($action == "deconnexion") {
            require_once File::build_path(array('controller','ControllerAdmin.php'));
            ControllerAdmin::deconnexion();

        }

        // Modifier titre article //
        if ($action == "adminModifTitreArticle") {
            require_once File::build_path(array('controller', 'ControllerBlog.php'));
            ControllerBlog::modifTitre($_GET["id"]);
        }

        // Modifier contenu article //
        if ($action == "adminModifContenuArticle") {
            require_once File::build_path(array('controller', 'ControllerBlog.php'));
            ControllerBlog::modifContenu($_GET["id"]);
        }

        // Ajouter avis //
        if ($action == "ajoutAvis") {
            require_once File::build_path(array('controller', 'ControllerAvis.php'));
            ControllerAvis::ajoutAvis();
        }

        // Refuser Avis //
        if ($action == "refuserAvis") {
            require_once File::build_path(array('controller', 'ControllerAvis.php'));
            ControllerAvis::setAvis(2);
        }

        // Valider avis //
        if ($action == "validerAvis") {
            require_once File::build_path(array('controller', 'ControllerAvis.php'));
            ControllerAvis::setAvis(1);
        }

        // Supprimer un avis //
        if ($action == "supprimerAvis") {
            require_once File::build_path(array('controller', 'ControllerAvis.php'));
            ControllerAvis::supprimerAvis($_GET["id"]);
        }

 */
        
?>	