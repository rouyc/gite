<?php

require_once (File::build_path(array('model','ModelChambre.php')));
require_once (File::build_path(array('model','ModelAvis.php')));

class ControllerAvis {
    
    public static function build() {
        $tab_avis = ModelAvis::getAvisValider();
        $tab_page = ModelChambre::getAll();
        if (isset($_SESSION['login'])) {
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menuConnecte.php'));
            require File::build_path(array('view','menuAdmin.php'));
            require File::build_path(array('view','menuAvis.php'));
            require File::build_path(array('view','avis.php'));
            require File::build_path(array('view','footer.html'));
        }
        else{
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            echo "oui";
            require File::build_path(array('view','avis.php'));
            echo "oui";
            require File::build_path(array('view','footer.html'));
            echo "oui";
        }
    }

    public static function buildAdminAvisAValider() {
        $tab_avis = ModelAvis::getAvisAValider();
        $tab_page = ModelChambre::getAll();
        if (isset($_SESSION['login'])) {
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menuConnecte.php'));
            require File::build_path(array('view','menuAdmin.php'));
            require File::build_path(array('view','menuAvis.php'));
            require File::build_path(array('view','avisAdminAValider.php'));
            require File::build_path(array('view','footer.html'));
        }
        else{
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            require File::build_path(array('view','avis.php'));
            require File::build_path(array('view','footer.html'));
        }
    }

    public static function buildAdminAvisValider() {
        $tab_avis = ModelAvis::getAvisValider();
        $tab_page = ModelChambre::getAll();
        if (isset($_SESSION['login'])) {
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menuConnecte.php'));
            require File::build_path(array('view','menuAdmin.php'));
            require File::build_path(array('view','menuAvis.php'));
            require File::build_path(array('view','avisAdminValider.php'));
            require File::build_path(array('view','footer.html'));
        }
        else{
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            require File::build_path(array('view','avis.php'));
            require File::build_path(array('view','footer.html'));
        }
    }

    public static function buildAdminAvisRefuser() {
        $tab_avis = ModelAvis::getAvisRefuser();
        $tab_page = ModelChambre::getAll();
        if (isset($_SESSION['login'])) {
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menuConnecte.php'));
            require File::build_path(array('view','menuAdmin.php'));
            require File::build_path(array('view','menuAvis.php'));
            require File::build_path(array('view','avisAdminRefuser.php'));
            require File::build_path(array('view','footer.html'));
        }
        else{
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            require File::build_path(array('view','avis.php'));
            require File::build_path(array('view','footer.html'));
        }
    }

    public static function ajouterAvis(){
        $tab_page = ModelChambre::getAll();
        if (isset($_SESSION['login'])) {
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menuConnecte.php'));
            require File::build_path(array('view','menuAdmin.php'));
            require File::build_path(array('view','formulaireAjoutAvis.php'));
            require File::build_path(array('view','footer.html'));
        }
        else{
            require File::build_path(array('view','head.html'));
            require File::build_path(array('view','menu.php'));
            require File::build_path(array('view','formulaireAjoutAvis.php'));
            require File::build_path(array('view','footer.html'));
        }
    }

     // Ajouter un avis //
    public static function ajoutAvis() {
        ModelAvis::ajouterAvis($_POST["commentaire"],$_POST["nomClientAvis"],$_POST["prenomClientAvis"],$_POST['chambre'],$_POST["note"]);
        ControllerAvis::build();
    }

    // Valider un avis (1) ou refuser un avis (2) //
    public static function setAvis1() {
        ModelAvis::setAvis($_GET['id'],1);
        ControllerAvis::build();
    }

    public static function setAvis2() {
        ModelAvis::setAvis($_GET['id'],2);
        ControllerAvis::build();
    }

    // Supprimer un avis //
    public static function supprimerAvis() {
        $id = $_GET['id'];
        ModelAvis::supprimerAvis($id);
        ControllerAvis::buildAdminAvisAValider();
    }

}