<?php
require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('lib','Security.php'));

class ModelUtilisateur
{
    private $nomUtilisateur;
    private $mdp;
    private $id;

    public static function getInfos(){

        try{ $rep = Model::$pdo->query("SELECT * FROM Utilisateur WHERE id =1");}

        catch (PDOException $e) {
            if (Conf::getDebug()) { echo $e->getMessage();}
            else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
            die();
        }

        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $tab_page = $rep->fetchAll();

        return $tab_page[0];
    }

    public static function connexion($nom,$mdp) {
        $u = ModelUtilisateur::getInfos();
        $mdpBD = $u->mdp;
        $idBD = $u->nomUtilisateur;
        $idBD = str_replace(" ","",$idBD);
        $mdpBD = str_replace(" ","",$mdpBD);
       if (strcmp($nom,$idBD)==0 && strcmp(Security::chiffrer($mdp),$mdpBD)==0) {
           return true;
       } else {
           return false;
       }

    }

    public function getNom() {
        return $this->nomUtilisateur;
    }

}
