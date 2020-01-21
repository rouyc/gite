<?php 

    require_once File::build_path(array('model','Model.php'));

    class ModelReservation {

        private $idReservation;
        private $nomClient;
        private $prenomClient;
        private $emailClient;
        private $dateDebut;
        private $dateFin;
        private $idChambre;
        private $prixReservation;

        public function getIdReservation() {return $this->idReservation;}
        public function getNomClient() {return $this->nomClient;}
        public function getPrenomClient() {return $this->prenomClient;}
        public function getEmailClient() {return $this->emailClient;}
        public function getDateDebut() {return $this->dateDebut;}
        public function getDateFin() {return $this->dateFin;}
        public function getPrixReservation() { return $this->prixReservation;}


        public static function getReservationAccepte(){
            try{ $rep = Model::$pdo->query("SELECT * FROM reservation
                                            WHERE etatReservation = 1 ");}

            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
            $tab_article = $rep->fetchAll();

            return $tab_article;
        }

        public static function getReservationRefuse(){
            try{ $rep = Model::$pdo->query("SELECT * FROM reservation
                                            WHERE etatReservation = 2 ");}

            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
            $tab_article = $rep->fetchAll();

            return $tab_article;
        }

        public static function getAll(){

            try{ $rep = Model::$pdo->query("SELECT * FROM reservation ");}
             
            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();} 
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
            $tab_article = $rep->fetchAll();

            return $tab_article;
        }

        public static function getReservationEnAttente($id){
            try{ $rep = Model::$pdo->prepare("SELECT * FROM reservation WHERE etatReservation = 0 AND idChambre = :id");
            }
             
            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();} 
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }
            $rep->execute(array('id' => $id));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
            $tab_resEnAttente = $rep->fetchAll();

            return $tab_resEnAttente;
        }

        public static function getReservationValide($id){
            try{ $rep = Model::$pdo->prepare("SELECT * FROM reservation WHERE etatReservation = 1 AND idChambre = :id");
            }
             
            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();} 
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }
            $rep->execute(array('id' => $id));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
            $tab_resValide = $rep->fetchAll();

            return $tab_resValide;
        }

        public static function getReservationRefusee($id){
            try{ $rep = Model::$pdo->prepare("SELECT * FROM reservation WHERE etatReservation = 2 AND idChambre = :id");
            }

            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }
            $rep->execute(array('id' => $id));
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
            $tab_resRefusee = $rep->fetchAll();

            return $tab_resRefusee;
        }

        public static function refRes($id,$email){
            mail($email, 'Réservation refusée', 'Votre réservation a été refusée.', 'From: clementgalzi@gmail.com');
            $sql = "UPDATE reservation SET etatReservation = 2 WHERE idReservation=:val_id";

            try{ $req_prep = Model::$pdo -> prepare($sql);}
            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $values = array("val_id" => $id);
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
        }

        public static function valRes($id,$email){
             mail($email, 'Réservation Validée', 'Votre réservation a été validée.', 'From: clementgalzi@gmail.com');
            $sql = "UPDATE reservation SET etatReservation = 1 WHERE idReservation=:val_id";

            try{ $req_prep = Model::$pdo -> prepare($sql);}
            catch (PDOException $e) {
                if (Conf::getDebug()) { echo $e->getMessage();}
                else { echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';}
                die();
            }

            $values = array("val_id" => $id);
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
        }
    }
?>