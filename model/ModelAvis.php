<?php

require_once File::build_path(array('model','Model.php'));

class ModelAvis{
    private $idAvis;
    private $texteAvis;
    private $nomClientAvis;
    private $prenomClientAvis;
    private $idChambre;
    private $noteAvis;

    public function getIdAvis(){return $this->idAvis;}
    public function getTexteAvis(){return $this->texteAvis;}
    public function getNomClientAvis(){return $this->nomClientAvis;}
    public function getPrenomClientAvis(){return $this->prenomClientAvis;}
    public function getIdChambre(){return $this->idChambre;}
    public function getNoteAvis(){return $this->noteAvis;}
    public function getEtatAvis(){return $this->etatAvis;}


    public static function getAll() {
        try{
            $sql = Model::$pdo -> query("SELECT * FROM Avis");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        $sql->setFetchMode(PDO::FETCH_CLASS, 'ModelAvis');
        $tab_avis = $sql->fetchAll();

        return $tab_avis;
    }

    public static function getAvisAValider() {
        try{
            $sql = Model::$pdo -> query("SELECT * FROM Avis WHERE etatAvis = 0");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        $sql->setFetchMode(PDO::FETCH_CLASS, 'ModelAvis');
        $tab_avis = $sql->fetchAll();

        return $tab_avis;
    }

    public static function getAvisValider() {
        try{
            $sql = Model::$pdo -> query("SELECT * FROM Avis WHERE etatAvis = 1");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        $sql->setFetchMode(PDO::FETCH_CLASS, 'ModelAvis');
        $tab_avis = $sql->fetchAll();

        return $tab_avis;
    }

    public static function getAvisRefuser() {
        try{
            $sql = Model::$pdo -> query("SELECT * FROM Avis WHERE etatAvis = 2");
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        $sql->setFetchMode(PDO::FETCH_CLASS, 'ModelAvis');
        $tab_avis = $sql->fetchAll();

        return $tab_avis;
    }

    public static function ajouterAvis($texteAvis,$nomClientAvis,$prenomClientAvis,$chambre,$note){
            try {
                $stmt = Model::$pdo->prepare("INSERT INTO Avis (texteAvis,nomClientAvis,prenomClientAvis,idChambre,noteAvis,etatAvis) VALUES (:texteAvis,:nomClientAvis,:prenomClientAvis,:chambre,:note,'0')");

            } catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }
        $stmt->execute(array('texteAvis' => $texteAvis,
            'nomClientAvis' => $nomClientAvis,
            'prenomClientAvis' => $prenomClientAvis,
            'chambre' => $chambre,
            'note' => $note));
        }

    public static function setAvis($id,$S){

        try {$stmt = Model::$pdo->prepare("UPDATE `Avis` SET `etatAvis`= :S  WHERE idAvis=:id");}

        catch (PDOException $e) {
            if (Conf::getDebug()) {echo $e->getMessage();}
            else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
            die();
        }

        $stmt->execute(array('S' => $S,
            'id' => $id));
    }

    public static function supprimerAvis($id){
            try {
                $stmt = Model::$pdo->prepare("DELETE FROM Avis WHERE idAvis=:id");

            } catch (PDOException $e) {
                echo $e->getMessage(); // affiche un message d'erreur
                die();
            }
        $stmt->execute(array('id' => $id));
        }

}